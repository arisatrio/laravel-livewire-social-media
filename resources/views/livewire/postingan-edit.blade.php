<!-- Modal -->
<div wire:ignore.self class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" wire:model="isi" rows="5" placeholder="Apa yang anda pikirkan?"></textarea>
                @error('isi')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="update({{ $item->id }})" type="button" class="btn btn-primary close-modal" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>