<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Config; //inclusion of the language "catalog" 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLang($lang){//check and set the language of current session
    	if(array_key_exists($lang, Config::get('languages'))){
    		Session::set('currlocale',$lang);
    	}
    	return Redirect::back();
    }
}
