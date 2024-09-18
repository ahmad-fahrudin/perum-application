<?php

namespace App\Livewire\Penghuni;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use App\Models\Penghuni as ModelsPenghuni;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Penghuni extends Component
{
    use WithFileUploads;
    public $nama_lengkap, $alamat, $foto_ktp, $nomor_telepon, $status_kontrak, $status_menikah, $tanggal_masuk, $status_iuran_bulanan;
    public $_page;
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
    public function resetForm()
    {
        $this->reset(['nama_lengkap', 'alamat', 'foto_ktp', 'nomor_telepon', 'status_kontrak', 'status_menikah', 'tanggal_masuk', 'status_iuran_bulanan']);
    }
    public function createPenghuni()
    {
        $this->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'foto_ktp' => 'nullable|image|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'status_kontrak' => 'required|in:Kontrak,Tetap',
            'status_menikah' => 'required|in:Menikah,Belum Menikah',
            'tanggal_masuk' => 'required|date',
            'status_iuran_bulanan' => 'required|in:Aktif,Tidak Aktif',
        ]);
        if ($this->foto_ktp) {
            // Resize gambar menggunakan Intervention Image
            $image = Image::read($this->foto_ktp->getRealPath());
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imageName = time() . '.' . $this->foto_ktp->getClientOriginalExtension();
            $image->save(public_path('upload/' . $imageName));

            $imagePath = 'upload/' . $imageName;
        }

        ModelsPenghuni::create([
            'nama_lengkap' => $this->nama_lengkap,
            'alamat' => $this->alamat,
            'foto_ktp' => $imagePath ?? null,
            'nomor_telepon' => $this->nomor_telepon,
            'status_kontrak' => $this->status_kontrak,
            'status_menikah' => $this->status_menikah,
            'tanggal_masuk' => $this->tanggal_masuk,
            'status_iuran_bulanan' => $this->status_iuran_bulanan,
        ]);

        $this->resetForm();
        session()->flash('message', 'Penghuni berhasil ditambahkan.');
    }
    public function delete($id)
    {
        $penghuni = ModelsPenghuni::findOrFail($id);

        // Hapus gambar jika ada
        if ($penghuni->foto_ktp) {
            File::delete(public_path($penghuni->foto_ktp));
        }

        // Hapus data dari database
        $penghuni->delete();

        session()->flash('message', 'Data berhasil Dihapus!');
    }


    public function render()
    {
        $penghuni = ModelsPenghuni::all();
        if ($this->_page == 'index') {
            return view('livewire.penghuni.penghuni', compact('penghuni'));
        } else if ($this->_page == 'create') {
            return view('livewire.penghuni.create-penghuni');
        }
    }
}
