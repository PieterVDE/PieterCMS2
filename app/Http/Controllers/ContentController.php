<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    //Route::get('content/add', 'ContentController@create');
    /**
     * Show the form for creating new content.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.add');
    }

    //Route::post('content/add', 'ContentController@store');
    /**
     * Store newly created content in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //TODO ContentAddRequest instead of Request
    public function store(Request $request)
    {
    }

    //Route::get('content/{id}', 'ContentController@show');
    /**
     * Display the specified content.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::findOrFail($id);
        return view('content.detail', compact('content'));
    }

    //Route::get('content/{id}/edit', 'ContentController@edit');
    /**
     * Show the form for editing content.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('content.edit');
    }

    //Route::post('content/{id}/edit', 'ContentController@update');
    /**
     * Update the specified content in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    //Route::post('content/{id}/delete', 'ContentController@delete');
    /**
     * Remove the specified content from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
