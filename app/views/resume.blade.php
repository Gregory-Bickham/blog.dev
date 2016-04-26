@extends('layouts.master')

@section('top-script')
	<link rel="stylesheet" type="text/css" href="/css/ResumeStyles.css">
	<title>Resume</title>
@stop


@section('content')
	<div class="container">
      <div class="profile_pic"></div>
      <div class="starter-template">
        <h1>Gregory Charles Bickham II</h1>
        <p class="lead">Failed Web Developer</p>
      </div>

    </div><!-- /.container -->

    <section class="text-center section_style">
    <p>
      <h1 class="h_style">Work History</h1>
    </p>
    <p> 
        <h2><img src="/img/logo-uber.png" class="logo_layout"></h2>
        <h4>Independent Contractor</h4>
        <ul>Responsibilities</ul>
        <h2><img src="/img/lyft_logo.png" class="logo_layout"></h2>
        <h4>Independent Contractor</h4>
        <ul>Responsibilities
        </ul>
        <h2><img src="/img/sushi-zushi.gif" class="logo_layout"></h2>
        <h4>Sous Chef/Sushi Chef</h4>
        <ul>Responsibilities
        </ul>
    </p>
      <a href="#top">Go to the top of the page</a>
    <hr>
    <a href="#work">
  </section>    
@stop