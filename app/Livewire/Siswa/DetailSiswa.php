<?php

namespace App\Livewire\Siswa;

use App\Models\SekolahAsal;
use Livewire\Component;
use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Mary\Traits\Toast;

class DetailSiswa extends Component
{
    use Toast;

    public Siswa $siswa;

    #[Validate('required|string|max:255|min:3')]
    public $name;

    #[Validate('required|string|max:255')]
    public $jenis_kelamin;

    #[Validate('required|date')]
    public $tanggal_lahir;

    #[Validate('required|string|max:255')]
    public $alamat;

    #[Validate('required|string|max:20')]
    public $nomor_telepon;

    #[Validate('required|string|max:255')]
    public $nama_orang_tua;

    #[Validate('required|string|max:20')]
    public $nomor_telepon_orang_tua;

    #[Validate('required|exists:sekolah_asals,id')]
    public $sekolah_asal_id;

    public $sekolahAsal;
    public bool $modalEdit = false;

    public function mount($id)
    {
        $this->siswa = Siswa::findOrFail($id);
        $this->name = $this->siswa->nama;
        $this->jenis_kelamin = $this->siswa->jenis_kelamin;
        $this->tanggal_lahir = $this->siswa->tanggal_lahir;
        $this->alamat = $this->siswa->alamat;
        $this->nomor_telepon = $this->siswa->nomor_telepon;
        $this->nama_orang_tua = $this->siswa->nama_orang_tua;
        $this->nomor_telepon_orang_tua = $this->siswa->nomor_telepon_orang_tua;
        $this->sekolah_asal_id = $this->siswa->sekolah_asal_id;
        $this->sekolahAsal = SekolahAsal::all();
    }

    public function deleteSiswa()
    {
        $this->siswa->delete();
        $this->success('Berhasil', 'Berhasil menghapus data siswa');
        return redirect()->route('siswa.index');
    }


    public function editSiswa()
    {
        $this->modalEdit = !$this->modalEdit;
    }

    public function updateSiswa()
    {

        $this->siswa->update([
            'nama' => $this->name,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'nomor_telepon' => $this->nomor_telepon,
            'nama_orang_tua' => $this->nama_orang_tua,
            'nomor_telepon_orang_tua' => $this->nomor_telepon_orang_tua,
        ]);

        $this->success('Berhasil', 'Berhasil mengubah data siswa');
        $this->modalEdit = false;
    }

    public function render()
    {
        return view('livewire.siswa.detail-siswa');
    }
}
