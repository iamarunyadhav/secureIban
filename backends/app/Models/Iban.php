<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iban extends Model
{
    protected $fillable = ['iban', 'user_id'];
}
