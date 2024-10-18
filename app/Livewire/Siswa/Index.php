<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;

    public $search = '';
    public $drawer = false;
    public $date;

    public function siswa()
    {
        $query = Siswa::with('sekolahAsal')->where('nama', 'like', '%' . $this->search . '%');

        if ($this->date) {
            $query->whereDate('tanggal_bergabung', $this->date);
        }

        return $query->get();
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDelete', $id);

    }

    #[On('delete')]
    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        $this->success('Berhasil', 'Berhasil menghapus siswa ');
    }

    public function clear()
    {
        $this->reset(['date']);
        $this->drawer = false;
    }

    public function render()
    {
        return view('livewire.siswa.index', [
            'siswas' => $this->siswa(),
        ]);
    }
}
