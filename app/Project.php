<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = ['id', 'user_id', 'start', 'end', 'status', 'name', 'description', 'git', 'payment_id'];

    public $incrementing = false;

    public function payment()
    {
    	return $this->belongsTo('App\Payment');
    }
}
