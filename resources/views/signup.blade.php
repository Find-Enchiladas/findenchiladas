@extends('master')

@section('title', 'Signup For Find Enchiladas')

@section('styles')
  <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/bootstrap-switch/bootstrap-switch.min.css') }}">
  <style>
    .signup-div {
      padding-top: 25px;
      background: #fff;
      color: #020621;
    }
    .labels-left label {
      float: left;
      padding-top: 5px;
    }
    .signup {
      margin-bottom: 25px;
    }
    .border-bottom {
      padding-bottom: 25px;
      border-bottom: 1px solid;
    }
    .colleges {
      padding-top: 25px;
    }
  </style>
@stop
@section('content')
  <section id="features" class="download bg-secondary text-center">
      <div class="container signup-div">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="section-heading">
                      <h2 class="">Signup for 5C Food Notifications</h2>
                      <p class="text-muted">Signup to start receiving personalized notifications today!</p>
                      <hr>
                  </div>
              </div>
          </div>
          <div class="row" id="signup">
            <div class="col-md-10 col-md-offset-1">
          {!! Form::open() !!}
            <div>
              <div class="row">
                <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="text-center">
                            <div class="row">
                              <img src="{{ URL::asset('assets/img/colleges/CMC.png') }}" height="100" width="100"/>
                              <img src="{{ URL::asset('assets/img/colleges/Pomona.png') }}" height="100" width="100"/>
                              <img src="{{ URL::asset('assets/img/colleges/Mudd.png') }}" height="100" width="100"/>
                              <img src="{{ URL::asset('assets/img/colleges/Pitzer.png') }}" height="100" width="150"/>
                              <img src="{{ URL::asset('assets/img/colleges/Scripps.png') }}" height="100" width="100"/>
                            </div>
                            <div class="row">
                              <div class="col-md-8 col-md-offset-2 colleges">
                                <label for="college">Please select a college...</label>
                                <select class="form-control" name="college" required>
                                  <option>Claremont McKenna</option>
                                  <option>Pomona</option>
                                  <option>Harvey Mudd</option>
                                  <option>Pitzer</option>
                                  <option>Scripps</option>
                                  <option>CGU</option>
                                  <option>Keck</option>
                                  <option>Other</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row border-bottom">
                        <div class="form-group labels-left">
                          <div class="col-md-5">
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="First Name" required="true"/>
                          </div>
                          <div class="col-md-5">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" class="form-control" placeholder="Last Name" required="true"/>
                          </div>
                          <div class="col-md-2">
                              <label>Gender</label>
                                <select class="form-control" name="gender" required>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                                  <option value="other">Other</option>
                                </select>
                          </div>
                          <div class="col-md-4">
                            <label for="lastName">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" required="true" placeholder="Email" />
                          </div>
                          <div class="col-md-2">
                            <label for="textMsg">Notify by Email:</label><input type="checkbox" name="emailMsg" id="emailMsg" value="1" checked>
                          </div>
                          <div class="col-md-4">
                            <label for="lastName">Phone Number (optional)</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number - 10 Digits" maxlength="10">
                          </div>
                          <div class="col-md-2">
                            <label for="textMsg">Notify by SMS:</label><input type="checkbox" name="textMsg" id="textMsg" value="1" checked>
                          </div>
                          <div class="col-md-6">
                            <label for="lastName">Password</label>
                            <input type="password" name="password" id="pass" class="form-control" required="true" placeholder="Password" />
                          </div>
                          <div class="col-md-6">
                            <label for="lastName">Confirm Password</label>
                            <input type="password" name="passVerify" id="passVerify" class="form-control" required="true" onkeyup="verifyPassword()" placeholder="Verify Password">
                          </div>
                        </div>
                      </div>
                      <div class="row border-bottom">
                        <h3>What meals do you want to know about?</h3>
                            <div class="col-md-6">
                              <h3>Weekdays</h3>
                              <div><label for="breakfast">Breakfast </label> <input type="checkbox" name="breakfast" id="breakfast" value="Yes" checked></div>
                               <div><label for="lunch">Lunch </label> <input class="" type="checkbox" name="lunch" id="lunch" value="Yes" checked></div>
                               <div><label for="dinner">Dinner </label> <input type="checkbox" name="dinner" id="dinner" value="Yes" checked></div>
                             </div>
                             <div class="col-md-6">
                              <h3>Weekends</h3>
                              <div><label for="brunch">Brunch</label> <input type="checkbox" name="brunch" id="brunch" value="Yes" checked></div>
                              <div><label for="weDinner">Weekend Dinner</label> <input type="checkbox" name="weDinner" id="weDinner" value="Yes" checked></div>
                            </div>
                        </div>
                          <div class="row">
                            <h3>What dining halls do you want us to check?</h3>
                          <div class="col-md-6 dining-halls">
                            <div><input type="checkbox" name="collins" id="collins" value="1" checked></div>
                            <div><input type="checkbox" name="scripps" id="scripps" value="1" checked></div>
                            <div><input type="checkbox" name="hMudd" id="hMudd" value="1" checked></div>
                          </div>
                          <div class="col-md-6 dining-halls">
                            <div><input type="checkbox" name="pitzer" id="pitzer" value="1" checked></div>
                            <div><input type="checkbox" name="frank" id="frank" value="1" checked></div>
                            <div><input type="checkbox" name="frary" id="frary" value="1" checked></div>
                          </div>
                          <div class="col-md-12 dining-halls">
                            <div><input type="checkbox" name="olden" id="olden" value="1" checked></div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <h3><label for="notifyTime">Notify me:</label>
                              <select class="form-control" name="notifyTime" style="">
                                  <option value="morning" selected="selected">Before Breakfast (7am)</option>
                                  <option value="lunch">Before Lunch (10am)</option>
                                  <option value="dinner">Before Dinner (4pm)</option>
                              </select>
                            </h3>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                            <input type="submit" class="btn btn-primary signup" value="Sign Up" id="submit" />
                        </div>
                    </div>

                </div>
            </div>
          {!! Form::close() !!}
          </div>
        </div>
  </section>
@stop

@section('scripts')
<script src="{{ URL::asset('assets/admin/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
<script>
  $("[name='textMsg'], [name='emailMsg']").bootstrapSwitch();
  $("[name='breakfast'], [name='lunch'], [name='dinner'], [name='brunch'], [name='weDinner']").bootstrapSwitch({
    size: 'mini',
    onColor: 'success',
    offColor: 'danger'
  });
  $("[name='collins']").bootstrapSwitch({
    size: 'large',
    offColor: 'danger',
    labelText: 'Collins',
  });
  $("[name='scripps']").bootstrapSwitch({
    size: 'large',
    offColor: 'danger',
    labelText: 'Scripps',
  });
  $("[name='pitzer']").bootstrapSwitch({
    size: 'large',
    offColor: 'danger',
    labelText: 'Pitzer',
  });
  $("[name='hMudd']").bootstrapSwitch({
    size: 'large',
    offColor: 'danger',
    labelText: 'Mudd',
  });
  $("[name='frank']").bootstrapSwitch({
    size: 'large',
    offColor: 'danger',
    labelText: 'Frank',
  });
  $("[name='frary']").bootstrapSwitch({
    size: 'large',
    offColor: 'danger',
    labelText: 'Frary',
  });
  $("[name='olden']").bootstrapSwitch({
    size: 'large',
    offColor: 'danger',
    labelText: 'Oldenborg',
  });
  function verifyPassword(){ //allows user to check if verify password is correct
    var password = document.getElementById('pass').value;
    var passVerify = document.getElementById('passVerify').value;
    if(password != passVerify){
      document.getElementById("passVerify").style.backgroundColor = "#E34234"; //changes to a pretty red if wrong
      document.getElementById("submit").type = "button";
    }
    else{
      document.getElementById("passVerify").style.backgroundColor = "#66cc66";
      document.getElementById("submit").type = "submit"; //once verify password is correct, submit button works again
    }
  }
</script>
@stop
