<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory,SoftDeletes;
   protected $fillable = ['name','old','status','weigth','tall','genero','problems'];
   protected $casts = ['deleted_at' => 'datetime'];

}
