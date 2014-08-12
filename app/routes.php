<?php
 echo "hello";
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::controller('users', 'UsersController');

Route::get('register', function(){
  return View::make('register');
 
});

Route::post('register/action',  array('uses' => 'UsersController@postStore'));


Route::get('register', function(){

    return View::make('register');

});

Route::get('dashboard', array('before' => 'auth', 'as' => 'dashboard', 'uses' => 'IndexController@index'));


Route::get('properties', array('before' => 'auth', 'as' => 'listingproperty', 'uses' => 'PropertiesController@index'));


Route::get('properties/addproperty', array('before' => 'auth', 'as' => 'addproperty', 'uses' => 'PropertiesController@addProperty'));

Route::post('addproperty/action',  array('uses' => 'PropertiesController@storeProperty'));

Route::get('properties/show/{id}', array('before' => 'auth', 'uses' => 'PropertiesController@showProperty'));

Route::get('properties/{id}/edit', array('before' => 'auth', 'uses' => 'PropertiesController@editProperty'));

Route::post('property/update/{id}',  array('uses' => 'PropertiesController@updateProperty'));






/* route collection */

/*
Route::model('user', 'User');
Route::model('role', 'Role');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
/*Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {

        # User Management
        Route::get('users/{user}/show', 'AdminUsersController@getShow')
            ->where('user', '[0-9]+');
        Route::get('users/{user}/edit', 'AdminUsersController@getEdit')
            ->where('user', '[0-9]+');
        Route::post('users/{user}/edit', 'AdminUsersController@postEdit')
            ->where('user', '[0-9]+');
        Route::get('users/{user}/delete', 'AdminUsersController@getDelete')
            ->where('user', '[0-9]+');
        Route::post('users/{user}/delete', 'AdminUsersController@postDelete')
            ->where('user', '[0-9]+');
        Route::controller('users', 'AdminUsersController');

        # User Role Management
        Route::get('roles/{role}/show', 'AdminRolesController@getShow')
            ->where('role', '[0-9]+');
        Route::get('roles/{role}/edit', 'AdminRolesController@getEdit')
            ->where('role', '[0-9]+');
        Route::post('roles/{role}/edit', 'AdminRolesController@postEdit')
            ->where('role', '[0-9]+');
        Route::get('roles/{role}/delete', 'AdminRolesController@getDelete')
            ->where('role', '[0-9]+');
        Route::post('roles/{role}/delete', 'AdminRolesController@postDelete')
            ->where('role', '[0-9]+');
        Route::controller('roles', 'AdminRolesController');

        # Admin Dashboard
        Route::controller('/', 'AdminDashboardController');
    });


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */
// User reset routes
/*Route::get('user/reset/{token}', 'UserController@getReset')
    ->where('token', '[0-9a-z]+');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset')
    ->where('token', '[0-9a-z]+');
//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit')
    ->where('user', '[0-9]+');

//:: User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: Application Routes ::
# Filter for detect language
Route::when('contact-us', 'detectLang');

# Contact Us Static Page
Route::get('contact-us', function() {
        // Return about us page
        return View::make('site/contact-us');
    });

# Index Page - Last route, no matches
//Route::get('/', array('before' => 'detectLang', 'uses' => 'BlogController@getIndex'));
Route::get('{par1}', function($par1) {
        return $par1;
    });
Route::get('{par1}/{par2}', function($par1, $par2) {
        return $par1 . '-' . $par2;
    });
Route::get('/', function() {
        return 'route not found';
    });

//filters.php

Route::filter('auth', function()
{
    if (Auth::guest()) {
        Session::put('loginRedirect', Request::url());
        return Redirect::to('user/login/');
    }
});
 */
