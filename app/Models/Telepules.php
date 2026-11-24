<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telepules extends Model
{
    protected $table = 'telepulesek';
    public $timestamps = false;
    protected $fillable = ['irsz', 'nev', 'megye'];
}
