@extends('teacher.layout')

@section('headContent')
    <title>Teacher | Message</title>
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
  <!-- Inform Parents Area Start Here -->
  <div class="col-xl-8">
    <div class="card">
      <div class="card-body">
        <div class="heading-layout1">
          <div class="item-title">
            <h3>Write New Message to Student's Parents</h3>
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
                Send
              </button>
              <!-- <button
                type="reset"
                class="btn-fill-lg bg-blue-dark btn-hover-yellow"
              >
                Reset[Under Production]
              </button> -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Inform Parents Area End Here -->

  <!-- Lost & Found Start Here -->
  <div class="col-xl-8">
    <div class="card">
      <div class="card-body">
        <div class="heading-layout1">
          <div class="item-title">
            <h3>Inform Lost & Found</h3>
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
        <form method='POST' action='lost-found' class="new-added-form">
          @csrf
          <div class="row">
            <div class="col-12 form-group">
              <label>Lost Found ID</label>
              <input name='lostfound_id' type="text" placeholder="id" class="form-control" />
            </div>
            <div class="col-12 form-group">
              <label>Lost Stuffs</label>
              <input name='lostname' type="text" placeholder="" class="form-control" />
            </div>
            <div class="col-12 form-group">
              <label>Lost Day</label>
              <input name='lostday' type="date" placeholder="" class="form-control" />
            </div>
            <div class="col-12 form-group">
              <label>Found Status</label>
              <input name='found' type="text" placeholder="yes/no" class="form-control" />
            </div>
            <div class="col-12 form-group">
              <label>Received Status</label>
              <input name='received' type="text" placeholder="yes/no" class="form-control" />
            </div>
            <div class="col-12 form-group">
              <label>Description</label>
              <textarea
                name='lostdescription'
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
                Inform
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Lost & Found End Here -->
@endsection
