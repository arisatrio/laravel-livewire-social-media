<div class="card shadow">
    <div class="card-body text-muted">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <form wire:submit.prevent="update({{ $user->id }})" enctype="multipart/form-data">
            @if($foto)
                <div class="text-center">
                    <img src="{{ $foto->temporaryUrl() }}" wire:model="foto" class="img-fluid rounded-circle img-thumbnail" style="height: 200px; Width: 200px">
                </div>
            @else
            <div class="text-center">
                <img src="{{ asset('storage/photos/'. $user->foto ) }}" wire:model="foto" class="img-fluid rounded-circle img-thumbnail" style="height: 200px; Width: 200px">
            </div>
            @endif
            <div class="image-upload text-center">
                <label for="file-input">
                    <div class="btn btn-outline-primary"><i class="fas fa-plus mr-2"></i>Upload Photo</div>
                </label>
                <input id="file-input" type="file" name="foto" wire:model="foto" />
                @error('foto')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div wire:loading wire:target="foto" class="text-sm text-gray-500 italic float-right">Uploading...</div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </form>
    </div>
</div>