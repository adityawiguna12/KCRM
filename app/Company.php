<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   	protected $table = 'company';

   	protected $fillable = ['id', 'user_id', 'name', 'address', 'website', 'phone'];

   	public $incrementing = false;

   	public function user()
   	{
   		return $this->belongsTo('App\User');
   	}
}
