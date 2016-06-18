<?php 

Route::get(config('QueueView.route') . '/', [		'as' => config('QueueView.route').'.index',		'uses' => 'Grambas\QueueView\QueueViewController@index']);
Route::get(config('QueueView.route') . '/queue', [		'as' => config('QueueView.route').'.queue.index',		'uses' => 'Grambas\QueueView\QueueViewController@index']);
Route::get(config('QueueView.route') . '/queue.get', [		'as' => config('QueueView.route').'.queue.get',	'uses' => 'Grambas\QueueView\QueueViewController@queueGet']);
Route::get(config('QueueView.route').'/queue/delete/{id}',['as'=>config('QueueView.route').'.queue.delete','uses' => 'Grambas\QueueView\QueueViewController@queueDelete']);


Route::get(config('QueueView.route') . '/failed', [	'as' => config('QueueView.route').'.failed.index',	'uses' => 'Grambas\QueueView\QueueViewController@failedIndex']);
Route::get(config('QueueView.route') . '/failed/get', [	'as' => config('QueueView.route').'.failed.get',	'uses' => 'Grambas\QueueView\QueueViewController@failedGet']);
Route::get(config('QueueView.route') . '/failed/delete/{id}', ['as' => config('QueueView.route').'.failed.delete',	'uses' => 'Grambas\QueueView\QueueViewController@FailedDelete']);
