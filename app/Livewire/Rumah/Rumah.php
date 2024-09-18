<?php

namespace App\Livewire\Rumah;

use App\Models\Rumah as ModelsRumah;
use Livewire\Component;

class Rumah extends Component
{
    public $nama;
    public $status;
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
        $this->_page = "create";
    }
    public function resetForm()
    {
        $this->reset(['nama', 'status']);
    }
    public function createRumah()
    {
        $this->validate([
            'nama' => 'required|string|max:20',
            'status' => 'required|in:Dihuni,Tidak Dihuni',
        ]);
        ModelsRumah::create([
            'nama' => $this->nama,
            'status' => $this->status,
        ]);
        $this->resetForm();
        session()->flash('message', 'Rumah berhasil ditambahkan.');
        $this->_page = 'index';
    }
    public function render()
    {
        $rumah = ModelsRumah::all();
        if ($this->_page == 'index') {
            return view('livewire.rumah.rumah', compact('rumah'));
        } else if ($this->_page == 'create') {
            return view('livewire.rumah.create-rumah');
        }
    }
}
