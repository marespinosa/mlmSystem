<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Str;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class User extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'username',
        'email',
        'password',
        'presentAddress',
        'birthday',
        'status',
        'gender',
        'nationality',
        'sponsor_id_number',
        'phoneNumber',
        'acountStatus',
        'generatedId',
        'userlevel',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $uniqueGeneratedId = false;
            while (!$uniqueGeneratedId) {
                $generatedId = Str::random(10);
                $existingUser = self::where('generatedId', $generatedId)->first();
                if (!$existingUser) {
                    $uniqueGeneratedId = true;
                }
            }
            $user->generatedId = $generatedId;
        });
    }


    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function manualLogin($user)
    {
        Auth::guard()->login($user);
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

  
    public function getAuthPassword()
    {
        return $this->password;
    }

    protected $attributes = [
        'acountStatus' => 'deactivate',
    ];

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    
    public function getRememberTokenName()
    {
        return 'remember_token';
    }


}
