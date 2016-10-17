<html>
<head>
  <link rel="stylesheet" href="{{ URL::asset('assets/css/login.css') }}">
</head>
<body>
<div class="login-page">
  <div class="form">
      <form class="login-form" role="form" method="POST" action="{{ url('/password/email') }}">
      {{ csrf_field() }}
      <input type="text" name="email" value="{{ old('email') }}" placeholder="email" required autofocus>
      @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
      <button type="submit">submit</button>
      <p class="message">
        <a href="{{ url('/login') }}">
            Already have an account?
        </a>
      </p>
      <p class="message">Not registered? <a href="{{ url('/signup') }}">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>
