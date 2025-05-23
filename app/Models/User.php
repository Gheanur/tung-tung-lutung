<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // User punya banyak Post
public function posts()
{
    return $this->hasMany(Post::class);
}

// User punya banyak Like
public function likes()
{
    return $this->hasMany(Like::class);
}

// User follow orang lain
public function following()
{
    return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
}

// User difollow orang lain
public function followers()
{
    return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
}

}
