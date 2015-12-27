<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //Route::post('content/{id}', 'CommentsController@store');
    /**
     * Store newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //TODO ContentAddRequest instead of Request
    public function store(Request $request)
    {
        if(Auth::user()) {
            $user_id = Auth::user()->id;
        } else {
            $user_id = null;
        }
        $content_id = $request->get('content_id');
        $body = $request->get('comment');

        if (strlen($body) > 1) {
            Comment::create([
                'user_id' => $user_id,
                'content_id' => $content_id,
                'body' => $body,
            ]);
        }
        return redirect('/content/' . $content_id);
    }
}