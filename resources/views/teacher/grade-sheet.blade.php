@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Grade Sheet</title>
@endsection

@section('bodyContent')
  <!-- Class Routine Area Start Here -->
  <div class="row">
    <div class="col-8-xxxl col-12">
      <div class="card height-auto">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>Grades</h3>
            </div>
            <div class="header-elements">
              <ul>
                <li>
                  <a href='grade-sheetPDF'>PDF</a>
                </li>
              </ul>
            </div>
          </div>
          <form method="post" class="mg-b-20">
            @csrf
            <div class="row gutters-8">
              <div class="col-lg-4 col-12 form-group">
                <input
                  name="student_id"
                  type="text"
                  placeholder="student_id"
                  class="form-control"
                />
              </div>
              <div class="col-lg-3 col-12 form-group">
                <input
                  name="subject_id"
                  type="text"
                  placeholder="subject_id [Under Production]"
                  class="form-control"
                />
              </div>
              <div class="col-lg-3 col-12 form-group">
                <input
                  name="class_id"
                  type="text"
                  placeholder="class_id [Under Production]"
                  class="form-control"
                />
              </div>
              <div class="col-lg-3 col-12 form-group">
                <input
                  name="section_id"
                  type="text"
                  placeholder="section_id [Under Production]"
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
                      <label class="form-check-label">Grade ID</label>
                    </div>
                  </th>
                  <th>Student ID</th>
                  <th>Subject ID</th>
                  <th>Class ID</th>
                  <th>Section ID</th>
                  <th>Final Grade</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @for($i=0; $i < count($gradeList); $i++)
                <tr>
                  </td>
                  <td>{{ $gradeList[$i]['grade_id'] }}</td>
                  <th>{{ $gradeList[$i]['student_id'] }}</th>
                  <th>{{ $gradeList[$i]['subject_id'] }}</th>
                  <th>{{ $gradeList[$i]['class_id'] }}</th>
                  <th>{{ $gradeList[$i]['section_id'] }}</th>
                  <th>{{ $gradeList[$i]['finalgrade'] }}</th>
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
