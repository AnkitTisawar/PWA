<?php

namespace App\Http\Controllers;

use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function qr($id)
    {
        $user = User::findOrFail($id);
        $url = route('profiles.show', ['id' => $user->id]);
        $png = QrCode::format('png')->size(300)->margin(1)->generate($url);
        return response($png, 200)->header('Content-Type', 'image/png');
    }

public function scanQrPage()
{
    return view('users.scan-qr');
}
public function showData($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
}
