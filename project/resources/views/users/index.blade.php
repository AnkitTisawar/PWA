@extends('layouts.app')

@section('title', 'Users')

@section('content')
<h2>All Users</h2>
<table border="0" cellpadding="8" cellspacing="0">
    <thead>
        <tr><th>Name</th><th>Actions</th></tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>
                    <a href="/profile/{{ $user->id }}">View</a>
                    <button onclick="showQr({{ $user->id }})">QR</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="qrModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.6);align-items:center;justify-content:center;">
    <div style="background:white;padding:1rem;border-radius:8px;">
        <img id="qrImage" src="" style="width:300px;height:300px;" />
        <div style="margin-top:.5rem;"><button onclick="closeQr()">Close</button></div>
    </div>
</div>

<script>
function showQr(id) {
    document.getElementById('qrImage').src = '/user/' + id + '/qr';
    document.getElementById('qrModal').style.display = 'flex';
}
function closeQr() {
    document.getElementById('qrModal').style.display = 'none';
}
</script>
@endsection
