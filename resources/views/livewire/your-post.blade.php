<div>
    @foreach ($postingan as $item)
    <div class="card mb-3 shadow">
        @include('livewire.postingan-edit')
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-sm-1 pr-2">
                    <img src="{{ asset('storage/photos/'. $item->user->foto ) }}" class="img-fluid img-thumbnail rounded-circle">
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
                <div class="col-8">
                    @if ($item->like->contains(auth()->user()))
                    <button wire:click="unlike({{ $item->id }})" class="btn btn-sm btn-primary"><i class="fas fa-thumbs-up"></i></button>    
                    @else
                        <button wire:click="like({{ $item->id }})" class="btn btn-sm btn-outline-primary"><i class="fas fa-thumbs-up"></i></button>
                    @endif
                </div>
                <div class="col">
                    <p class="col-xs float-right">0 comment</p>
                    <p class="col-xs float-left pl-4 ml-5">{{ $item->like()->count() }} Like</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-1 pr-2">
                    <img class="rounded-circle img-fluid" src="user.png">
                </div>
                <div class="col pl-2">
                    <input type="text" class="form-control" placeholder="Write a comment..">
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>