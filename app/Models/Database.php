<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\DatabaseType;

class Database extends Model
{
    protected $fillable = ["name", "type", "connection_name"];

    protected $casts = [
        "type" => DatabaseType::class,
    ];
}
