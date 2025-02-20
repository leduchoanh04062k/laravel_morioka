<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{
    use HasFactory;
    protected $table = 'receipts';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
