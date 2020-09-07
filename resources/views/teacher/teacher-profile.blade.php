@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Teacher Profile</title>
@endsection

@section('bodyContent')
  <!-- Teacher Table Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="item-title">
          <h3>About Me</h3>
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
              ><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a
            >
            <a class="dropdown-item" href="#"
              ><i class="fas fa-redo-alt text-orange-peel"></i
              >Refresh</a
            >
          </div>
        </div>
      </div>
      <div class="single-info-details">
        <div class="item-img">
          <img src="/assets/teacher/img/figure/teacher.jpg" alt="teacher" />
        </div>
        <div class="item-content">
          <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium"> {{ $teacherInfo['teachername'] }} </h3>
            <div class="header-elements">
              <ul>
                <!-- <li>
                  <a href="#"><i class="far fa-edit"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fas fa-print"></i></a>
                </li> -->
                <li>
                  <a href='teacher-profilePDF'>PDF</a>
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
                    {{ $teacherInfo['teacher_id'] }}
                  </td>
                </tr>
                <tr>
                  <td>Name:</td>
                  <td class="font-medium text-dark-medium">{{ $teacherInfo['teachername'] }}</td>
                </tr>
                <tr>
                  <td>E-mail:</td>
                  <td class="font-medium text-dark-medium">
                    {{ $teacherInfo['teacheremail'] }}
                  </td>
                </tr>
                <tr>
                  <td>Designation:</td>
                  <td class="font-medium text-dark-medium">
                    {{ $teacherInfo['teacherdesignation'] }}
                  </td>
                </tr>
                <tr>
                  <td>Department:</td>
                  <td class="font-medium text-dark-medium">{{ $teacherInfo['teacherdepartment'] }}</td>
                </tr>
                <tr>
                  <td>Subject Id:</td>
                  <td class="font-medium text-dark-medium">{{ $teacherInfo['subject_id'] }}</td>
                </tr>
                <tr>
                  <td>Address:</td>
                  <td class="font-medium text-dark-medium">
                    {{ $teacherInfo['teacheraddress'] }}
                  </td>
                </tr>
                <tr>
                  <td>Date of Birth:</td>
                  <td class="font-medium text-dark-medium">
                    {{ $teacherInfo['teacherdob'] }}
                  </td>
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td class="font-medium text-dark-medium">{{ $teacherInfo['teachergender'] }}</td>
                </tr>
                <tr>
                  <td>Religion:</td>
                  <td class="font-medium text-dark-medium">{{ $teacherInfo['teacherreligion'] }}</td>
                </tr>
                <tr>
                  <td>Joining Date:</td>
                  <td class="font-medium text-dark-medium">{{ $teacherInfo['teacherjoiningdate'] }}</td>
                </tr>
                <tr>
                  <td>Father Name:</td>
                  <td class="font-medium text-dark-medium">{{ $teacherInfo['teacherfathername'] }}</td>
                </tr>
                <tr>
                  <td>Mother Name:</td>
                  <td class="font-medium text-dark-medium">{{ $teacherInfo['teachermothername'] }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Teacher Table Area End Here -->
@endsection
