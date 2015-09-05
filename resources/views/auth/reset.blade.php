@extends('master')

@section('content')
<div class="wrapper style1 first">
  <article class="container" id="top">
    <div class="row">
      <div class="8u">
        <h1>Reset Your Password</h1>
        <form method="POST" action="/password/reset">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                Email
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div>
                Password
                <input type="password" name="password">
            </div>

            <div>
                Confirm Password
                <input type="password" name="password_confirmation">
            </div>

            <div>
                <button type="submit">
                    Reset Password
                </button>
            </div>
        </form>
      </div>
    </div>
  </article>
</div>
@stop
