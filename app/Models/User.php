<?php

namespace App\Models;

use App\Mail\UserEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * Class User
 * @package App\Models
 *
 * @property string $name
 * @property string $email
 * @property string $activate_token
 * @property boolean $is_active
 * @property Carbon $activated_at
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function(User $user) {
            $user->activate_token = Str::random(50);
            Mail::to($user->email)
                ->send(new UserEmail($user));
        });
    }
}
