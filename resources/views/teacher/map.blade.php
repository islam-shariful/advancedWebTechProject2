@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Map</title>
@endsection

@section('bodyContent')
  <!-- Google Map Area Start Here -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card google-map-area">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>Marker Map !!!! [Under Construction] !!!! </h3>
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
                  ><i class="fas fa-cogs text-dark-pastel-green"></i
                  >Edit</a
                >
                <a class="dropdown-item" href="#"
                  ><i class="fas fa-redo-alt text-orange-peel"></i
                  >Refresh</a
                >
              </div>
            </div> -->
          </div>
          <div class="default-map">
            <div
              id="markergoogleMap"
              style="width: 100%; height: 660px; border-radius: 4px;"
            ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Google Map Area End Here -->
@endsection
