<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Route;
use App\User;
use Session;
use Carbon\Carbon;
use App\Country;
use App\State;
use App\City;
use App\Category;

class HomeController extends Controller {

    public $record_per_page;

    /**
     * Function __construct
     *
     * function constructor
     * @param  NULL
     * @return NULL
     */
    public function __construct() {
    }

    /**
     * Function index
     *
     * function to load admin dashboard
     * @param  ARRAY
     * @return NULL
     */
    public function index(Request $request) {

       return view('web.user.login',[]); 

        
    }

    // public function cities($country_slug,Request $request){

    //     $country = Country::where('slug','=',$country_slug)->where('status','=',1)->first();
      
    //    $country_id = $country->id;
    //    $states = State::where('country_id','=',$country_id)->where('status','=',1)->with('cities')->get();
    //     //dd($states);
    //     return view('web.cities',['states' => $states]); 

    // }

    public function category($city_slug, Request $request){

        $request->session()->put('selected_city', $city_slug);

        $categories = Category::where('status','=',1)->where('parent_id','=',0)->with('subcategories')->get();
        //dd($categories);

      return view('web.category',['categories'=>$categories]); 

    }



}