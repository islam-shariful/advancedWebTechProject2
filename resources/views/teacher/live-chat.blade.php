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
    <form method='post'>
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
      var id = data.text[0];
      //Message NULL check
      if(data.text[1] == null){
        textMessage = "";
      }else{
        textMessage = data.text[1]
      }
      var textMessage = data.text[1];
      document.getElementById("messaging").innerHTML = id +": "+ textMessage;

      //alert(JSON.stringify(data));
    });
  </script>
  <!-- Pusher Script End ################################################# -->
@endsection
