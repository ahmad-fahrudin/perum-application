<?php

namespace App\Livewire\DataUser;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Data extends Component
{
    public $name, $email, $password, $password_confirmation, $user_id;
    public $_page;

    public function mount()
    {
        $this->_page = 'index';
    }

    public function show_index()
    {
        $this->_page = 'index';
    }

    public function show_edit_form($id)
    {
        $user = User::findOrFail($id);

        // Set the form data with the current user data
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

        $this->_page = 'edit';
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'user_id']);
    }

    public function editUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:3|confirmed',
        ]);

        $user = User::findOrFail($this->user_id);

        // Update user data
        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        // If password is set, hash and update it
        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        $user->update($data);

        $this->resetForm();
        session()->flash('message', 'User berhasil diperbarui.');
        $this->_page = 'index';
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('message', 'User berhasil dihapus!');
    }

    public function render()
    {
        $users = User::all();

        if ($this->_page == 'index') {
            return view('livewire.data-user.data', compact('users'));
        } elseif ($this->_page == 'edit') {
            return view('livewire.data-user.edit-data');
        }
    }
}
