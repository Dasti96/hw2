<?php
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {   
    return view('welcome');
});*/

//home as root
Route::get('/', function () {  
    Session::put('current_page', 'home'); 
    return view('hw2_home');
});


//NEWS API
Route::get('/get/news','ApiController@newsAPI');

//GAMES API
Route::get('/get/games/{search}','ApiController@gamesAPI');

//check login
Route::get('/get/login','LogController@checkLogin');

//cart handler
Route::get('/get/cart','ShopController@cartHandler');
Route::get('/get/deleteCartElem/{index}','ShopController@deleteFromCart');
Route::get('/get/checkOut','ShopController@checkOut');
Route::get('/get/orders','ShopController@ordersHandler');

//messages handler
Route::get('/get/messages','MessagesController@messagesHandler');
//message by index
Route::get('/get/messages/{index}','MessagesController@getMessageByIndex');

//(csrf disabled)
Route::post('/get/cart','ShopController@cartHandler');


//master(main) layout composition
View::composer('/layouts/main','ViewLayoutsController@compose');

//redirect contattaci
Route::get('/contattaci','ContController@index');
//contattaci function
Route::post('/contattaci','ContController@sendMessage');

//redirect home
Route::get('/home', function () {  
    Session::put('current_page', 'home'); 
    return view('hw2_home');
});


//redirect shop
 Route::get('/shop', function () {  
    Session::put('current_page', 'shop'); 
    return view('hw2_shop');
});


//redirect login
Route::get('/login','LogController@index');

//login function
Route::post('/login','LogController@login');

//get user
Route::get('/get/user','LogController@getUser');

//redirect reg
Route::get('/reg','RegController@index');

//reg function
Route::post('/reg','RegController@reg');

//logout
Route::get('/logout', 'LogController@logout');
?>

