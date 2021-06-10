<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Postingan;
use App\Models\Komentar;

class PostinganIndex extends Component
{
    public $likeCount, $item;
    public $isi, $komentar;

    protected $listeners = [
        'postinganAdded' => 'render',
        'postinganDeleted'  => 'render',
        'postinganLiked' => 'incrementLikeCount',
        'komentarAdded'     => 'render'
    ];

    public function incrementLikeCount(Postingan $post)
    {
        $this->likeCount = $post->like()->count();
    }

    public function edit($id)
    {
        $post       = Postingan::find($id);
        $this->isi  = $post->isi;
    }

    public function update($id)
    {
        $this->validate([
            'isi'   => 'required',
        ]);

        $post       = Postingan::find($id);
        $post->update([
            'isi'   => $this->isi
        ]);
        $this->dispatchBrowserEvent('postUpdated');
    }

    public function delete($id)
    {
        $user       = auth()->user();
        $postingan  = Postingan::find($id);
        $postingan->like->contains($user);
        $postingan->like()->detach($user);
        $postingan->delete();
        
        session()->flash('message', 'Status Dihapus');
        $this->emit('postinganDeleted');
    }

    public function like($id)
    {
        $user       = auth()->user();
        $postingan  = Postingan::find($id);
        if($postingan->like->contains($user)){

        }else{
            $postingan->like()->attach($user);
            $this->emit('postinganLiked', $postingan->id);
        }
    }
    
    public function unlike($id)
    {
        $user       = auth()->user();
        $postingan  = Postingan::find($id);
        if($postingan->like->contains($user)){
            $postingan->like()->detach($user);
            $this->emit('postinganLiked', $postingan->id);
        }
    }

    public function komentar($id)
    {
        $this->validate([
            'isi'   => 'required',
        ]);
        
        $komentar = Komentar::create([
            'postingan_id'  => $id,
            'user_id'       => auth()->user()->id,
            'isi'           => $this->komentar
        ]);
        $this->emit('komentarAdded', $komentar->id);
    }

    public function render()
    {
        return view('livewire.postingan-index', [
            'postingan' => Postingan::latest()->with('user')->get()
        ]);
    }
}