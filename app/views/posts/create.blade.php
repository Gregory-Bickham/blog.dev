@extends('layouts.master')

@section('content')
	<form action="{{{ action('PostsController@store') }}}" method="post">
  		Title: <input type="text" name="title" value ="{{{ Input::old('title') }}}">
  		{{ $errors->first('title', '<span class="help-block">:message</span>') }}<br>
  		Body: <input type="text" name="body" value ="{{{ Input::old('body') }}}">
  		{{ $errors->first('body', '<span class="help-block">:message</span>') }}<br>
  		<input type="submit" value="Submit">
	</form>

@stop