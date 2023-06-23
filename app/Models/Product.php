<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table    = 'products',
            $primaryKey = 'id',
            $fillable   = ['name', 'description', 'file', 'type'];
}
