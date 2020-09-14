@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Notice Board</title>
@endsection

@section('bodyContent')
  <div class="row">
    <!-- Add Notice Area Start Here -->
    <div class="col-4-xxxl col-12">
      <div class="card height-auto">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>Create A Notice</h3>
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

              <div class="dropdown-menu dropdown-menu-right">
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
              </div>
            </div>
          </div>
          <form method="post" class="new-added-form">
            @csrf
            <div class="row">
              <div class="col-12-xxxl col-lg-6 col-12 form-group">
                <label>Notice ID</label>
                <input
                  name="notice_id"
                  type="text"
                  placeholder="noticeId"
                  class="form-control"
                />
              </div>
              <div class="col-12-xxxl col-lg-6 col-12 form-group">
                <label>Description</label>
                <input
                  name="description"
                  type="text"
                  placeholder="notice description"
                  class="form-control"
                />
              </div>
              <div class="col-12-xxxl col-lg-6 col-12 form-group">
                <label> Subject ID </label>
                <input
                  name="subject_id"
                  type="text"
                  placeholder="subject"
                  class="form-control"
                />
                <i class="fas fa-user"></i>
              </div>
              <div class="col-12-xxxl col-lg-6 col-12 form-group">
                <label>Class ID</label>
                <input
                  name="class_id"
                  type="text"
                  placeholder="Class"
                  class="form-control"
                />
              </div>
              <div class="col-12-xxxl col-lg-6 col-12 form-group">
                <label>Section ID</label>
                <input
                  name="section_id"
                  type="text"
                  placeholder="section"
                  class="form-control"
                />
              </div>
              <div class="col-12 form-group mg-t-8">
                <button
                  type="submit"
                  class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"
                >
                  Save
                </button>
                <!-- <button
                  type="reset"
                  class="btn-fill-lg bg-blue-dark btn-hover-yellow"
                >
                  Reset [Under Production]
                </button> -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Add Notice Area End Here -->
    <!-- All Notice Area Start Here -->
    <div class="col-8-xxxl col-12">
      <div class="card height-auto">
        <div class="card-body">
          <!-- <div class="heading-layout1">
            <div class="item-title">
              <h3>Notice Board</h3>
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

              <div class="dropdown-menu dropdown-menu-right">
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
              </div>
            </div>
          </div> -->
          <form method='POST' action='/teacher/notice-boardSearch' class="mg-b-20">
            @csrf
            <div class="row gutters-8">
              <div class="col-lg-5 col-12 form-group">
                <input
                  name='class_id'
                  id='class_id'
                  onkeyup="ajax()"
                  type="text"
                  placeholder="Search by Class"
                  class="form-control"
                />
              </div>
              <!-- <div class="col-lg-5 col-12 form-group">
                <input
                  type="text"
                  placeholder="Search by Date [Under Production]"
                  class="form-control"
                />
              </div> -->
              <!-- <div class="col-lg-2 col-12 form-group">
                <button
                  type="submit"
                  class="fw-btn-fill btn-gradient-yellow"
                >
                  SEARCH
                </button>
              </div> -->
            </div>
          </form>
          <div class="notice-board-wrap"  id="data">
            <!-- @for($i=0; $i != count($noticeList);$i++)
            <div class="notice-list">
              <div class="post-date bg-skyblue">
                 {{ $noticeList[$i]['noticedate'] }}
              </div>
              <h6 class="notice-title">
                <a href="#">{{ $noticeList[$i]['description'] }}</a>
              </h6>
              <div class="entry-meta">
                Class :{{  $noticeList[$i]['class_id'] }}/ Section :
                <span>{{ $noticeList[$i]['section_id'] }}</span>/ Subject :
                <span>{{ $noticeList[$i]['subject_id'] }}</span>/
                <i>Notice ID : </i>
                <span><i>{{ $noticeList[$i]['notice_id'] }}</i></span>
              </div>
            </div>
            @endfor -->
          </div>
        </div>
      </div>
    </div>
    <!-- All Notice Area End Here -->
  </div>
  <!-- AJAX script Start-->
  <script type="text/javascript">

  function ajax(){

    var class_id = document.getElementById('class_id').value;
    var xhttp = new XMLHttpRequest();

    xhttp.open('POST', '/teacher/notice-boardSearch', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('class_id='+class_id);

    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        document.getElementById('data').innerHTML =  this.responseText;

      }
      else{
        document.getElementById('data').innerHTML =  "Connection Error";
      }
    }

  }
  </script>
  <!-- AJAX script Start-->
@endsection
