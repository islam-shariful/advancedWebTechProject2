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
          <form method="post" class="mg-b-20">
            @csrf
            <div class="row gutters-8">
              <div class="col-lg-4 col-12 form-group">
                <input
                  name="teacher_id"
                  type="text"
                  placeholder="Search by Teacher ID"
                  class="form-control"
                />
              </div>
              <div class="col-lg-3 col-12 form-group">
                <input
                  type="text"
                  placeholder="Search by Class [Under Construction]"
                  class="form-control"
                />
              </div>
              <div class="col-lg-3 col-12 form-group">
                <input
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
              </div>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table display data-table text-nowrap">
              <thead>
                <tr>
                  <th>
                    <div class="form-check">
                      <input
                        type="checkbox"
                        class="form-check-input checkAll"
                      />
                      <label class="form-check-label">Day</label>
                    </div>
                  </th>
                  <th>Class ID</th>
                  <th>SubjectName</th>
                  <th>Subject ID</th>
                  <th>Section Name</th>
                  <th>Section ID</th>
                  <th>Teacher Name</th>
                  <th>Teacher ID</th>
                  <th>Starting Time</th>
                  <th>Ending Time</th>
                  <th>Routine ID</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @for($i=0; $i != count($routineList); $i++)
                <tr>
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" />
                      <label class="form-check-label"
                        >{{ $routineList[$i]['day'] }}</label
                      >
                    </div>
                  </td>
                  <th>{{ $routineList[$i]['class_id'] }}</th>
                  <th>{{ $routineList[$i]['subjectname'] }}</th>
                  <th>{{ $routineList[$i]['subject_id'] }}</th>
                  <th>{{ $routineList[$i]['sectionname'] }}</th>
                  <th>{{ $routineList[$i]['section_id'] }}</th>
                  <th>{{ $routineList[$i]['teachername'] }}</th>
                  <th>{{ $routineList[$i]['teacher_id'] }}</th>
                  <th>{{ $routineList[$i]['startingtime'] }}</th>
                  <th>{{ $routineList[$i]['endingtime'] }}</th>
                  <th>{{ $routineList[$i]['routine_id'] }}</th>
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
