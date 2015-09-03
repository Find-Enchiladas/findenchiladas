@extends('master')

@section('title', 'Find Something')

@section('styles')
  <style>
    .search-results {
      list-style: circle;
      padding-left: 3em;
      font-size: 24px;
    }
  </style>
@stop
@section('content')
<div class="wrapper style1 first">
  <article class="container" id="top">
    <div class="row">
      <div class="4u">
        <span class="image fit"><img src="{{ URL::asset('assets/images/pic00.jpg') }}" alt="" /></span>
      </div>
      <div class="8u">
        <header>
          <h1>Reconnect with your craving!</h1>
        </header>
        {!! Form::open() !!}
          <p>Enter a food below, and if it's being served today, we'll tell you when and where you can find it.</p>
          <input name="food" type="text" placeholder="enchilada">
          <input type="submit" class="button big scrolly" value="Enter">
        {!! Form::close() !!}
      </div>
      <div class="12u">
      @if(isset($list))
        <h2>Here's what we found today for {{$food}}</h2>
        <ul class="search-results">
        @foreach($list as $item)
          <li>{{$item->food_name}} at {{DB::table('dining_halls')->select('nickname')->where('id', $item->dining_id)->get()[0]->nickname}} for {{$item->meal}}</li>
        @endforeach
        </ul>
      @endif
    </div>
    </div>
  </article>
</div>
@stop
