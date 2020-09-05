@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Student Details</title>
@endsection

@section('bodyContent')
  <!-- Student Table Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="item-title">
          <h3>About Me</h3>
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
            <div class="header-elements">
              <ul>
                <li>
                  <a href="#"><i class="far fa-edit"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fas fa-print"></i></a>
                </li>
                <li>
                  <form method="POST">
                    <!-- <a href="teacher-profile" onclick="pdfGen()"><i class="fas fa-download"></i></a> -->
                    <button type="submit" class="fas fa-download">pdf</button>
                    <label>[Under Construction]</label>
                  </form>
                </li>
              </ul>
            </div>
          </div>
          <p>
            <!-- Aliquam erat volutpat. Curabiene natis massa sedde lacu
            stiquen sodale word moun taiery.Aliquam erat
            volutpaturabiene natis massa sedde sodale word moun taiery. -->
          </p>
          <div class="info-table table-responsive">
            <table class="table text-nowrap">
              <tbody>
                <tr>
                  <td>ID:</td>
                  <td class="font-medium text-dark-medium">
                    {{ $studentInfo->student_id }}
                  </td>
                </tr>
                <tr>
                  <td>Name:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->studentname }}</td>
                </tr>
                <tr>
                  <td>Class:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->class_id }}</td>
                </tr>
                <tr>
                  <td>Section:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->section_id }}</td>
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->studentgender }}</td>
                </tr>
                <tr>
                <tr>
                  <td>Birth Date:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->studentdob }}</td>
                </tr>
                <tr>
                  <td>father:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->studentfathername }}</td>
                </tr>
                <tr>
                  <td>Mother:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->studentmothername }}</td>
                </tr>
                <tr>
                  <td>Guardian Number:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->guardiannumber }}</td>
                </tr>
                <tr>
                  <td>E-mail:</td>
                  <td class="font-medium text-dark-medium">
                    {{ $studentInfo->studentemail }}
                  </td>
                </tr>
                <tr>
                  <td>Address:</td>
                  <td class="font-medium text-dark-medium">
                    {{ $studentInfo->studentaddress }}
                  </td>
                </tr>
                <tr>
                  <td>Religion:</td>
                  <td class="font-medium text-dark-medium">{{ $studentInfo->studentreligion }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Student Table Area End Here -->
@endsection
