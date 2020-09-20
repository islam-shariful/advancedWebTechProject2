@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Teacher Dashboard</title>
@endsection
@section('bodyContent')
  <div>
    <!-- messaging -->
    <p id='messaging'></p>
  </div>
  <div class="row">
    <!-- Students Chat Start Here -->
    <form method='post' action="/teacher/live-chatPOST">
      @csrf
      <input type='text' id='text' name='text' placeholder="Message" onkeyup="ajax()">
      <input type='submit' name='submit' value='Send'>
    </form>

    <!-- Students Chat End Here -->

  </div>
  <!-- Pusher Script Start ############################################### -->
  <!-- AJAX script Start-->
  <script type="text/javascript">

  function ajax(){

    var text = document.getElementById('text').value;
    var xhttp = new XMLHttpRequest();

    xhttp.open('POST', '/teacher/live-chat', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('text='+text);
  }
  </script>
  <!-- AJAX script Start-->
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('087213c5dd4708acc7e2', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      allData = data;
      // allData = JSON.stringify(data);
      // allData = JSON.parse(allData);
      output="";
      for(var i=0; i<allData.text.length; i++){
        output+="<h4>"+allData.text[i].user_id +": "+allData.text[i].text+"</h4>"
      }
      document.getElementById("messaging").innerHTML = output;

    });
  </script>
  <!-- Pusher Script End ################################################# -->
@endsection
