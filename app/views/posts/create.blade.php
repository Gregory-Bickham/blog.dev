@extends('layouts.master') 

@section('content')
	
	{{ Form::open(array('action' => 'PostsController@store')) }}

	@include('posts.form');
	
	{{ Form::close() }}
	






@stop