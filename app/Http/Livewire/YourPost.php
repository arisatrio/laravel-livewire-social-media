<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Postingan;

class YourPost extends Component
{
    public $likeCount, $item;
    public $isi;

    protected $listeners = [
        'postinganAdded' => 'render',
        'postinganDeleted'  => 'render',
        'postinganLiked' => 'incrementLikeCount'
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

    public function render()
    {
        $userId = auth()->user()->id;
        $postingan = Postingan::latest()->with('user')->where('user_id', $userId)->latest()->get();

        return view('livewire.your-post', [
            'postingan' => $postingan
        ]);
    }
}
