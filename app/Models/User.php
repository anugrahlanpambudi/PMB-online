<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

#[Fillable(['name', 'email', 'password', 'role'])] // Tambahkan 'role' di sini
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tambahkan relasi ini
    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'user_id');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function sendPasswordResetNotification($token)
    {
        $url = url(route('password.reset', [
            'token' => $token,
            'email' => $this->getEmailForPasswordReset(),
        ], false));

        ResetPassword::toMailUsing(function ($notifiable, $token) use ($url) {
            return (new MailMessage)
                ->subject('Permintaan Reset Kata Sandi Akun PMB')
                ->greeting('Halo, ' . $notifiable->name . '!')
                ->line('Kami menerima permintaan untuk mengatur ulang kata sandi akun PMB Online Anda.')
                ->action('Atur Ulang Kata Sandi', $url)
                ->line('Link reset kata sandi ini akan kedaluwarsa dalam 60 menit.')
                ->line('Jika Anda tidak merasa melakukan permintaan ini, abaikan saja email ini.')
                ->salutation('Panitia Penerimaan Mahasiswa Baru');
        });

        $this->notify(new ResetPassword($token));
    }
}
