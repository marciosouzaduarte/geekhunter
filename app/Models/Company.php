<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'active', 'zipcode', 'address'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'companies';
}