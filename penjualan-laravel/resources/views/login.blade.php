<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">


  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>  <br/>


  <title>Login</title>
</head>
<link rel="stylesheet" href="{{asset('/semantic/semantic.css')}}">
  
  <script src="{{asset('/semantic/jquery-2.1.4.min.js')}}"></script>
  
<body>
    {!! Form::open(array('url' => 'login','class'=>'ui form')) !!}
<form class="ui form">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="ui two column centered grid">
  <div class="column">
    <h1 class="ui teal image header">
<!--       <img src="assets/images/logo.jpg" class="image"> -->
      <div class="content">
      Log-in
      </div>
    </h1>
    <form class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <button type="submit" class="ui fluid large teal submit button">Login</button>
      </div>

      <div class="ui error message"></div>

    </form>

<!--     <div class="ui message">
      New to us? <a href="#">Sign Up</a>
    </div> -->

  </div>
</div>
</form>
{!! Form::close() !!}  
</body>
</html>