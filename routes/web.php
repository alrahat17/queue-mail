<?php

use App\Jobs\sendOfferMail;
use App\Mail\offerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get ('sendmail',function(){

	//sendOfferMail::dispatch();

	sendOfferMail::dispatch()
                ->delay(now()->addSeconds(5));
	return "Offer Email sent";

});
