<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id'
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
        'password' => 'hashed',
    ];

    public function eventPublisher()
    {
        return $this->hasOne(EventPublisher::class);
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    /**
     * Switch the user's role.
     *
     * @param string $newRole The new role to switch to
     * @return void
     */
    public function switchRole($newRole)
    {
        // Remove all current roles
        $this->removeAllRoles();

        // Assign the new role
        $this->assignRole($newRole);
    }

    /**
     * Remove all roles from the user.
     *
     * @return void
     */
    public function removeAllRoles()
    {
        $this->roles()->detach();
    }
}
