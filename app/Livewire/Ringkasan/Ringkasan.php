<?php

namespace App\Livewire\Ringkasan;

use Livewire\Component;
use App\Models\Ringkasan as ModelsRingkasan;

class Ringkasan extends Component
{
    public $bulan_tahun, $total_pemasukan, $total_pengeluaran, $saldo, $ringkasan_id;
    public $_page;

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
        $ringkasan = ModelsRingkasan::findOrFail($id);
        $this->ringkasan_id = $id;
        $this->bulan_tahun = $ringkasan->bulan_tahun;
        $this->total_pemasukan = $ringkasan->total_pemasukan;
        $this->total_pengeluaran = $ringkasan->total_pengeluaran;
        $this->saldo = $ringkasan->saldo;
        $this->_page = 'edit';
    }

    public function resetForm()
    {
        $this->reset(['bulan_tahun', 'total_pemasukan', 'total_pengeluaran', 'saldo', 'ringkasan_id']);
    }

    public function createRingkasan()
    {
        $this->validate([
            'bulan_tahun' => 'required|string',
            'total_pemasukan' => 'required|numeric|min:0',
            'total_pengeluaran' => 'required|numeric|min:0',
            'saldo' => 'required|numeric|min:0',
        ]);

        ModelsRingkasan::create([
            'bulan_tahun' => $this->bulan_tahun,
            'total_pemasukan' => $this->total_pemasukan,
            'total_pengeluaran' => $this->total_pengeluaran,
            'saldo' => $this->saldo,
        ]);

        $this->resetForm();
        session()->flash('message', 'Ringkasan berhasil ditambahkan.');
        $this->_page = 'index';
    }

    public function editRingkasan()
    {
        $this->validate([
            'bulan_tahun' => 'required|string',
            'total_pemasukan' => 'required|numeric|min:0',
            'total_pengeluaran' => 'required|numeric|min:0',
            'saldo' => 'required|numeric|min:0',
        ]);

        $ringkasan = ModelsRingkasan::findOrFail($this->ringkasan_id);

        $ringkasan->update([
            'bulan_tahun' => $this->bulan_tahun,
            'total_pemasukan' => $this->total_pemasukan,
            'total_pengeluaran' => $this->total_pengeluaran,
            'saldo' => $this->saldo,
        ]);

        $this->resetForm();
        session()->flash('message', 'Ringkasan berhasil diperbarui.');
        $this->_page = 'index';
    }

    public function delete($id)
    {
        $ringkasan = ModelsRingkasan::findOrFail($id);
        $ringkasan->delete();

        session()->flash('message', 'Ringkasan berhasil dihapus!');
    }

    public function render()
    {
        $ringkasan = ModelsRingkasan::all();

        if ($this->_page == 'index') {
            return view('livewire.ringkasan.ringkasan', compact('ringkasan'));
        } elseif ($this->_page == 'create') {
            return view('livewire.ringkasan.create-ringkasan');
        } elseif ($this->_page == 'edit') {
            return view('livewire.ringkasan.edit-ringkasan');
        }
    }
}
