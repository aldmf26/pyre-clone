<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/store', function (\Illuminate\Http\Request $request) {
    $message = $request->input('message');
    $token = Str::random(8);
    $key = "msg:$token";

    // simpan ke redis, TTL 24 jam (60 detik * 60 menit * 24 jam)
    Redis::setex($key, 60 * 60 * 24, $message);

    return back()->with('link', url("/m/$token"));
});

Route::get('/m/{token}', function ($token) {
    $key = "msg:$token";
    $message = Redis::get($key);

    // hapus setelah dibaca sekali
    Redis::del($key);

    return view('message', compact('message'));
});
