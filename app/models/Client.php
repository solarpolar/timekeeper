<?php

class Client extends Eloquent {
	protected $guarded = array('id');

	public function projects() 
	{
		return $this->hasMany('Project');
	}

}
