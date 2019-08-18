<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['crc_code', 'crc_symbol','crc_name'];
}
