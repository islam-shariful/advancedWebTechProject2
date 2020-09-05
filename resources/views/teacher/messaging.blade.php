@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Message</title>
@endsection

@section('bodyContent')
  <!-- Add Notice Area Start Here -->
  <div class="col-xl-8">
    <div class="card">
      <div class="card-body">
        <div class="heading-layout1">
          <div class="item-title">
            <h3>Write New Message</h3>
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
                ><i class="fas fa-cogs text-dark-pastel-green"></i
                >Edit</a
              >
              <a class="dropdown-item" href="#"
                ><i class="fas fa-redo-alt text-orange-peel"></i
                >Refresh</a
              >
            </div>
          </div>
        </div>
        <form method='POST' class="new-added-form">
          @csrf
          <div class="row">
            <div class="col-12 form-group">
              <label>Title</label>
              <input name='title' type="text" placeholder="" class="form-control" />
            </div>
            <div class="col-12 form-group">
              <label>Recipient</label>
              <input name='recipient' type="text" placeholder="" class="form-control" />
            </div>
            <div class="col-12 form-group">
              <label>Message</label>
              <textarea
                name='message'
                class="textarea form-control"
                name="message"
                id="form-message"
                cols="10"
                rows="9"
              ></textarea>
            </div>
            <div class="col-12 form-group mg-t-8">
              <button
                type="submit"
                class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"
              >
                Save
              </button>
              <button
                type="reset"
                class="btn-fill-lg bg-blue-dark btn-hover-yellow"
              >
                Reset[Under Production]
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Add Notice Area End Here -->
@endsection
