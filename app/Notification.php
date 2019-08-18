<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Statement;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['statement_id', 'message'];

    public function statement()
    {
        return $this->belongsTo(Statement::class);
    }


}
