<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Company as Authenticatable;

class Company extends Authenticatable
{
	use SoftDeletes;
    use Notifiable;

    public $timestamps = true;
    protected $table = 'companies';
    protected $fillable = ['cnpj','name','phone','mobile','address','email','password','status','permission'];
    protected $hidden = ['password', 'remember_token'];

}
