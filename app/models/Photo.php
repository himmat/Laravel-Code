<?php

class Photo extends Eloquent
{
  
  

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'photos';

  public function user() {
        return $this->belongsTo('User', 'user_id', 'id');
  }

}
