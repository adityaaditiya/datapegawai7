<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $table = 'data_aktivitas';

    protected $guarded = [];

    public function getData(){
        return static::orderBy('created_at')->get();
    }
}
