<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = ['id', 'method', 'transaksi', 'lunas'];

    public $incrementing = false;

    public function project()
    {
    	return $this->hasOne('App\Project');
    }
}
