<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserIndex extends Component
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

    public function render()
    {
        return view('livewire.user-index');
    }
}
