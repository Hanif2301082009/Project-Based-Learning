<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// app/Models/Temperature.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $table = 'temperatures';

    protected $fillable = [
        'value',
        'timestamp',
    ];

    public $timestamps = false; // karena kamu pakai kolom timestamp sendiri
}

