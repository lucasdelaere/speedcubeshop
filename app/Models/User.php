<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role_id',
        'is_active',
        'photo_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* one-to-many */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // 'role_id' is derived automatically
    }
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function isAdmin()
    {
        if ($this->role->name == "administrator" && $this->is_active == 1) {
            return true;
        }
        return false;
    }

    public function isVendor()
    {
        if ($this->role_id == 3 && $this->is_active == 1) {
            return true;
        }
        return false;
    }

    public function isAllowedBackend()
    {
        return ($this->role_id == 1 || $this->role_id == 3) && $this->is_active == 1;

    }
}
