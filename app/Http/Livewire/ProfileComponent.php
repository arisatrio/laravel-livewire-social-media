<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ProfileComponent extends Component
{

    public $name, $email, $password, $tempat_lahir, $tanggal_lahir, $alamat, $pekerjaan, $bio, $no_hp, $foto;
    public $user;

    public function mount($user)
    {
        $this->name             = $user->name;
        $this->email            = $user->email;
        $this->alamat           = $user->alamat;
        $this->pekerjaan        = $user->pekerjaan;
        $this->bio              = $user->bio;
        $this->tempat_lahir     = $user->tempat_lahir;
        $this->tanggal_lahir    = $user->tanggal_lahir;
        $this->no_hp            = $user->no_hp;
        $this->foto             = $user->foto;
    }

    protected $listeners = [
        'updated'   => 'render'
    ];

    protected $rules = [
        'name'          => 'required',
        'email'         => 'required:unique:user',
        'alamat'        => 'required|',
        'pekerjaan'     => 'required',
        'bio'           => 'required',
        'tempat_lahir'  => 'nullable|alpha',
        'tanggal_lahir' => 'nullable|date|before:today',
        'no_hp'         => 'nullable|numeric',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function update($id)
    {
        $user = User::find($id);
        $validatedData = $this->validate();
        $user->update($validatedData);
        
        /* if ($this->foto != $user->foto) {
            $this->validate([
                'foto' => 'image|max:2048',
            ]);

            $name = md5($this->foto . microtime()).'.'.$this->foto->getClientOriginalExtension();;
            $this->foto->storeAs('photos', $name);
            $user->update([
                'foto'  => $name
            ]);
        } */

        session()->flash('message', 'Your profile has been updated');
    }

    public function render()
    {
        return view('livewire.profile-component');
    }
}
