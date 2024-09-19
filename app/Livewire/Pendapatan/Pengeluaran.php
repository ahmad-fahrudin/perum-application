<?php

namespace App\Livewire\Pendapatan;

use Livewire\Component;
use App\Models\Pengeluaran as ModelsPengeluaran;

class Pengeluaran extends Component
{
    public $deskripsi, $jumlah, $tanggal_pengeluaran;
    public $_page;
    public $pengeluaran_id;

    public function mount()
    {
        $this->_page = 'index';
    }

    public function show_index()
    {
        $this->_page = "index";
    }

    public function show_create_form()
    {
        $this->resetForm();
        $this->_page = "create";
    }

    public function show_edit_form($id)
    {
        // Find the Pengeluaran record
        $pengeluaran = ModelsPengeluaran::findOrFail($id);

        // Set the form data with the current Pengeluaran data
        $this->pengeluaran_id = $id;
        $this->deskripsi = $pengeluaran->deskripsi;
        $this->jumlah = $pengeluaran->jumlah;
        $this->tanggal_pengeluaran = $pengeluaran->tanggal_pengeluaran;

        // Change the page state to "edit"
        $this->_page = "edit";
    }

    public function resetForm()
    {
        $this->reset(['deskripsi', 'jumlah', 'tanggal_pengeluaran', 'pengeluaran_id']);
    }

    public function createPengeluaran()
    {
        $this->validate([
            'deskripsi' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        ModelsPengeluaran::create([
            'deskripsi' => $this->deskripsi,
            'jumlah' => $this->jumlah,
            'tanggal_pengeluaran' => $this->tanggal_pengeluaran,
        ]);

        $this->resetForm();
        session()->flash('message', 'Pengeluaran berhasil ditambahkan.');
        $this->_page = 'index';
    }

    public function editPengeluaran()
    {
        $this->validate([
            'deskripsi' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        $pengeluaran = ModelsPengeluaran::findOrFail($this->pengeluaran_id);

        $pengeluaran->update([
            'deskripsi' => $this->deskripsi,
            'jumlah' => $this->jumlah,
            'tanggal_pengeluaran' => $this->tanggal_pengeluaran,
        ]);

        $this->resetForm();
        session()->flash('message', 'Pengeluaran berhasil diperbarui.');
        $this->_page = 'index';
    }

    public function delete($id)
    {
        $pengeluaran = ModelsPengeluaran::findOrFail($id);
        $pengeluaran->delete();

        session()->flash('message', 'Data pengeluaran berhasil dihapus!');
    }

    public function render()
    {
        $pengeluaran = ModelsPengeluaran::all();
        if ($this->_page == 'index') {
            return view('livewire.pendapatan.pengeluaran', compact('pengeluaran'));
        } else if ($this->_page == 'create') {
            return view('livewire.pendapatan.create-pengeluaran');
        } else if ($this->_page == 'edit') {
            return view('livewire.pendapatan.edit-pengeluaran');
        }
    }
}
