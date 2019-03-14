<?php


Route::get('qwe', [
    'as' => 'index',
    'uses' => 'Pixyboy\Tlh\Controllers\TlhController@index'
]);


Route::group(['prefix' => 'category'], function () {
    Route::get('show', [
        'as' => 'add.category',
        'uses' => 'Pixyboy\Tlh\Controllers\TlhController@addCategory'
    ]);
    Route::post('create', [
        'as' => 'post.category',
        'uses' => 'Pixyboy\Tlh\Controllers\TlhController@postCategory'
    ]);
    Route::get('/category-selector/{id?}/{child?}', [
        'as' => 'category.selector',
        'uses' => 'Pixyboy\Tlh\Controllers\TlhController@selector'
    ]);
});
