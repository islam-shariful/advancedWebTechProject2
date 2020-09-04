@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Teacher Dashboard</title>
@endsection
@section('bodyContent')
  <div class="row">
    <!-- Students Chart End Here -->
    <div class="col-lg-6 col-4-xxxl col-xl-6">
      <div class="card dashboard-card-three">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>Students</h3>
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
          <div class="doughnut-chart-wrap">
            <canvas
              id="student-doughnut-chart"
              width="100"
              height="270"
            ></canvas>
          </div>
          <div class="student-report">
            <div class="student-count pseudo-bg-blue">
              <h4 class="item-title">Female Students</h4>
              <div class="item-number">10,500</div>
            </div>
            <div class="student-count pseudo-bg-yellow">
              <h4 class="item-title">Male Students</h4>
              <div class="item-number">24,500</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Students Chart End Here -->
    <!-- Notice Board Start Here -->
    <div class="col-lg-6 col-4-xxxl col-xl-6">
      <div class="card dashboard-card-six">
        <div class="card-body">
          <div class="heading-layout1 mg-b-17">
            <div class="item-title">
              <h3>Notifications</h3>
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
          <div class="notice-box-wrap">
            @for($i=0; $i !=count($noticeList);$i++)
            <div class="notice-list">
              <div class="post-date bg-skyblue">
                {{ $noticeList[$i]['noticedate'] }}
              </div>
              <h6 class="notice-title">
                <a href="#">{{ $noticeList[$i]['description'] }}</a>
              </h6>
              <div class="entry-meta">
                Class : {{  $noticeList[$i]['class_id'] }}/ Section :
                <span>{{ $noticeList[$i]['section_id'] }}</span>/ Subject :
                <span>{{ $noticeList[$i]['subject_id'] }}</span>/
                <i>Notice ID : </i>
                <span><i>{{ $noticeList[$i]['notice_id'] }}</i></span>
              </div>
            </div>
            @endfor
          </div>
        </div>
      </div>
    </div>
    <!-- Notice Board End Here -->
  </div>
@endsection
