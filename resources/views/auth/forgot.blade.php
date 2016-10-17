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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64484825-1', 'auto');
  ga('send', 'pageview');

</script>
</html>
