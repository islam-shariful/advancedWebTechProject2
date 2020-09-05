@extends('teacher.layout')

@section('headContent')
    <title>Teacher | All Student</title>
@endsection
@section('bodyContent')
  <!-- Student Table Area Start Here -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card dashboard-card-eleven">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>My Students</h3>
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
            </div>
          </div>
          <div class="table-box-wrap">
            <form method="post" class="search-form-box">
              @csrf
              <div class="row gutters-8">
                <div
                  class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group"
                >
                  <input
                    type="text"
                    name="roll"
                    placeholder="Search by Roll "
                    class="form-control"
                  />
                </div>
                <div
                  class="col-4-xxxl col-xl-4 col-lg-4 col-12 form-group"
                >
                  <input
                    type="text"
                    name="name"
                    placeholder="Search by Name [Under Production]"
                    class="form-control"
                  />
                </div>
                <div
                  class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group"
                >
                  <input
                    type="text"
                    name="class"
                    placeholder="Search by Class [Under Production]"
                    class="form-control"
                  />
                </div>
                <div
                  class="col-1-xxxl col-xl-2 col-lg-2 col-12 form-group"
                >
                  <button
                    type="submit"
                    class="fw-btn-fill btn-gradient-yellow"
                  >
                    SEARCH
                  </button>
                </div>
              </div>
            </form>
            <div class="table-responsive student-table-box">
              <table class="table display data-table text-nowrap">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input checkAll"
                        />
                        <label class="form-check-label">Roll</label>
                      </div>
                    </th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Class ID</th>
                    <th>Section ID</th>
                    <th>Gender</th>
                    <th>Date Of Birth</th>
                    <th>Blood Group</th>
                    <th>Guardian Phone</th>
                    <th>Address</th>
                    <th>E-mail</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @for($i=0; $i !=count($studentList);$i++)
                  <tr>
                    <td>
                      <div class="form-check">
                        <input
                          type="checkbox"
                          class="form-check-input"
                        />
                        <label class="form-check-label"
                          >{{ $studentList[$i]['student_id'] }}
                        </label>
                      </div>
                    </td>
                    <td class="text-center">
                      <!-- <img
                        src="/assets/teacher/img/figure/student3.png"
                        alt="student"
                      /> -->
                      <!-- cmnt start -->
                      @if($studentList[$i]['studentgender'] ==
                      "male" || $studentList[$i]['studentgender'] == "Male")
                      <img
                        src="/assets/teacher/img/figure/student2.png"
                        alt="maleStudent"
                      />
                      @else
                      <img
                        src="/assets/teacher/img/figure/student3.png"
                        alt="femaleStudent"
                      />
                      @endif
                      <!-- cmnt end -->
                    </td>
                    <td>{{ $studentList[$i]['studentname'] }}</td>
                    <th>{{ $studentList[$i]['class_id'] }}</th>
                    <th>{{ $studentList[$i]['section_id'] }}</th>
                    <th>{{ $studentList[$i]['studentgender'] }}</th>
                    <th>{{ $studentList[$i]['studentdob'] }}</th>
                    <th>{{ $studentList[$i]['studentbloodgroup'] }}</th>
                    <th>{{ $studentList[$i]['guardiannumber'] }}</th>
                    <th>{{ $studentList[$i]['studentaddress'] }}</th>
                    <th>{{ $studentList[$i]['studentemail'] }}</th>
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
  </div>
  <!-- Student Table Area End Here -->
@endsection
