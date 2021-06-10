<div class="card shadow">
    <div class="card-body text-muted">
        <div class="text-center">
            <img src="{{ asset('storage/photos/'. $user->foto ) }}" class="img-fluid img-thumbnail rounded-circle" style="height: 200px; Width: 200px">
            <h3 class="font-weight-bold text-capitalize  mt-3">{{ auth()->user()->name }}</h3>
            <p class="">{{ $user->bio }}</p>
            <hr>
        </div>
        <div class="row">
            <div class="col-1"><i class="fas fa-home"></i></div>
            <h5 class="col">{{ $user->alamat }}</h5>
        </div>
        <div class="row">
            <div class="col-1"><i class="fas fa-user-tie"></i></div>
            <h5 class="col">{{ $user->pekerjaan }}</h5>
        </div>
        <div class="row">
            <div class="col-1"><i class="fas fa-envelope "></i></div>
            <h5 class="col">{{ $user->email }}</h5>
        </div>
    </div>
</div>