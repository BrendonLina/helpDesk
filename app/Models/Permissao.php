<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

    protected $primaryKey = 'permissao';

    protected $fillable = [
        'name',
        'permissao',
    ];

    public function User()
    {
        return $this->hasOne('App\Models\User');
    }
}
