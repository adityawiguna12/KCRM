<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contract';

    protected $fillable = ['id', 'user_id', 'project_id', 'method', 'start', 'expired'];

    public $incrementing = false;

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
