<div class="col-sm-1 pr-2">
    <img class="rounded-circle img-fluid" src="{{ asset('storage/photos/'. auth()->user()->foto ) }}">
</div>
<div class="col pl-2">
    <input wire:keydown="komentar" wire:model="komentar({{ $item->id }})" type="text" class="form-control" placeholder="Write a comment..">
</div>