<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use View;
class LoginController extends Controller{
    public function showLogin(){
    //show the form 
    return View::make('login');
        
    }
    
    public function doLogin(){
        //process the form 
        //validate the info , create rules for the inputs 
        
        $rules = array(
            'email' => 'required|email', //make sure the email is an actual email 
            'password' => 'required|alphaNum|min:5' // password can only be alphanumeric
            );
            
        //run the validation rules on the inputs from the form 
        $validator = Validator::make(Input::all() , $rules);
        
        //if the validator fails , redirect back to the form 
        if($validator->fails()){
            return Redirect::to('login')
            ->withErrors($validator)//send back all errors to the login form 
            ->withInput(Input::except('password')); //send back the input (not) so that we can repopulate the form 
        } else {
            //create our user data for the authentication 
            $userdata = array(
                'email' => Input::get('email') , 
                'password' => Input::get('password')
                );
                
            //attempt to do the login 
            if(Auth::attempt($userdata)){
                //validation successful!
                //redirect them to the secure section or whatever 
                //return Redirect::to('secure')
                //for now we'll just echo success(even though echoing in a controller is bad)
                echo 'SUCCESS!';
            }
            else {
                //validation not successful , send back to form 
                return Redirect::to('login');
            }
        }
    }
    
    public function doLogout()
    {
        Auth::logout(); //log the user out of our application 
        return Redirect::to('login');//redirect the user to the login screen
        
    }
    
}
