<div class="card shadow">
    <div class="card-body">
        <form wire:submit.prevent="addPostingan">
            <div class="row no-gutters">
                <div class="col-1 pr-2">
                    <img src="{{ asset('storage/photos/'. auth()->user()->foto ) }}" class="img-fluid img-thumbnail rounded-circle">
                </div>
                <div class="col-11">
                    <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" wire:model="isi" rows="5" placeholder="Whats happening?"></textarea>
                    @error('isi')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success float-right">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>