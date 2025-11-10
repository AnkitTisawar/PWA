@extends('layouts.app')

@section('title', 'Scan QR')

@section('content')
<h2>Scan QR Code</h2>

<div style="margin-bottom:12px;">
    <button id="startScanBtn">Start Camera</button>
    <button id="stopScanBtn" style="display:none;">Stop</button>
</div>

<div id="reader" style="width:100%;max-width:480px;border:1px solid #ddd;padding:8px;display:none;"></div>

<div id="scanStatus" style="margin-top:12px;color:#555;"></div>

<div id="result" style="margin-top:18px;display:none;border:1px solid #eee;padding:12px;background:#fafafa;max-width:480px;">
    <h3>Scanned user</h3>
    <div id="userBox"></div>
</div>

<script src="https://unpkg.com/html5-qrcode@2.3.8/minified/html5-qrcode.min.js"></script>
<script>
const startBtn = document.getElementById('startScanBtn');
const stopBtn = document.getElementById('stopScanBtn');
const readerElementId = "reader";
const scanStatus = document.getElementById('scanStatus');
const resultBox = document.getElementById('result');
const userBox = document.getElementById('userBox');

let html5QrCode = null;
let currentCameraId = null;

function showStatus(text) {
    scanStatus.textContent = text;
}

function showUser(user) {
    resultBox.style.display = 'block';
    userBox.innerHTML = `
        <p><strong>${escapeHtml(user.name)}</strong></p>
        <p>${escapeHtml(user.title || '')}</p>
        <p>${escapeHtml(user.email)}</p>
        <p>${escapeHtml(user.phone || '')}</p>
        <p><a href="/profile/${user.id}" target="_blank">Open profile</a></p>
    `;
}

function escapeHtml(s) {
    if (!s) return '';
    return s.replace(/[&<>"'`=\/]/g, function (c) {
        return '&#' + c.charCodeAt(0) + ';';
    });
}

async function startScanner() {
    resultBox.style.display = 'none';
    showStatus('Requesting camera access...');
    if (!html5QrCode) {
        html5QrCode = new Html5Qrcode(readerElementId);
    }
    try {
        const devices = await Html5Qrcode.getCameras();
        if (!devices || devices.length === 0) {
            showStatus('No camera found on this device.');
            return;
        }
        currentCameraId = devices[0].id;
        document.getElementById(readerElementId).style.display = 'block';
        startBtn.style.display = 'none';
        stopBtn.style.display = 'inline-block';
        showStatus('Starting camera...');
        await html5QrCode.start(
            currentCameraId,
            { fps: 10, qrbox: 250 },
            qrCodeMessage => {
                onDecoded(qrCodeMessage);
            },
            errorMessage => {
                // ignore frame errors
            }
        );
        showStatus('Scanning... point the camera at a QR code.');
    } catch (err) {
        showStatus('Camera error: ' + (err.message || err));
        console.error(err);
    }
}

async function stopScanner() {
    if (html5QrCode) {
        try {
            await html5QrCode.stop();
        } catch (e) {
            // ignore
        }
        html5QrCode.clear();
        document.getElementById(readerElementId).style.display = 'none';
    }
    startBtn.style.display = 'inline-block';
    stopBtn.style.display = 'none';
    showStatus('Scanner stopped.');
}

function onDecoded(decodedText) {
    stopScanner();
    showStatus('QR scanned: ' + decodedText);
    let id = null;
    try {
        const u = new URL(decodedText);
        const parts = u.pathname.split('/').filter(Boolean);
        id = parts.length ? parts[parts.length - 1] : null;
    } catch (e) {
        id = decodedText;
    }
    id = id ? id.replace(/^\/+|\/+$/g, '') : null;
    if (!id) {
        showStatus('Could not extract id from QR.');
        return;
    }
    fetchUserById(id);
}

function fetchUserById(id) {
    showStatus('Fetching user details...');
    fetch('/scan-data/' + encodeURIComponent(id))
        .then(res => {
            if (!res.ok) throw new Error('User not found');
            return res.json();
        })
        .then(user => {
            showStatus('User found.');
            showUser(user);
        })
        .catch(err => {
            showStatus('Error fetching user: ' + (err.message || err));
            console.error(err);
        });
}

startBtn.addEventListener('click', startScanner);
stopBtn.addEventListener('click', stopScanner);
</script>
@endsection
