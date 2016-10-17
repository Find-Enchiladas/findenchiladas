@extends('master')

@section('title', 'Signup For Find Enchiladas')

@section('styles')
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/bootstrap-switch/bootstrap-switch.min.css') }}">
  <style>
    .search-div {
      padding-top: 25px;
      background: #fff;
      color: #020621;
    }
    .labels-left label {
      float: left;
      padding-top: 5px;
    }
    .search {
      margin-bottom: 40px;
    }
    .border-bottom {
      padding-bottom: 25px;
      border-bottom: 1px solid;
    }
    .food-list li {
      text-align: left;
    }
  </style>
@stop
@section('content')
  <section id="features" class="download bg-secondary text-center">
      <div class="container search-div">
          <div class="row">
              <div class="col-lg-12">
                  <div class="section-heading">
                      <h2 class="text-center">Search the 5Cs</h2>
                      <br>
                  </div>
              </div>
          </div>
          <div class="row search" id="search">
            <div class="col-md-10 col-md-offset-1">
              <form class="text-center" method="POST">
                {{ csrf_field() }}
                <div class="form-group labels-left">
                  <div class="row">
                    <div class="col-md-8">
                      <input type="text" name="food" id="food" class="form-control" placeholder="enter a food">
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                  </div>
                </div>
              </form>
              @if(isset($list))
                <h2>Here's what we found today for {{$food}}</h2>
                <ul class="food-list">
                @foreach($list as $item)
                  <li>{{$item->food_name}} at {{DB::table('dining_halls')->select('nickname')->where('id', $item->dining_id)->get()[0]->nickname}} for {{$item->meal}}</li>
                @endforeach
                </ul>
              @endif
          </div>
        </div>
  </section>
@stop

@section('scripts')
<script src="{{ URL::asset('assets/admin/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
@stop
