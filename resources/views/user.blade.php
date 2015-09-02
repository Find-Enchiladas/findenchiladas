@extends('master')

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
          <p> Every day, we will check whether your favorite foods are being served, and if they are, we'll tell you when and where to find them. For best results, only enter single words with no spaces, and in singular form (e.g. instead of searching for "Rosa's Handmade Enchiladas," just search for "enchilada").</p>
          <ul>
          @foreach($favorites as $fav)
            <li>{{$fav->food_name}} {!! Form::open([
              'method' => 'PATCH',
              'route' => ['favorite.delete', $fav->id],
              ]) !!}
              {!! Form::submit('Delete') !!}
              {!! Form::close() !!}</li>
          @endforeach
          </ul>
        {!! Form::open() !!}
          <input name="food" type="text" placeholder="enchilada">
          <input type="submit" class="button big scrolly" value="Enter">
        {!! Form::close() !!}
      </div>
    </div>
  </article>
</div>
@stop
