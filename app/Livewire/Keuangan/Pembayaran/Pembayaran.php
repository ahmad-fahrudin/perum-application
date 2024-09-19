<?php

namespace App\Livewire\Keuangan\Pembayaran;

use Livewire\Component;
use App\Models\Pembayaran as ModelsPembayaran;
use App\Models\Rumah;
use App\Models\Iuran;

class Pembayaran extends Component
{
    public $rumah_id;
    public $iuran_id;
    public $tanggal_pembayaran;
    public $jumlah_pembayaran;
    public $jenis_pembayaran;
    public $_page;
    public $rumahList = [];
    public $iuranList = [];
    public $pembayaran_id;

    public function mount()
    {
        $this->_page = 'index';
        $this->rumahList = Rumah::all(); // Load daftar rumah
        $this->iuranList = Iuran::all(); // Load daftar iuran
    }
    public function updatedIuranId($value)
    {
        // Ketika iuran_id dipilih, otomatis ambil nominal dari iuran yang dipilih
        $iuran = Iuran::find($value);
        if ($iuran) {
            $this->jumlah_pembayaran = $iuran->nominal; // Set jumlah pembayaran otomatis
        }
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
        $pembayaran = ModelsPembayaran::findOrFail($id);
        $this->pembayaran_id = $id;
        $this->rumah_id = $pembayaran->rumah_id;
        $this->iuran_id = $pembayaran->iuran_id;
        $this->tanggal_pembayaran = $pembayaran->tanggal_pembayaran;
        $this->jumlah_pembayaran = $pembayaran->jumlah_pembayaran;
        $this->jenis_pembayaran = $pembayaran->jenis_pembayaran;
        $this->_page = 'edit';
    }

    public function resetForm()
    {
        $this->reset([
            'rumah_id',
            'iuran_id',
            'tanggal_pembayaran',
            'jumlah_pembayaran',
            'jenis_pembayaran',
            'pembayaran_id'
        ]);
    }

    public function createPembayaran()
    {
        $this->validate([
            'rumah_id' => 'required|exists:rumahs,id',
            'iuran_id' => 'required|exists:iurans,id',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'jenis_pembayaran' => 'required|in:Bulanan,Tahunan',
        ]);

        ModelsPembayaran::create([
            'rumah_id' => $this->rumah_id,
            'iuran_id' => $this->iuran_id,
            'tanggal_pembayaran' => $this->tanggal_pembayaran,
            'jumlah_pembayaran' => $this->jumlah_pembayaran,
            'jenis_pembayaran' => $this->jenis_pembayaran,
        ]);

        $this->resetForm();
        session()->flash('message', 'Pembayaran berhasil ditambahkan.');
        $this->_page = 'index';
    }

    // public function editPembayaran()
    // {
    //     $this->validate([
    //         'rumah_id' => 'required|exists:rumahs,id',
    //         'iuran_id' => 'required|exists:iurans,id',
    //         'tanggal_pembayaran' => 'required|date',
    //         'jumlah_pembayaran' => 'required|numeric',
    //         'jenis_pembayaran' => 'required|in:Bulanan,Tahunan',
    //     ]);

    //     $pembayaran = ModelsPembayaran::findOrFail($this->pembayaran_id);

    //     $pembayaran->update([
    //         'rumah_id' => $this->rumah_id,
    //         'iuran_id' => $this->iuran_id,
    //         'tanggal_pembayaran' => $this->tanggal_pembayaran,
    //         'jumlah_pembayaran' => $this->jumlah_pembayaran,
    //         'jenis_pembayaran' => $this->jenis_pembayaran,
    //     ]);

    //     $this->resetForm();
    //     session()->flash('message', 'Pembayaran berhasil diperbarui.');
    //     $this->_page = 'index';
    // }

    public function delete($id)
    {
        $pembayaran = ModelsPembayaran::findOrFail($id);
        $pembayaran->delete();

        session()->flash('message', 'Data pembayaran berhasil dihapus!');
    }

    public function render()
    {
        $pembayaran = ModelsPembayaran::all();

        if ($this->_page == 'index') {
            return view('livewire.keuangan.pembayaran.pembayaran', compact('pembayaran'));
        } elseif ($this->_page == 'create') {
            return view('livewire.keuangan.pembayaran.create-pembayaran');
        }
        // } elseif ($this->_page == 'edit') {
        //     return view('livewire.keuangan.pembayaran.edit-pembayaran');
        // }
    }
}
