<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    public function lessonPackage()
{
    return $this->belongsTo(\App\Models\LessonPackage::class);
}
    protected $fillable = [
        'user_id',
        'lesson_package_id',
        'date',
        'time',
    ];

public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}
}