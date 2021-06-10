<div class="card">
    <div class="card-body">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <form wire:submit.prevent="update({{ $user->id }})" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}" wire:model="name" placeholder="Name">
                @error('name')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email }}" wire:model="email" placeholder="Email">
                @error('email')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Location</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $user->alamat }}" wire:model="alamat" placeholder="Location">
                @error('alamat')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="pekerjaan">Work</label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" value="{{ $user->pekerjaan }}" wire:model="pekerjaan" placeholder="Work">
                @error('pekerjaan')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" rows="3" wire:model="bio" placeholder="Add bio">{{ $user->bio }}</textarea>
                @error('bio')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="tempat_lahir">Birth Place</label>
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" value="{{ $user->tempat_lahir }}" wire:model="tempat_lahir" placeholder="Birth Place">
                @error('tempat_lahir')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Birth Date</label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="{{ $user->tanggal_lahir }}" wire:model="tanggal_lahir" placeholder="Birth Date">
                @error('tanggal_lahir')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">Phone Number</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="{{ $user->no_hp }}" wire:model="no_hp" placeholder="Phone Number">
                @error('no_hp')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </form>
    </div>
</div>