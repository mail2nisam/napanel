<?php

class Model extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'category' => 'required'
	);
}
