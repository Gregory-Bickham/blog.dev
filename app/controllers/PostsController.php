<?php

class PostsController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function index()
	{
		$keyword = Input::get('keyword');
		
		if (is_null($keyword)) {
			
			$posts = Post::with('user')->paginate(4);	
		} else{

			$posts = Post::with('user')->where('title', 'LIKE', "%$keyword%")->orWhere('body', 'LIKE', "%$keyword%")->paginate(4);
		}

		
		$data = ['posts' => $posts];
		return View::make('posts.index')->with($data);

	}

	public function create()
	{
		return View::make('posts.create');
	}

	public function store()
	{
        $post = new Post();
        Log::info(Input::all());
		return $this->validateAndSave($post);

	}

	public function show($id)
	{
		$post = Post::find($id);
		$data = ['post' => $post];

		if(is_null($post))
		{
			App::abort(404);
		}
		return View::make('posts.show')->with($data);
	}

	public function edit($id)
	{
		$post = Post::find($id);
		$data = ['post' => $post];
		if(is_null($post))
		{
			App::abort(404);
		}
		return View::make('posts.edit')->with($data);
	}

	public function update($id)
	{
		$post = Post::find($id);
		if(is_null($post))
		{
			App::abort(404);
		}
		return $this->validateAndSave($post);
	}

	public function destroy($id)
	{
		$post = Post::find($id);

		if(!$post){

			App::abort(404);
		}

		
		Session::flash('successMessage', "The post was succesfully deleted.");
		$post->delete();
		return Redirect::action('PostsController@index');

	}

	public function validateAndSave($post)
	{
    	$validator = Validator::make(Input::all(), Post::$rules);

    	if ($validator->fails()) {

    		Session::flash('errorMessage', "This post was not succesfully saved.");
        	return Redirect::back()->withInput()->withErrors($validator);
    	}
        
		$post->title = Input::get('title');
		$post->body  = Input::get('body');
		$post->user_id  = Auth::id();
		$post->save();

		Session::flash('successMessage', "This post was succesfully saved.");
		return Redirect::action('PostsController@show', $post->id);
	}

}
