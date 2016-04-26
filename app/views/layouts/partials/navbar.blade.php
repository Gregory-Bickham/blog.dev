<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Gregory.Bickham</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Gregory Bickham</a>
      <ul class="nav navbar-nav center-block centeredMediaButtons">
              <li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
              <li><a href="http://www.twitter.com" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
              <li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
              <li><a href="http://www.linkedin.com" target="_blank"><i class="fa fa-lg fa-linkedin"></i></a></li>
          </ul>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        @if (!Auth::check())
        
          <li><a href="/login">Log In</a></li>  
         
         @else 

          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="/logout">Log Out</a></li>
        
        @endif
        

        
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

