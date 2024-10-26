<?php

namespace App\Livewire\Tentor;

use Livewire\Component;
use App\Models\Mapel;
use App\Models\Tentor;

class MataPelajaran extends Component
{
    public $mapelList;

    public $modalEdit = false;
    public $tentorIdMapel;

    public $tentorMapel;
    public $tentorNama;

    public $selectedTentorId;

    public function mount()
    {
        $this->mapelList = Mapel::with('tentor')->get();
        $this->tentorMapel = Mapel::select('id', 'nama_mapel')->get();
    }

    public function editTentor($id)
    {
        $this->selectedTentorId = $id;
        $tentor = Tentor::find($id);
        $this->tentorNama = $tentor->nama;
        $this->tentorIdMapel = $tentor->mapel->pluck('id');
        $this->modalEdit = true;
    }
    public function render()
    {
        return view('livewire.tentor.mata-pelajaran');
    }
}
