@extends('layouts.master')

@section('content')
	
	@foreach($posts as $post)
		<h1><a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a></h1>
		<p>{{{ $post->body }}}</p>
		<p>Created at: {{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</p>
	@endforeach

	<a href="{{{ action('PostsController@create') }}}">Create new one</a>

	{{ $posts->appends(array('keyword' => Input::get('keyword')))->links() }}
@stop