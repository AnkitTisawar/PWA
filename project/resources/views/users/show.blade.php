@extends('layouts.app')

@section('title', $user->name)

@section('content')
<h2>{{ $user->name }}</h2>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Phone:</strong> {{ $user->phone }}</p>
@if($user->bio)
    <p><strong>Bio:</strong> {{ $user->bio }}</p>
@endif
<img src="/user/{{ $user->id }}/qr" style="width:200px;height:200px;margin-top:1rem;" />
@endsection
