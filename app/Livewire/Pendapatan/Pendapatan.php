<?php

namespace App\Livewire\Pendapatan;

use Livewire\Component;
use App\Models\Pembayaran;

class Pendapatan extends Component
{
    public function render()
    {
        $pembayaran = Pembayaran::with('rumah')->get(); // Include rumah relationship
        $totalPendapatan = Pembayaran::sum('jumlah_pembayaran'); // Hitung total jumlah_pembayaran

        return view('livewire.pendapatan.pendapatan', compact('pembayaran', 'totalPendapatan'));
    }
}
