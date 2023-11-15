<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compentece extends Model
{
    use HasFactory;
    protected $fillable =['References','Code','Nom','Description'];
}
