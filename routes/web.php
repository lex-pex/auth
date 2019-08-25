<?php

Route::get('/', 'MainController@template');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('record/add', 'RecordController@create');
Route::post('record', 'RecordController@store')->name('record_store');

Route::get('record/{record}/edit', 'RecordController@edit')->name('record_edit');
Route::post('record/{record}', 'RecordController@update')->name('record_update');

Route::get('record/all', 'RecordController@all');
Route::get('record/{id}', 'RecordController@show');

Route::delete('record/{record}', 'RecordController@destroy')->name('record_destroy');

Route::get('error_page', 'MainController@errorPage');

/* _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _ * _
                       ------- REST API -------
 | GET 	       /photos 	              index      photos. index      | 1
 | GET 	       /photos/create 	      create 	 photos. create     | 2
 | POST        /photos 	              store      photos. store      | 3
 | GET 	       /photos/{photo} 	      show 	     photos. show       | 4
 | GET 	       /photos/{photo}/edit   edit 	     photos. edit       | 5
 | PUT/PATCH   /photos/{photo} 	      update 	 photos. update     | 6
 | DELETE      /photos/{photo} 	      destroy 	 photos. destroy    | 7

* _ * _ * _ * _ * _ * _ * _* _ * _ * _ * _ * _ * _ * _* _ * _ * _ * _ * _ * _ * _ */











