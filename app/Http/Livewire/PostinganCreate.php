<?php

namespace App\Http\Livewire;

use App\Models\Postingan;
use Livewire\Component;

class PostinganCreate extends Component
{
    public $isi;
    public $media;

    public function addPostingan()
    {
        $this->validate([
            'isi'   => 'required',
        ]);

        Postingan::create([
            'user_id'   => auth()->user()->id,
            'isi'       => $this->isi
        ]);

        $this->emit('postinganAdded');
        
        $this->isi = '';
    }

    public function render()
    {
        return view('livewire.postingan-create');
    }
}
