<?php

class Property extends Eloquent
{
  
  public static $rules = [
    'name' => 'required|alpha|min:2',
    'type' => 'required',
    'address' => 'required',
    'minprice' => 'required'
  ];
  

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'properties';

  public function user() {
        return $this->belongsTo('User', 'user_id', 'id');
  }

}
