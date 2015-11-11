@extends('master')

@section('title', 'Welcome '.\Auth::user()->first_name)

@section('styles')
<style>
  #turnOn {
    background: #30a146;
  }
  #turnOff {
    background: #c60000;
  }
</style>
@stop
@section('content')
<div class="wrapper style1 first">
  <article class="container" id="top">
    <div class="row">
      <div class="4u">
        <span class="image fit"><img src="{{ URL::asset('/assets/images/pic00.jpg') }}" alt="" /></span>
      </div>
      <div class="8u">
        <header>
          @if(Session::has('added-favorite'))
              <h1 class="alert alert-success">{{ Session::get('added-favorite') }}</h1>
          @else
          <h1>Enter Your Favorite Foods!</h1>
          @endif
        </header>
          <p>Don't want notifications? Turn them off here.</p>
        {!! Form::open(['id' => 'sms', 'url' => '/user/settings/sms']) !!}
          @if(\Auth::user()->smsNotify == 0)
          <input type="hidden" name="smsVal" value="1">
          <input type="submit" id="turnOn" class="button big scrolly"
            value="Turn On SMS">
          @else
          <input type="hidden" name="smsVal" value="0">
          <input type="submit" id="turnOff" class="button big scrolly"
            value="Turn Off SMS">
          @endif
        {!! Form::close() !!}
      </div>
    </div>
  </article>
</div>
@stop
