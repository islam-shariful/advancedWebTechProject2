@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Exam Grade</title>
@endsection

@section('bodyContent')
    <div class="row">
      <form method="post" class="mg-b-20">
        @csrf
        <div class="row gutters-8">
          <div class="col-lg-4 col-12 form-group">
            <input
              name="result_id"
              type="text"
              placeholder="Result ID"
              class="form-control"
            />
          </div>
          <div class="col-lg-4 col-12 form-group">
            <input
              name="class_id"
              type="text"
              placeholder="Class ID"
              class="form-control"
            />
          </div>
          <div class="col-lg-3 col-12 form-group">
            <input
              name="section_id"
              type="text"
              placeholder="Section ID"
              class="form-control"
            />
          </div>
          <div class="col-lg-3 col-12 form-group">
            <input
              name="subject_id"
              type="text"
              placeholder="Subject ID"
              class="form-control"
            />
          </div>
          <div class="col-lg-3 col-12 form-group">
            <input
              name="student_id"
              type="text"
              placeholder="Student ID"
              class="form-control"
            />
          </div>
          <div class="col-lg-3 col-12 form-group">
            <input
              name="attendance"
              type="text"
              placeholder="Attendance"
              class="form-control"
            />
          </div>
          <div class="col-lg-3 col-12 form-group">
            <input
              name="midmarks"
              type="text"
              placeholder="Mid Term Marks"
              class="form-control"
            />
          </div>
          <div class="col-lg-3 col-12 form-group">
            <input
              name="finalmarks"
              type="text"
              placeholder="Final Term Marks"
              class="form-control"
            />
          </div>
          <div class="col-lg-3 col-12 form-group">
            <input
              name="total"
              type="text"
              placeholder="Total Marks"
              class="form-control"
            />
          </div>
        </div>
        <div class="col-lg-2 col-12 form-group">
          <button type="submit" class="fw-btn-fill btn-gradient-yellow">
            Submit
          </button>
        </div>
      </form>
    </div>
    <!-- Class Routine Area Start Here -->
    <div class="row">
      <div class="col-8-xxxl col-12">
        <div class="card height-auto">
          <div class="card-body">
            <div class="heading-layout1">
              <div class="item-title">
                <h3>Grades</h3>
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
            <form method='post' action='/teacher/exam-gradeSearch' class="mg-b-20">
              @csrf
              <div class="row gutters-8">
                <div class="col-lg-4 col-12 form-group">
                  <input
                    name='student_id'
                    type="text"
                    placeholder="Student ID"
                    class="form-control"
                  />
                </div>
                <div class="col-lg-3 col-12 form-group">
                  <input
                    type="text"
                    placeholder="Class ID [Under Production]"
                    class="form-control"
                  />
                </div>
                <div class="col-lg-3 col-12 form-group">
                  <input
                    type="text"
                    placeholder="Section ID [Under Production]"
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
                </div>
              </div>
            </form>
            <div class="table-responsive">
              <table method="post" class="table display data-table text-nowrap">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input checkAll"
                        />
                        <label class="form-check-label">Result ID</label>
                      </div>
                    </th>
                    <th>Class ID</th>
                    <th>Section ID</th>
                    <th>Subject ID</th>
                    <th>Student ID</th>
                    <th>Attendance</th>
                    <th>Mid Marks</th>
                    <th>Final Marks</th>
                    <th>Total Marks</th>
                    <th>Actions</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @for($i=0; $i != count($resultList); $i++)
                  <tr>
                    </td>
                    <td>{{ $resultList[$i]['result_id']}}</td>
                    <th>{{ $resultList[$i]['class_id'] }}</th>
                    <th>{{ $resultList[$i]['section_id'] }}</th>
                    <th>{{ $resultList[$i]['subject_id'] }}</th>
                    <th>{{ $resultList[$i]['student_id'] }}</th>
                    <th>{{ $resultList[$i]['attendance'] }}%</th>
                    <th>{{ $resultList[$i]['midmarks'] }}</th>
                    <th>{{ $resultList[$i]['finalmarks'] }}</th>
                    <th>{{ $resultList[$i]['total'] }}</th>
                    <th><a href="/teacher/exam-grade/edit/{{$resultList[$i]['result_id']}}">Edit Result</a></th>
                    <td>
                      <div class="dropdown">
                        <a
                          href="#"
                          class="dropdown-toggle"
                          data-toggle="dropdown"
                          aria-expanded="false"
                        >
                          <span
                            class="flaticon-more-button-of-three-dots"
                          ></span>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"
                          ><i class="fas fa-times text-orange-red"></i
                          >Close</a
                        >
                        <a class="dropdown-item" href="#"
                          ><i
                            class="fas fa-cogs text-dark-pastel-green"
                          ></i
                          >Edit</a
                        >
                        <a class="dropdown-item" href="#"
                          ><i
                            class="fas fa-redo-alt text-orange-peel"
                          ></i
                          >Refresh</a
                        >
                      </div> -->
                      </div>
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Class Routine Area End Here -->
  @endsection
