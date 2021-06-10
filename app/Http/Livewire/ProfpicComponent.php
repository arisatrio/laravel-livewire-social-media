<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class ProfpicComponent extends Component
{
    use WithFileUploads;

    public $foto;
    public $user;


    protected $listeners = [
        'updated'   => 'render'
    ];

    public function update($id)
    {
        $user = User::find($id);
        
        $this->validate([
            'foto' => 'image|max:2048',
        ]);

        $name = md5($this->foto . microtime()).'.'.$this->foto->getClientOriginalExtension();;
        $this->foto->storeAs('photos', $name);
        $user->update([
            'foto'  => $name
        ]);

        session()->flash('message', 'Your profile picture has been updated');
        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.profpic-component');
    }
}
