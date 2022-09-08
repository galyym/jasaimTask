<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
      'full_name', 'birthday', 'age', 'address', 'education', 'specialization', 'skill', 'contact'
    ];
}
