<?php

namespace App\Livewire\Keuangan\Iuran;

use App\Models\Iuran as ModelsIuran;
use Livewire\Component;

class Iuran extends Component
{
    public function render()
    {
        $iuran = ModelsIuran::all();
        return view('livewire.keuangan.iuran.iuran', compact('iuran'));
    }
}
