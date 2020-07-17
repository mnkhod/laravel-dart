@extends('../layout/base')

@section('content')

<div class="container-fluid px-5 my-5">
  <div class="row">
    <div class="col-sm-5">
      <div class="card shadow animated slideInDown">
        <div class="card-header bg-warning">
          <h2 class="h3 text-white">Profile</h2>
        </div>

        <div class="card-body">
          <div class="d-flex justify-content-center">
            <img src="https://iupac.org/wp-content/uploads/2018/05/default-avatar.png" class="img-fluid rounded-circle w-50" alt="profile-img">
          </div>
          <div class="p-4">
            <input type="text" class="my-3 form-control rounded-pill text-center" autocomplete="off" placeholder="Username" value="{{ $user->name }}">
            <input type="text" class="my-3 form-control rounded-pill text-center" autocomplete="off" placeholder="Username" value="{{ $user->role->name }}">
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-7">
      <form action="">
        <div class="row">
          <div class="col-sm-6 d-flex align-items-center justify-content-center">
            <div class="card shadow w-100 animated slideInDown">
              <div class="card-header bg-primary">
                <h2 class="h4 text-white">Account</h2>
              </div>
              <div class="card-body">
                <div class="my-4 d-flex justify-content-around">
                  <h5 class="my-2 d-inline">Phone</h5>
                  <input type="text" class="form-control d-inline w-auto rounded-pill text-center" autocomplete="off" placeholder="Username" value="80122654">
                </div>
                <div class="my-4 d-flex justify-content-around">
                  <h5 class="my-2 d-inline">Role</h5>
                  <input type="text" class="form-control rounded-pill d-inline w-auto text-center" autocomplete="off" placeholder="Username" value="Munkh-Od Ganzorigt">
                </div>
                <div class="my-4 d-flex justify-content-around">
                  <h5 class="my-2 d-inline">Email</h5>
                  <input type="email" class="form-control rounded-pill d-inline w-auto text-center" autocomplete="off" placeholder="Username" value="Eikyuu.Hoshi@gmail.com">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 d-flex align-items-center justify-content-center">
            <div class="card shadow w-100 h-100 animated slideInRight">
              <div class="card-header bg-danger">
                <h2 class="h4 text-white">Information</h2>
              </div>
              <div class="card-body">
                <div class="my-4 d-flex justify-content-around">
                  <h5 class="my-2 d-inline">Birthday</h5>
                  <input type="date" class="w-75 form-control d-inline rounded-pill text-center" autocomplete="off" placeholder="Username" value="">
                </div>
                <div class="my-4 d-flex justify-content-around">
                  <h5 class="my-2 d-inline">Gender</h5>
                  <input type="text" class="form-control rounded-pill d-inline w-75 text-center" autocomplete="off" placeholder="Username" value="Male">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-sm-12">
            <div class="card shadow animated slideInUp">
              <div class="card-body">
                <div class="my-4 d-flex justify-content-around">
                  <h5 class="my-2 d-inline">Location</h5>
                  <input type="text" class="w-75 form-control d-inline rounded-pill text-center" autocomplete="off" placeholder="Username" value="Ulaanbaatar">
                </div>
                <div class="my-4 d-flex justify-content-around">
                  <h5 class="my-2 d-inline">Recovery Email</h5>
                  <input type="email" class="form-control rounded-pill d-inline w-75 text-center" autocomplete="off" placeholder="Username" value="kainin.krystos@gmail.com">
                </div>
                <div class="d-flex justify-content-end ">
                  <button class="btn btn-outline-danger btn px-5 mx-2 shadow">Delete</button>
                  <button class="btn btn-outline-success btn px-5 mx-2 shadow">Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection
