<?php

namespace App\Livewire\Penghuni;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use App\Models\Penghuni as ModelsPenghuni;
use App\Models\Rumah;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Penghuni extends Component
{
    use WithFileUploads;

    public $rumah_id, $nama, $alamat, $foto_ktp, $telepon, $status_kontrak, $status_menikah, $tanggal_masuk;
    public $_page;
    public $penghuni_id;
    public $old_foto_ktp;
    public $rumahList = [];

    public function mount()
    {
        $this->_page = 'index';
        $this->rumahList = Rumah::all();
    }

    public function show_index()
    {
        $this->_page = "index";
    }

    public function show_create_form()
    {
        $this->resetForm();
        $this->_page = "create";
        $this->rumahList = Rumah::all();
    }

    public function show_edit_form($id)
    {
        // Find the Penghuni record
        $penghuni = ModelsPenghuni::findOrFail($id);

        // Set the form data with the current Penghuni data
        $this->penghuni_id = $id;
        $this->rumah_id = $penghuni->rumah_id;
        $this->nama = $penghuni->nama;
        $this->alamat = $penghuni->alamat;
        $this->telepon = $penghuni->telepon;
        $this->status_kontrak = $penghuni->status_kontrak;
        $this->status_menikah = $penghuni->status_menikah;
        $this->tanggal_masuk = $penghuni->tanggal_masuk;
        $this->old_foto_ktp = $penghuni->foto_ktp;

        // Change the page state to "edit"
        $this->_page = "edit";
    }



    public function resetForm()
    {
        $this->reset(['nama', 'alamat', 'foto_ktp', 'telepon', 'status_kontrak', 'status_menikah', 'tanggal_masuk', 'penghuni_id', 'old_foto_ktp']);
    }

    public function createPenghuni()
    {
        $this->validate([
            'rumah_id' => 'required|exists:rumahs,id|unique:penghunis,rumah_id',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'foto_ktp' => 'nullable|image|max:255',
            'telepon' => 'required|string|max:20',
            'status_kontrak' => 'required|in:Kontrak,Tetap',
            'status_menikah' => 'required|in:Menikah,Belum Menikah',
            'tanggal_masuk' => 'required|date',
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
            'rumah_id' => $this->rumah_id,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'foto_ktp' => $imagePath ?? null,
            'telepon' => $this->telepon,
            'status_kontrak' => $this->status_kontrak,
            'status_menikah' => $this->status_menikah,
            'tanggal_masuk' => $this->tanggal_masuk,
        ]);

        $this->resetForm();
        session()->flash('message', 'Penghuni berhasil ditambahkan.');
    }

    public function editPenghuni()
    {
        $this->validate([
            'rumah_id' => 'required|exists:rumahs,id|unique:penghunis,rumah_id,' . $this->penghuni_id,
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'foto_ktp' => 'nullable|image|max:255',
            'telepon' => 'required|string|max:20',
            'status_kontrak' => 'required|in:Kontrak,Tetap',
            'status_menikah' => 'required|in:Menikah,Belum Menikah',
            'tanggal_masuk' => 'required|date',
        ]);

        $penghuni = ModelsPenghuni::findOrFail($this->penghuni_id);

        // Jika ada foto KTP baru yang diupload
        if ($this->foto_ktp) {
            if ($penghuni->foto_ktp) {
                File::delete(public_path($penghuni->foto_ktp));
            }

            // Resize gambar menggunakan Intervention Image
            $image = Image::make($this->foto_ktp->getRealPath());
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $imageName = time() . '.' . $this->foto_ktp->getClientOriginalExtension();
            $image->save(public_path('upload/' . $imageName));

            $imagePath = 'upload/' . $imageName;
        }

        $penghuni->update([
            'rumah_id' => $this->rumah_id,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'foto_ktp' => $imagePath ?? $this->old_foto_ktp,
            'telepon' => $this->telepon,
            'status_kontrak' => $this->status_kontrak,
            'status_menikah' => $this->status_menikah,
            'tanggal_masuk' => $this->tanggal_masuk,
        ]);

        $this->resetForm();
        session()->flash('message', 'Data penghuni berhasil diperbarui.');
        $this->_page = 'index';
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

        session()->flash('message', 'Data berhasil dihapus!');
    }

    public function render()
    {
        $penghuni = ModelsPenghuni::all();
        if ($this->_page == 'index') {
            return view('livewire.penghuni.penghuni', compact('penghuni'));
        } else if ($this->_page == 'create') {
            return view('livewire.penghuni.create-penghuni');
        } else if ($this->_page == 'edit') {
            return view('livewire.penghuni.edit-penghuni');
        }
    }
}
