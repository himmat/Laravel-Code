<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface
{

  use HasRole; // Add this trait to your user model

  public static $rules = [
    'username' => 'required|alpha|min:2',
    'email' => 'required|email|unique:users',
    'password' => 'required|alpha_num|between:6,12|czonfirmed',
    'password_confirmation' => 'required|alpha_num|between:6,12'
  ];

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';
  protected $fillable = array('username', 'email', 'password', 'active');

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password'];

  public function properties() {
    return $this->hasMany('Property', 'user_id', 'id');
  }

  public function photos() {
    return $this->hasMany('Photo', 'user_id', 'id');
  }

  /**
   * Get the unique identifier for the user.
   *
   * @return mixed
   */
  public function getAuthIdentifier() {
    return $this->getKey();
  }

  /**
   * Get the password for the user.
   *
   * @return string
   */
  public function getAuthPassword() {
    return $this->password;
  }

  /**
   * Get the e-mail address where password reminders are sent.
   *
   * @return string
   */
  public function getReminderEmail() {
    return $this->email;
  }

  /**
   * Get the e-mail address where password reminders are sent.
   *
   * @return string
   */
  public function getRememberToken() {
    return $this->remember_token;
  }

  public function setRememberToken($value) {
    $this->remember_token = $value;
  }

  public function getRememberTokenName() {
    return 'remember_token';
  }

}
