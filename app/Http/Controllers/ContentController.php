<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Content;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $url = $request->get('url');
        $title = $this->getTitleFromUrl($url);
        $type = $this->determineType($url);
        $body = $this->getBodyBasedOnType($type, $url); //Body contents depend on content type - YouTube = id, Vimeo = id, Soundcloud = url, Default = first img url
        $user_id = (Auth::user() ? Auth::user()->id : null);

//        dd($body);

        Content::create([
            'url' => $url,
            'title' => $title,
            'type' => $type,
            'body' => $body,
            'user_id' => $user_id,
            'published_at' => Carbon::now()
        ]);

        return redirect('/home');
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
        $uploader = User::find($content->user_id);
        $comments = Comment::all()->where('content_id', '=', $id);

        return view('content.detail', compact('content', 'uploader', 'comments'));
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

    // Private helper functions
    private function getTitleFromUrl($url)
    {
        $options = array(
            'http' => array(
                'ignore_errors' => true,
                'user_agent' => $_SERVER['HTTP_USER_AGENT']
            )
        );

        $context = stream_context_create($options);
        $doc = new \DOMDocument();
        @$doc->loadHTML(file_get_contents($url, false, $context));
        $title = $doc->getElementsByTagName("title")->item(0)->nodeValue;

        return (strlen($title) > 0 ? $title : "No title specifiec");
    }

    private function determineType($url)
    {
        $parsed_url = parse_url($url);

        if (preg_match("~\byoutube\b~", $parsed_url['host']) || preg_match("~\byoutu.be\b~", $parsed_url['host'])) {
            return "YouTube";
        } elseif (preg_match("~\bvimeo\b~", $parsed_url['host'])) {
            return "Vimeo";
        } elseif (preg_match("~\bsoundcloud\b~", $parsed_url['host'])) {
            return "Soundcloud";
        } else {
            return "Default";
        }
    }

    private function getBodyBasedOnType($type, $url)
    {
        switch ($type) {
            case "YouTube":
                preg_match("/.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/", $url, $video);
                return ($video && strlen($video[1]) == 11) ? $video[1] : 'dQw4w9WgXcQ'; // Return Rick Astley when url fails to parse
                break;
            case "Vimeo":
                if (preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $output_array)) {
                    return $output_array[5];
                } else {
                    return '77091919'; // Return Rick Astley when url fails to parse
                }
                break;
            case "Soundcloud":
                return $url; //Easy case: we can use the URL in the iframe
                break;
            default:
                //Get first image from page
                $html = file_get_contents($url);

                $doc = new \DOMDocument();
                @$doc->loadHTML($html);

                $tags = $doc->getElementsByTagName('img');

                if (count($tags) > 0) {
                    $res = $url . '/' . $tags[1]->getAttribute('src');
                    return $res;
                } else {
                    return 'https://i.ytimg.com/vi/TSXXi2kvl_0/maxresdefault.jpg'; //
                }
                break;
        }
    }
}
