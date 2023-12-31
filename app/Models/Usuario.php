<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends RModel implements Authenticatable
{
    
    protected $table = "usuarios";
    protected $fillable = ['login', 'nome', 'cpf', 'password', 'email'];

    protected $primaryKey = 'cpf';

    protected $username = 'cpf';

    public function getAuthIdentifierName(){
        return $this->getKey();
    }
    public function getAuthIdentifier(){
        return $this->cpf;
    }
    public function getAuthPassword(){
        return $this->password;
    }
    public function getRememberToken(){

    }
    public function setRememberToken($value){

    }
    public function getRememberTokenName(){

    }
}
