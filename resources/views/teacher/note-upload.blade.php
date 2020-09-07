@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Note Upload</title>
@endsection

@section('bodyContent')
  <!-- Breadcubs Area End Here -->
  <div>
    <form
      method="post"
      enctype="multipart/form-data"
    >
    @csrf
      <!-- <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddone1"
            >Upload</span
          >
        </div>
        <div class="custom-file">
          <input
            name="notes"
            type="file"
            class="custom-file-input"
            id="inputGroupFile01"
            aria-describedby="inputGroupFileAddon@1"
          />
          <label class="custom-file-label" for="inputGroupFile01"
            >Choose Notes</label
          >
        </div>
      </div> -->
      <!-- Assignment & Note Upload Div Start -->
      <div>
        <div>
          <label>Class ID:</label>
          <input type="text" name="class_id" placeholder="Class ID"/>
          <label>Section ID:</label>
          <input type="text" name="section_id" placeholder="Section ID"/>
          <label>Subject ID:</label>
          <input type="text" name="subject_id" placeholder="Subject ID"/>
          </br></br>
          <label>Assignment ID:</label>
          <input type="text" name="assignment_id" placeholder="Assignment ID"/>
          <label>Due Date:</label>
          <input type="date" name="duedate" placeholder="Due Date"/>
          </br></br>
          <label>Note ID:</label>
          <input type="text" name="note_id" placeholder="Note ID"/>


        </div></br>
        <div>
          <label>Upload Assignment:</label>
          <input type="file" name="uploadAssignment" />
          {{session('assignmentUploadStatus')}}
        </div>
        <div>
          <label>Upload Notes:</label>
          <input type="file" name="uploadNote" />
          {{session('noteUploadStatus')}}
        </div>
        <input type="submit" name="submit" value='Upload' class="btn-gradient-yellow" />
        {{session('bothUploadStatus')}}
        {{session('failedUploadStatus')}}
      </div>
      <!-- Assignment & Note Upload Div End -->
    </form>
  </div></br>
  <!-- Assignment Start Here -->
  <div class="row">
    <div class="col-lg-6 col-4-xxxl col-xl-6">
      <div class="card dashboard-card-three">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>Assignments</h3>
            </div>
            <!-- <div class="dropdown">
              <a
                class="dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
                >...</a
              >
            </div> -->
          </div>
          <form method='POST' action='/teacher/searchAssignment' class="mg-b-20">
            @csrf
            <div class="row gutters-8">
              <div class="col-lg-5 col-12 form-group">
                <input
                  name='class_id'
                  type="text"
                  placeholder="Search by Class"
                  class="form-control"
                />
              </div>
              <div>
                <button
                  type="submit"
                  class="fw-btn-fill btn-gradient-yellow"
                >
                  SEARCH
                </button>
              </div>
            </div>
          </form></br>
          <div class="notice-board-wrap">
            @for($i=0; $i !=count($assignmentList);$i++)
            <div class="notice-list">
              <div class="post-date bg-skyblue">
                {{ $assignmentList[$i]->date }}
              </div>
              <h6 class="notice-title">
                <a href="#">{{ $assignmentList[$i]->filename }}</a>
              </h6>
              <div class="entry-meta">
                Class : {{  $assignmentList[$i]->class_id }}/ Section :
                <span>{{ $assignmentList[$i]->section_id }}</span>/ Subject :
                <span>{{ $assignmentList[$i]->subject_id }}</span>/
                <i>Due Date : </i>
                <span><i>{{ $assignmentList[$i]->duedate }}</i></span>
              </div>
            </div>
            @endfor
          </div>
          <div class="doughnut-chart-wrap">
            <canvas
              width="100"
              height="270"
            ></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- Assignment End Here -->
    <!-- Note Start Here -->
    <div class="col-lg-6 col-4-xxxl col-xl-6">
      <div class="card dashboard-card-six">
        <div class="card-body">
          <div class="heading-layout1 mg-b-17">
            <div class="item-title">
              <h3>Notes</h3>
            </div>
            <!-- <div class="dropdown">
              <a
                class="dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
                >...</a
              >
            </div> -->
          </div>
          <form method='POST' action='/teacher/searchNote' class="mg-b-20">
            @csrf
            <div class="row gutters-8">
              <div class="col-lg-5 col-12 form-group">
                <input
                  name='class_id'
                  type="text"
                  placeholder="Search by Class"
                  class="form-control"
                />
              </div>
              <div>
                <button
                  type="submit"
                  class="fw-btn-fill btn-gradient-yellow"
                >
                  SEARCH
                </button>
              </div>
            </div>
          </form></br>
          <div class="notice-board-wrap">
            @for($i=0; $i !=count($noteList);$i++)
            <div class="notice-list">
              <div class="post-date bg-skyblue">
                {{ $noteList[$i]->date }}
              </div>
              <h6 class="notice-title">
                <a href="#">{{ $noteList[$i]->filename }}</a>
              </h6>
              <div class="entry-meta">
                Class : {{  $noteList[$i]->class_id }}/ Section :
                <span>{{ $noteList[$i]->section_id }}</span>/ Subject :
                <span>{{ $noteList[$i]->subject_id }}</span>
              </div>
            </div>
            @endfor
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Note End Here -->
@endsection
