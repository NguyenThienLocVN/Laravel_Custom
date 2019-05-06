<?php
/**
 * Routes for : Price
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	
	Route::group( ['namespace' => 'Price'], function () {
	    Route::get('prices', 'PricesController@index')->name('prices.index');
	    
	    Route::get('prices/{price}/edit', 'PricesController@edit')->name('prices.edit');
	    Route::patch('prices/{price}', 'PricesController@update')->name('prices.update');
	    
	    //For Datatable
	    Route::post('prices/get', 'PricesTableController')->name('prices.get');
	});
	
});