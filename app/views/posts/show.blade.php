@extends('layouts.master')

@section('content')
	
	<div class="container">
		
		<h1>{{{ $post->title }}}</h1>
	
		<p>{{{ $post->body }}}</p>
	
		<p>Created at: {{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}</p>

		<p>Created by: {{{ $post->user->first_name }}} {{{$post->user->last_name}}}</p>

		<p class="btn-group">
		
			<a href="{{{ action('PostsController@edit', $post->id) }}}" class="btn btn-default">Edit</a>
		
			{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE')) }}
	    	{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
			{{ Form::close() }}

		</p>
	</div>

@stop

