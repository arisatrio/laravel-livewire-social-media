<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KomentarComponent extends Component
{

    public function komentar()
    {
        $cek = "cek";
        dd($cek);
    }

    public function render()
    {
        return view('livewire.komentar-component');
    }
}
