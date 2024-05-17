<?php

namespace App\Models; // Nentuin file class Chirp apa dimana

use App\Events\ChirpCreated; // Menggunakan class ChirpCreated
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model // Class Chirp extend ke class Model buat dapetin function/method dari class Model
{
    use HasFactory; 

    protected $fillable = [ // memproteksi dan mengizinkan/mendaftarkan kolom 'message' untuk diisi dan dimasukkan datanya ke database
        'message',
    ];

    protected $dispatchEvents = [ // membuat event ChirpCreated dan event ChirpCreated akan dipanggil ketika ada data baru di database
        'created' => ChirpCreated::class,
    ];

        public function user(): BelongsTo // membuat function/method user() agar bisa digunakan secara public atau diluar class Chirp
        {
            return $this->belongsTo(User::class); // menggunakan relasi belongsTo agar model Chirp terhubung dengan model User
        }
}
