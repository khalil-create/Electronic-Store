<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'phone_no', 'type', 'status', 'email', 'image', 'password'];
    protected $hidden = ['created_at', 'updated_at', 'remember_token', 'password'];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // public function posts()
    // {
    //     return $this->hasMany('App\Models\Post', 'user_id', 'id');
    // }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    // public function likes(): HasMany
    // {
    //     return $this->hasMany(Like::class);
    // }
    // public function followers()
    // {
    //     return $this->hasMany(UserFollower::class, 'user_id');
    // }

    // public function followedUsers()
    // {
    //     return $this->hasMany(UserFollower::class, 'follower_id');
    // }
}