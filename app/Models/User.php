<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'enlace',
        'password',
        'google_id',
        'header_filename',
        'profile_filename'
    ];

    protected $appends  = [
        'header',
        'profile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the links for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function links(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Link::class, 'user_id', 'id');
    }

    public function getHeaderAttribute(){
        return url("/storage/header")."/".$this->header_filename;
    }

    public function getProfileAttribute(){
        return url('/storage/profile')."/".$this->profile_filename;
    }
}
