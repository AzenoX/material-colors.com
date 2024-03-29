<?php

namespace App\Models;

use App\Core\Auth\VerifyEmail;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable implements MustMail
{
    use CrudTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'name',
        'email',
        'email_verified_at',
        'password',
        'google_id',
        'github_id',
        'facebook_id',
        'twitter_id',
        'reddit_id',
        'spotify_id',
        'deezer_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the email verification notification.
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'uid' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email_verified_at' => ['required', 'timestamp'],
            'password' => ['required', 'string', 'max:255', 'confirmed'],
            'google_id' => ['string'],
            'github_id' => ['string'],
            'facebook_id' => ['string'],
            'twitter_id' => ['string'],
            'reddit_id' => ['string'],
            'spotify_id' => ['string'],
            'deezer_id' => ['string'],
        ]);
    }
}
