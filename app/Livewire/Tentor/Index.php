<?php

namespace App\Livewire\Tentor;

use App\Models\Tentor;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class Index extends Component
{
    use WithPagination, Toast;

    public $tentors;

    public $search = '';

    public function updatedSearch()
    {
        $this->tentors = Tentor::with('mapel')->where('nama', 'like', '%' . $this->search . '%')->get();
    }



    public function mount()
    {
        $this->tentors = Tentor::with('mapel')->get();
    }

    public function detailTentor($id): RedirectResponse
    {
        return redirect()->route('tentor.detail', $id);
    }

    public function render()
    {
        return view('livewire.tentor.index');
    }
}
