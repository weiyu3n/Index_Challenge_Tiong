<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Goutte\Client;
use App\Models\Memes;

use Validator;

class WebController extends Controller
{
    public function index() {
    
        $memes = memes::paginate(9);

        return view('index',compact('memes'));
    }

    public function goCreate() {

        return view('create');
    }

    public function all() {

        $memes = memes::select('id','name','url','page')->get();

        return $memes;
    }

    public function id($id) {
        $meme = memes::where('id', $id)
                        ->select('id','name','url','page')
                        ->get();

        return $meme;
    }

    public function page($pageid) {
        $memes = memes::where('page', $pageid)
                        ->select('id','name','url','page')
                        ->get();

        return $memes;
    }

    public function create(Request $request) {

        $rules=array(
            'url' => array('url', 'regex:~^https?://(?:[a-z0-9\-]+\.)+[a-z]{2,6}(?:/[^/#?]+)+\.(?:jpe?g|gif|png)$~'),
        );

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);
        }else{

            $page = memes::max('page');
            $count = memes::where('page',$page)->count();

            if($count >= 9 )
            {
                $page++;
            }

            $new = new memes();
            $new->name = $request->name;
            $new->url = $request->url;
            $new->page = $page;
            $new->save();
            return redirect()->route('index');
        }
        
    }
}