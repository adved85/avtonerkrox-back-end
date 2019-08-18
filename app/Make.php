<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Carmodel;

class Make extends Model
{
    // belongs to Statement (one-to-one inverse)
   public function carmodels()
   {
       return $this->hasMany(Carmodel::class);
   }
}
