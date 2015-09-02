@extends('master')


@section('styles')
<style>
  .form-control {
  }
</style>
@stop
@section('content')
<div class="wrapper style1 first" style="padding-top: 4em;">
  <article class="container" id="top">
    <div class="row" id="signup">
    {!! Form::open() !!}
      <p>We offer <strong>personalized notifications</strong> for food across the 5C's.</p>
      <div>
        <div class="row">
          <div class="12u">
              <div>
                <div class="row">
                  <div class="12u">
                    <p>
                      Please select a college...
                    </p>
                    <table>
                      <tr>
                        <td align="center" valign="middle"><input type="radio" name="college" id="cmc" value="cmc"><label for='cmc'><img src="{{ URL::asset('assets/css/colleges/CMC.png') }}" height="100" width="100"/></label></td>
                        <td align="center" valign="middle"><input type="radio" name="college" id="pom" value="pomona"><label for='pom'><img src="{{ URL::asset('assets/css/colleges/Pomona.png') }}" height="100" width="100"/></label></td>
                        <td align="center" valign="middle"><input type="radio" name="college" id="mudd" value="mudd"><label for='mudd'><img src="{{ URL::asset('assets/css/colleges/Mudd.png') }}" height="100" width="100"/></label></td>
                        <td align="center" valign="middle"><input type="radio" name="college" id="pitz" value="pitzer"><label for='pitz'><img src="{{ URL::asset('assets/css/colleges/Pitzer.png') }}" height="100" width="150"/></label></td>
                        <td align="center" valign="middle"><input type="radio" name="college" id="scr" value="scripps"><label for='scr'><img src="{{ URL::asset('assets/css/colleges/Scripps.png') }}" height="100" width="100"/></label></td>
    <!-- 																	<td><img src="css/colleges/CMC.png" alt="" height="100" width="100"/></td> -->
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="6u">
                    <table>
                      <p>Gender...</p>
                    <tr>
                      <td align="center" ><input type="radio" name="gender" id="male" value="male"><label for="male"><h1>Male</h1></label></td>
                      <td align="center" ><input type="radio" name="gender" id="female" value="female"><label for="female"><h1>Female</h1></label></td>
                    </tr>
                    </table>
                  </div>
                <div class="row">
                  <div class="6u">
                    <input type="text" name="firstName" class="form-control" placeholder="First Name" required="true"/>
                  </div>
                  <div class="6u">
                    <input type="text" name="lastName" class="form-control" placeholder="Last Name" required="true"/>
                  </div>
                  <div class="6u">
                    <input type="email" name="email" class="form-control" id="email" required="true" placeholder="Email" />
                  </div>
                  <div class="6u">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                  </div>
                  <div class="6u">
                    <input type="password" name="password" id="pass" required="true" placeholder="Password" />
                  </div>
                  <div class="6u">
                    <input type="password" name="passVerify" id="passVerify" required="true" onkeyup="verifyPassword()" placeholder="Verify Password">
                  </div>
                      <div class="12u"><h2>What meals do you want to know about?</h2></div>
                    <div class="6u">
                      <h3>Weekdays</h3>
                       <div><label for="breakfast">Breakfast</label><input type="checkbox" name="breakfast" id="meal" value="Yes" checked></div>
                       <div>Lunch <input type="checkbox" name="lunch" id="meal" value="Yes" checked></div>
                       <div>Dinner <input type="checkbox" name="dinner" id="meal" value="Yes" checked></div>
                      <h3>Weekends</h3>
                      <div>Brunch<input type="checkbox" name="brunch" id="meal" value="Yes" checked></div>
                      <div>Dinner<input type="checkbox" name="weDinner" id="meal" value="Yes" checked></div>
                    </div>
                    <div class="6u">
                      <h3>What dining halls do you want us to check?</h3>
                      <div><label for="collins">CMC</label><input type="checkbox" name="collins" id="collins" value="Yes" checked></div>
                      <div><label for="scripps">Scripps</label><input type="checkbox" name="scripps" id="scripps" value="Yes" checked></div>
                      <div><label for="pitzer">Pitzer</label><input type="checkbox" name="pitzer" id="pitzer" value="Yes" checked></div>
                      <div><label for="hMudd">Mudd</label><input type="checkbox" name="hMudd" id="hMudd" value="Yes" checked></div>
                      <div><label for="frank">Frank</label><input type="checkbox" name="frank" id="frank" value="Yes" checked></div>
                      <div><label for="frary">Frary</label><input type="checkbox" name="frary" id="frary" value="Yes" checked></div>
                      <div><label for="olden">Oldenborg</label><input type="checkbox" name="olden" id="olden" value="Yes" checked></div>
                    </div>
                    <div class="12u">
                      <h3><label for="textMsg">Notify by text message:</label><input type="checkbox" name="textMsg" id="textMsg" value="1" checked></h3>
                      <h3><label for="notifyTime">Notify me:</label>
                      <select name="notifyTime" style="">
                          <option value="none">None</option>
                          <option value="morning" selected="selected">Before Breakfast (7am)</option>
                          <option value="lunch">Before Lunch (10am)</option>
                          <option value="dinner">Before Dinner (4pm)</option>
                      </select>
                    </h3>
                  </div>
                </div>

                <div class="row 200%">
                  <div class="12u">
                    <ul class="actions">
                      <li><input type="submit" value="Sign Up" id="submit" /></li>
                      <li><input type="reset" value="Clear Form" class="alt" /></li>
                    </ul>
                  </div>
                </div>
              </div>

          </div>
      </div>
    {!! Form::close() !!}
  </div>
</article>
</div>
@stop

@section('scripts')
<script>
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
