<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Make;
use App\Notification;

class Statement extends Model
{
    //one to one with Make-model -> has one Make
    protected $fillable = [
        'user_id',
        'status',
        'make_id',
        'model_id',
        'body_type_id',
        'doors',
        'year',
        'mileage',
        'engine_type_id',
        'engine_value',
        'pistons',
        'gearbox_id',
        'drivetrain_id',
        'steering_wheel_id',
        'color_id',
        'price',
        'currency_id',
        'customs',
        'view',
        'thumb',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

}
