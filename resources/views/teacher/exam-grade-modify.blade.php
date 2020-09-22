@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Student Details</title>
@endsection

@section('bodyContent')
  <!-- Show Error Start -->
  @if($errors->any())
    <div class='alart alert-danger'>
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }} </li>
        @endforeach
      </ul>
    </div>
  @endif
  <!-- Show Error End -->
  <!-- Student Table Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="item-title">
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

          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#"
              ><i class="fas fa-times text-orange-red"></i>Close</a
            >
            <a class="dropdown-item" href="#"
              ><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a
            >
            <a class="dropdown-item" href="#"
              ><i class="fas fa-redo-alt text-orange-peel"></i
              >Refresh</a
            >
          </div>
        </div> -->
      </div>
      <div class="single-info-details">
        <div class="item-img">
          @if($studentInfo->studentgender == "male" || $studentInfo->studentgender == "Male")
            <img src="/assets/teacher/img/figure/student1.png" alt="maleStudent" />
            @else
              <img src="/assets/teacher/img/figure/student.png" alt="femaleStudent" />
          @endif

        </div>
        <div class="item-content">
          <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $studentInfo->studentname }}</h3>
          </div>
          <p>
            <!-- Aliquam erat volutpat. Curabiene natis massa sedde lacu
            stiquen sodale word moun taiery.Aliquam erat
            volutpaturabiene natis massa sedde sodale word moun taiery. -->
          </p>
          <div class="info-table table-responsive">
            <table class="table text-nowrap">
              <tbody>
                <form method='post'>
                  @csrf
                  <tr>
                    <td>Name:</td>
                    <td class="font-medium text-dark-medium">{{ $studentInfo->studentname }}</td>
                  </tr>
                  <tr>
                    <td>Student ID:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='student_id' type='text' value='{{ $studentInfo->student_id }}' />
                    </td>
                  </tr>
                  <tr>
                    <td>Class ID:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='class_id' type='text' value='{{ $studentInfo->class_id }}' />
                    </td>
                  </tr>
                  <tr>
                    <td>Section ID:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='section_id' type='text' value='{{ $studentInfo->section_id }}' />
                    </td>
                  </tr>
                  <tr>
                    <td>Result ID:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='result_id' type='text' value='{{ $resultList->result_id }}' />
                    </td>
                  </tr>
                  <tr>
                    <td>Subject ID:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='subject_id' type='text' value='{{ $resultList->subject_id }}' />
                    </td>
                  </tr>
                  <tr>
                    <td>Attendance:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='attendance' type='text' value='{{ $resultList->attendance }}' />
                    </td>
                  </tr>
                  <tr>
                    <td>Mid Marks:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='midmarks' type='text' value='{{ $resultList->midmarks }}' />
                    </td>
                  </tr>
                  <tr>
                    <td>Final Marks:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='finalmarks' type='text' value='{{ $resultList->finalmarks }}' />
                    </td>
                  </tr>
                  <tr>
                    <td>Total:</td>
                    <td class="font-medium text-dark-medium">
                      <input name='total' type='text' value='{{ $resultList->total }}' />
                    </td>
                    <td class="font-medium text-dark-medium">
                      <input name='modify' type='submit' value='modify' />
                    </td>
                  </tr>
                </form>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Student Table Area End Here -->
@endsection
