<?php

class UsersController extends \BaseController
{

  /**
   * Constructor
   */
  protected $layout = 'layouts.base';

  public function __construct() {
    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->beforeFilter('auth', array('only' => array('getDashboard')));
  }

  /**
   * getLogin
   */
  public function getLogin() {
    $this->layout->content = View::make('users.login');
  }

  /**
   * getLogin
   */
  public function getRegister() {
    $this->layout->content = View::make('users.register');
  }

  public function getProfile() {
    $this->layout->content = View::make('users.profile');
  }

  public function getIndex() {
    $this->layout->content = View::make('users.profile');
  }

  /**
   * postSignin
   */
  public function postSignin() {

    $rules = array(
      'email' => 'required|email',
      'password' => 'required|min:3'
    );


    $validator = Validator::make(Input::all(), $rules);


    if ($validator->fails()) {
      return Redirect::to('users/login')
          ->withErrors($validator)
          ->withInput(Input::except('password'));
    } else {


      $userdata = array(
        'email' => Input::get('email'),
        'password' => Input::get('password')
      );



      if (Auth::attempt($userdata)) {

        return Redirect::to('dashboard')
            ->with('flash_notice', "You have successfully login.");
      } else {
        return Redirect::to('users/login');
      }
    }
  }

  /**
   * getLogout
   */
  public function getLogout() {
    Auth::logout();

    return Redirect::to('users/login')
        ->with('flash_notice', "You have successfully logged out.");
  }

  public function postStore() {
    $data = Input::except(array('_token'));
    $rule = array(
      'username' => 'required|unique:users',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|same:cpassword',
      'cpassword' => 'required|min:6',
      'urole' => 'required'
    );
    $message = array(
      'cpassword.required' => 'The confirm password field is required.',
      'cpassword.min' => 'The confirm password must be at least 6 characters',
      'password.same' => 'The :attribute and confirm password field must match.',
      'urole.required' => 'You have to select atleast one role',
    );
    $validator = Validator::make($data, $rule, $message);
    

    if ($validator->fails()) {
      return Redirect::to('users/register')
          ->withErrors($validator->messages());
    } else {
      $data = Input::except(array('_token', 'cpassword'));
      $data['password'] = Hash::make($data['password']);
      $data['active'] = 0;
      $user = User::create($data);
      $user->roles()->attach($data['urole']); // id only
      return Redirect::to('users/login')
          ->withMessage('You have successfully registered');
    }
  }

}
