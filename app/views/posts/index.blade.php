@extends('layouts.master')

@section('content')
	
	@foreach($posts as $post)
		<h1>{{{ $post->title }}}</h1>
		<p>{{{ $post->body }}}</p>
	@endforeach

	<a href="{{{ action('PostsController@create') }}}">Create new one</a>
@stop