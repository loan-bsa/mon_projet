<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Notifiable;

    protected $table = 'utilisateurs';
    public $timestamps = false;

    protected $fillable = ['nom', 'email', 'mot_de_passe', 'is_admin'];

    protected $hidden = ['mot_de_passe'];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
