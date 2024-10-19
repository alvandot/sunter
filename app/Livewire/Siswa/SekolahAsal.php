<?php

namespace App\Livewire\Siswa;

use App\Models\SekolahAsal as ModelsSekolahAsal;
use Livewire\Component;

class SekolahAsal extends Component
{
    public $sekolah_asal;

    public function mount()
    {
        $this->sekolah_asal = ModelsSekolahAsal::all();
    }

    public function render()
    {
        return view('livewire.siswa.sekolah-asal');
    }
}
