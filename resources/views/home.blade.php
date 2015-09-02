@extends('master')

@section('content')
<!-- Home -->
  <div class="wrapper style1 first">
    <article class="container" id="top">
      <div class="row">
        <div class="8u">
          <header>
            <h1>Welcome to <strong>Find Enchiladas</strong></h1>
          <div id="login">
              <p>We offer <strong>personalized notifications</strong> for food across the 5C's.</p>
                  <p style="margin-bottom: 1em;">
                      Log in here...
                      {{-- <label for="rad-email">Email</label><input type="radio" name="choose" id="rad-email" onclick="showUsername();hidePhone()" checked> --}}

                  </p>
              {{-- {!! Form::open(['id' => 'phone', 'style' => 'display:none']) !!}
                  <input type="text" name="phone" placeholder="Phone Number" style="width:500px;">
                  <input type="password" name="passPhone" placeholder="Password" style="width:500px;">
                  <input type="submit" class="button big scrolly" value="Enter" style="margin-top: 1em">
              {!! Form::close() !!} --}}
              {!! Form::open(['id' => 'username', 'url' => '/login']) !!}
                <input type="text" name="email" placeholder="E-mail" style="width:500px;">
                <input type="password" name="password" placeholder="Password" style="width:500px;">
                <input type="submit" class="button big scrolly" value="Enter" style="margin-top: 1em">	<input type="button" value="forgot password?" class="alt" onClick="showForgot();hideLogin()">
              {!! Form::close() !!}
          </div>

          {!! Form::open(['id' => 'forgot', 'style' => 'display:none']) !!}
            <p>
              Please enter your username to retrieve password...
            </p>
            <input type="text" name="userForgot" placeholder="Username">
            <input type="text" name="emailForgot" placeholder="E-mail">
            <input type="submit" value="Get Password">
          {!! Form::close() !!}
        </div>
        <div class="4u">
          <span class="image fit"><img src="{{ URL::asset('assets/images/pic00.jpg') }}" alt="" /></span>
        </div>
      </div>
    </article>
  </div>
@stop

@section('scripts')
<script>
        function showPhone(){
            x = document.getElementById('phone');
            $(document).ready(function(){
      $(x).slideDown();
      $(x).css("display", "block");
    });
        }
        function hidePhone(){
    x = document.getElementById('phone');
    $(document).ready(function(){
      $(x).slideUp();
    });
  }
        function hideUsername(){
    x = document.getElementById('username');
    $(document).ready(function(){
      $(x).slideUp();
    });
  }
        function showUsername(){
            x = document.getElementById('username');
            $(document).ready(function(){
      $(x).slideDown();
      $(x).css("display", "block");
    });
        }
  function hideLogin(){
    x = document.getElementById('login');
    $(document).ready(function(){
      $(x).slideUp();
    });
  }
  function showForgot(){
    x = document.getElementById('forgot');
    $(document).ready(function(){
      $(x).slideDown();
      $(x).css("display", "block");
    });
  }
</script>
@stop
