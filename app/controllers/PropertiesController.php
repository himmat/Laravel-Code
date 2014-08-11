<?php

class PropertiesController extends BaseController {

  protected $layout = 'layouts.base';

  public function __construct() {
    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->beforeFilter('auth');
  }
	
  public function index() {
    $user = Auth::user();
    if($user->hasRole("Admin") && $user->can("manage_properties")) {
    /*  $properties = User::
        with(array("user_property" => function($query) use ($user) {
            $query->where("user_id", "=", $user->id)->orderBy("name", "desc");
        }));
    */  
     if(Input::get('sortby')) 
      $sortby = Input::get('sortby');
     else 
       $sortby = 'name';
     if(Input::get('order'))
      $order = Input::get('order');
     else 
       $order = 'asc';
      
     
     if ($sortby && $order) {
     
      $properties = User::find($user->id)->properties()->orderBy($sortby, $order)->paginate(10);
      $this->layout->content = View::make('properties.index',array('properties' => $properties, 'sortby' => $sortby ,'order' => $order));
	    } 
      
      else {
        $properties = User::find(Auth::user()->id)->properties()->orderBy('name', 'DESC')->paginate(10);
      $this->layout->content = View::make('properties.index')
          ->with('properties', $properties);
      }
     
    }
	}
  
  public function showProperty($id) {
    $property = Property::find($id);
    $this->layout->content = View::make('properties.show')
			->with('property', $property);
	}
  
  public function addProperty() {
		$this->layout->content = View::make('properties.addproperty');
	}

  public function editProperty($id) {
    $property = Property::find($id);
    $this->layout->content = View::make('properties.editproperty')->with('property', $property);
	}
  
  public function storeProperty() {
    $data = Input::except(array('_token'));
    $rule = array(
      'name' => 'required|alpha|min:2',
      'type' => 'required',
      'address' => 'required',
      'minprice' => 'required'
      );
    $message = array(
      'name.required' => 'The name field is required.',
      'name.min' => 'The name must be at least 6 characters',
      'address.required' => 'The address field is required.',
    );
    
    $validator = Validator::make($data, $rule, $message);

    if ($validator->fails()) {
      return Redirect::to('properties/addproperty')
          ->withErrors($validator->messages())->withInput();
    } 
    
    else {
     $data = Input::except(array('_token', 'cpassword'));
     
      $property = new Property;
      $property->name = Input::get('name');
      $property->user_id = Auth::user()->id;
      $property->type = Input::get('type');

      $property->address = Input::get('address');
      $property->to = Input::get('to');
      $property->minprice = Input::get('minprice');
      
      $property->maxprice = Input::get('maxprice');
      $property->bedrooms = Input::get('bedrooms');
      $property->bathrooms = Input::get('bathrooms');
      $property->area = Input::get('area');
      $property->save();
      
      
     return Redirect::to('properties')
          ->withMessage('Data inserted');
    }
  }
  
  public function updateProperty($id) {
    $property = Property::find($id);
    $data = Input::except(array('_token'));
    $rule = array(
      'name' => 'required|alpha|min:2',
      'type' => 'required',
      'address' => 'required',
      'minprice' => 'required'
      );
    $message = array(
      'name.required' => 'The name field is required.',
      'name.min' => 'The name must be at least 6 characters',
      'address.required' => 'The address field is required.',
    );
    
    $validator = Validator::make($data, $rule, $message);

    if ($validator->fails()) {
      return Redirect::to("properties/$id/edit")
          ->withErrors($validator->messages())->withInput();
    } 
    
    else {
      
     $data = Input::except(array('_token', 'cpassword'));
     
      
      $property->name = Input::get('name');
      $property->user_id = Auth::user()->id;
      $property->type = Input::get('type');

      $property->address = Input::get('address');
      $property->to = Input::get('to');
      $property->minprice = Input::get('minprice');
      
      $property->maxprice = Input::get('maxprice');
      $property->bedrooms = Input::get('bedrooms');
      $property->bathrooms = Input::get('bathrooms');
      $property->area = Input::get('area');
      $property->save();
      
      
     return Redirect::to('properties')
          ->withMessage('Data inserted');
    }
  }
  
  
}
