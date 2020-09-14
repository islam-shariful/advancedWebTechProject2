@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Class Routine</title>
@endsection
@section('bodyContent')
  <!-- Class Routine Area Start Here -->
  <div class="row">
    <div class="col-8-xxxl col-12">
      <div class="card height-auto">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>Class Routine</h3>
            </div>
            <div class="dropdown">
              <a
                class="dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
                >...</a
              >

              <!-- <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#"
                ><i class="fas fa-times text-orange-red"></i>Close</a
              >
              <a class="dropdown-item" href="#"
                ><i class="fas fa-cogs text-dark-pastel-green"></i
                >Edit</a
              >
              <a class="dropdown-item" href="#"
                ><i class="fas fa-redo-alt text-orange-peel"></i
                >Refresh</a
              >
            </div> -->
            </div>
          </div>
          <form action="/teacher/class-routine" method="post" class="mg-b-20">
            @csrf
            <div class="row gutters-8">
              <div class="col-lg-4 col-12 form-group">
                <input
                  name="teacher_id"
                  id="teacher_id"
                  onkeyup="ajax()"
                  type="text"
                  placeholder="Enter Teacher ID [e.g. 20-****-03]"
                  class="form-control"
                />
              </div>
              <!-- <div class="col-lg-3 col-12 form-group">
                <input
                  name="class_id"
                  id="class_id"
                  type="text"
                  placeholder="Search by Class [Under Construction]"
                  class="form-control"
                />
              </div>
              <div class="col-lg-3 col-12 form-group">
                <input
                  name="section_id"
                  id="section_id"
                  type="text"
                  placeholder="Search by Section [Under Construction]"
                  class="form-control"
                />
              </div>
              <div class="col-lg-2 col-12 form-group">
                <button
                  type="submit"
                  class="fw-btn-fill btn-gradient-yellow"
                >
                  SEARCH
                </button>
              </div> -->
            </div>
          </form>
          <div class="table-responsive">
            <table class="table display data-table text-nowrap">
              <thead>
                <tr>
                  <th>Day</th>
                  <th>Class ID</th>
                  <th>SubjectName</th>
                  <th>Subject ID</th>
                  <th>Section Name</th>
                  <th>Section ID</th>
                  <th>Teacher ID</th>
                  <th>Teacher Name</th>
                  <th>Starting Time</th>
                  <th>Ending Time</th>
                  <th>Routine ID</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="data">
                <!-- @for($i=0; $i != count($routineList); $i++)
                <tr>
                  <th>{{ $routineList[$i]['day'] }}</th>
                  <th>{{ $routineList[$i]['class_id'] }}</th>
                  <th>{{ $routineList[$i]['subjectname'] }}</th>
                  <th>{{ $routineList[$i]['subject_id'] }}</th>
                  <th>{{ $routineList[$i]['sectionname'] }}</th>
                  <th>{{ $routineList[$i]['section_id'] }}</th>
                  <th>{{ $routineList[$i]['teacher_id'] }}</th>
                  <th>{{ $routineList[$i]['teachername'] }}</th>
                  <th>{{ $routineList[$i]['startingtime'] }}</th>
                  <th>{{ $routineList[$i]['endingtime'] }}</th>
                  <th>{{ $routineList[$i]['routine_id'] }}</th>
                </tr>
                @endfor -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Class Routine Area End Here -->
  <!-- AJAX script Start-->
  <script type="text/javascript">

  function ajax(){

    var teacher_id = document.getElementById('teacher_id').value;
    var xhttp = new XMLHttpRequest();

    xhttp.open('POST', '/teacher/class-routine', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('teacher_id='+teacher_id);

    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById('data').innerHTML =  this.responseText;

      }
      else{
        document.getElementById('data').innerHTML =  "Connection Error";
      }
    }
  }

  function abc(){
    alert('test');
  }
  </script>
  <!-- AJAX script Start-->
@endsection
