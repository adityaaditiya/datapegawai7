<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'data_pegawai';

    protected $guarded = [];

    public function getData(){
        return static::orderBy('created_at')->get();
    }

}
