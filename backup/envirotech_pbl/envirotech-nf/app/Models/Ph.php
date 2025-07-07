<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// app/Models/Temperature.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ph extends Model
{
    protected $table = 'phvalues';

    protected $connection = 'ph_mysql';

    protected $fillable = [
        'value',
        'timestamp',
    ];

    public $timestamps = false; // karena kamu pakai kolom timestamp sendiri
}

