<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Redis;
use Livewire\Component;
use Illuminate\Support\Str;

class MessageForm extends Component
{
    public $message;
    public $generatedLink = null;

    public function generateLink()
    {
        $this->validate([
            'message' => 'required|min:3',
        ]);

        // Generate token dan simpan ke Redis
        $token = Str::random(8);
        $key = "msg:$token";

        Redis::setex($key, 60 * 60 * 24, $this->message); // Simpan 24 jam

        // Buat link
        $this->generatedLink = url("/m/{$token}");
        $this->message = ''; // reset textarea

        // Trigger browser event agar JS bisa menampilkan Notify()
        // kirim event ke browser
        $this->dispatch('notify', [
            'title' => 'Link Generated!',
            'text' => 'Link rahasia kamu berhasil dibuat 🎉',
            'status' => 'success'
        ]);
    }

    public function copyLink()
    {
        // Trigger browser event untuk menyalin link
        $this->dispatch('copyToClipboard', [
            'link' => $this->generatedLink,
        ]);
    }

    public function render()
    {
        return view('livewire.message-form');
    }
}
