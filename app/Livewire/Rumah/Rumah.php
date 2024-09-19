<?php

namespace App\Livewire\Rumah;

use Livewire\Component;
use App\Models\Penghuni;
use App\Models\Pembayaran;
use App\Models\Rumah as ModelsRumah;

class Rumah extends Component
{
    public $nama;
    public $rumah_id;
    public $_page;
    public $penghuniList = [];

    public function mount()
    {
        $this->_page = 'index';
    }

    public function show_index()
    {
        $this->_page = 'index';
    }

    public function show_create_form()
    {
        $this->resetForm();
        $this->_page = 'create';
    }

    public function show_edit_form($id)
    {
        $rumah = ModelsRumah::findOrFail($id);
        $this->rumah_id = $id;
        $this->nama = $rumah->nama;
        $this->_page = 'edit';
    }

    public function resetForm()
    {
        $this->reset(['nama', 'rumah_id']);
    }

    public function createRumah()
    {
        $this->validate([
            'nama' => 'required|string|max:20',
        ]);

        ModelsRumah::create([
            'nama' => $this->nama,
        ]);

        $this->resetForm();
        session()->flash('message', 'Rumah berhasil ditambahkan.');
        $this->_page = 'index';
    }

    public function editRumah()
    {
        $this->validate([
            'nama' => 'required|string|max:20',
        ]);

        $rumah = ModelsRumah::findOrFail($this->rumah_id);

        $rumah->update([
            'nama' => $this->nama,
        ]);

        $this->resetForm();
        session()->flash('message', 'Rumah berhasil diperbarui.');
        $this->_page = 'index';
    }

    public function delete($id)
    {
        $rumah = ModelsRumah::findOrFail($id);
        $rumah->delete();

        session()->flash('message', 'Data berhasil dihapus!');
    }
    public function showPenghuniByRumah($rumah_id)
    {
        $penghuni = Penghuni::where('rumah_id', $rumah_id)->get();

        if ($penghuni->isEmpty()) {
            session()->flash('message', 'Tidak ada penghuni di rumah ini.');
        } else {
            session()->flash('penghuni', $penghuni);
        }
    }
    public function showPembayaranByRumah($rumah_id)
    {
        $pembayaran = Pembayaran::where('rumah_id', $rumah_id)->get();

        if ($pembayaran->isEmpty()) {
            session()->flash('message', 'Rumah ini belum melakukan pembayaran.');
        } else {
            session()->flash('pembayaran', $pembayaran);
        }
    }


    public function render()
    {
        $rumah = ModelsRumah::all();
        if ($this->_page == 'index') {
            return view('livewire.rumah.rumah', compact('rumah'));
        } elseif ($this->_page == 'create') {
            return view('livewire.rumah.create-rumah');
        } elseif ($this->_page == 'edit') {
            return view('livewire.rumah.edit-rumah');
        }
    }
}
