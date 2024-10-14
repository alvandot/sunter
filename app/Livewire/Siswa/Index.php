<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;
    public $search = '';
    public $showAlert = false;
    public function siswa()
    {
        return Siswa::with('sekolahAsal')->where('nama', 'like', '%' . $this->search . '%')->get();
    }

    public function delete($id)
    {
        if (Siswa::find($id)) {
            Siswa::find($id)->delete();
            $this->success('Berhasil', 'Berhasil menghapus siswa');
        } else {
            $this->error('Gagal', 'Gagal menghapus siswa');
        }
    }

    public function render()
    {
        return view('livewire.siswa.index', [
            'siswas' => $this->siswa(),
        ]);
    }
}
