<?php

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

use App\Mail\WelcomeEmail;
use App\Notifications\WelcomeNotification;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendemail', function () {

//    Mail::send('emails.welcome',[],function($message) {
//       $message->to('sergiturbadenas@gmail.com')->subject('Welcome');
//    });
    Mail::to('sergiturbadenas@gmail.com')->send(new WelcomeEmail());
    dump('Email enviat correctament!');
});

Route::get('/sendnotification', function () {
//    $user = factory(App\User::class)->create();
//    Auth::login($user);

    Auth::loginUsingId(1);
    $user = Auth::user();
    $user->notify(new WelcomeNotification());
    dump("notification send!");

    //Notification::send
});