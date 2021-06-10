<div>
    @foreach ($postingan as $item)
    <div class="card mb-3 shadow">
        @include('livewire.postingan-edit')
        @include('livewire.liked-by')
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-sm-1 pr-2">
                    <img src="{{ asset('storage/photos/'. $item->user->foto ) }}" class="img-fluid rounded-circle h-100 w-100">
                </div>
                <div class="col-sm-10">
                    <h4 class="font-weight-bold mb-0">{{ $item->user->name }}</h4>
                    <small>{{ $item->created_at->diffForHumans() }}</small>
                </div>
                <div class="col">
                    @if (auth()->user()->id == $item->user_id)
                    <div class="dropdown float-right">
                        <button class="btn" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" wire:click="edit({{ $item->id }})" data-toggle="modal" data-target="#edit">Edit</button>
                            <button wire:click="delete({{ $item->id }})" class="dropdown-item">Delete</button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <h5 class="col mt-3 mb-3">{{ $item->isi }}</h5>
            </div>
            <div class="row mt-4">
                <div class="col-sm-8">
                    <button wire:click="unlike({{ $item->id }})" class="btn btn-sm btn-primary"><i class="fas fa-thumbs-up"></i></button>    
                </div>
                <div class="col-sm-2 pr-0">
                    <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#like">{{ $item->like()->count() }} Like</button>
                </div>
                <div class="col-sm-2 pr-0">
                    <button class="btn btn-outline-dark float-right">{{ $item->komentar()->count() }} Komentar</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-1 pr-2">
                    <img class="rounded-circle img-fluid" src="{{ asset('storage/photos/'. auth()->user()->foto ) }}">
                </div>
                <div class="col pl-2">
                    <input wire:model="komentar" type="text" class="form-control" placeholder="Write a comment..">
                </div>
                <div class="col-sm-1 pl-2 mr-4">
                    <button wire:click="komentar({{ $item->id }})" class="btn btn-outline-success"><i class="fas fa-comment-dots"></i></button>
                </div>
            </div>
            <hr>
            @foreach($item->komentar as $komen)
            <div class="container">
                <div class="row">
                    <div class="col-sm-1 pr-2">
                        <img class="rounded-circle img-fluid" src="{{ asset('storage/photos/'. auth()->user()->foto ) }}">
                    </div>
                    <div class="col pl-2">
                        <h6>{{ $komen->komentar->isi }}</h6>
                        
                    </div>
                    <small>{{ $komen->komentar->created_at->diffForHumans() }}</small>
                </div>
            <hr>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>