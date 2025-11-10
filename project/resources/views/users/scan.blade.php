@extends('layouts.app')

@section('title', 'Scan QR')

@section('content')
<h2>Scan QR Code</h2>
<div id="reader" style="width:100%;max-width:480px;"></div>
<div id="result" style="margin-top:1rem;display:none;"></div>

<script>
const html5QrCode = new Html5Qrcode("reader");

Html5Qrcode.getCameras().then(devices => {
    if (devices && devices.length) {
        html5QrCode.start(
            devices[0].id,
            { fps: 10, qrbox: 250 },
            (decodedText) => {
                html5QrCode.stop().catch(console.error);
                fetch('/api/users/' + decodedText.split('/').pop())
                    .then(r => r.json())
                    .then(u => {
                        document.getElementById('result').innerHTML =
                            `<p><strong>${u.name}</strong></p><p>${u.title}</p><p>${u.email}</p>`;
                        document.getElementById('result').style.display = 'block';
                    });
            }
        );
    }
}).catch(alert);
</script>
@endsection
