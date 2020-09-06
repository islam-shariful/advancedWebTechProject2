@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Note Upload</title>
@endsection

@section('bodyContent')
  <!-- Breadcubs Area End Here -->
  <div class="row"></div>
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
    <div>
      <input type="file" name="uploadFile" />
      {{session('uploadStatus')}}
    </div>
    <div>
      <input type="submit" name="submit" value='Upload'/>
    </div>
  </form>
  <div class="row">
    <!-- All Notice Area Start Here -->
    <div class="col-8-xxxl col-12">
      <div class="card height-auto">
        <div class="card-body">
          <div class="heading-layout1">
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
          <form class="mg-b-20">
            <div class="row gutters-8">
              <div class="col-lg-5 col-12 form-group">
                <input
                  type="text"
                  placeholder="Search by Date [Under Construction] "
                  class="form-control"
                />
              </div>
              <div class="col-lg-5 col-12 form-group">
                <input
                  type="text"
                  placeholder="Search by Title [Under Construction] "
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
          <div class="notice-board-wrap">
            <div class="notice-list">
              <div class="post-date bg-skyblue">16 June, 2019</div>
              <h6 class="notice-title">
                <a href="#"
                  >Great School Great School manag mene esom text of the
                  printing Great School manag mene esom text of the
                  printing manag mene esom text of the printing.</a
                >
              </h6>
              <div class="entry-meta">
                Jennyfar Lopez / <span>5 min ago</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- All Notice Area End Here -->
  </div>
@endsection
