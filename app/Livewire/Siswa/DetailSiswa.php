<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
use Livewire\Attributes\Computed;

class DetailSiswa extends Component
{
    public Siswa $siswa;

    #[Computed]
    public function mount($id)
    {
        $this->siswa = Siswa::find($id);
    }

    public function render()
    {
        return view('livewire.siswa.detail-siswa');
    }
}
