<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function permissions()
    {
        return $this->roles()->with('permissions')->get()->pluck('permissions')->flatten()->unique('id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'teacher_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user')->withPivot('role');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function calendarEvents()
    {
        return $this->hasMany(CalendarEvent::class);
    }
}
