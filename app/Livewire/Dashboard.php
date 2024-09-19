<?php

namespace App\Livewire;

use App\Models\Rumah;
use Livewire\Component;
use App\Models\Penghuni;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Jenssegers\Agent\Agent;

class Dashboard extends Component
{
    public $penghuniCount, $rumahCount, $pembayaranCount, $pengeluaranCount;
    public $browser;
    public $browserVersion;
    public $platform;
    public $platformVersion;
    public function mount()
    {
        $this->penghuniCount = Penghuni::count();
        $this->rumahCount = Rumah::count();
        $this->pembayaranCount = Pembayaran::count();
        $this->pengeluaranCount = Pengeluaran::count();

        $agent = new Agent();
        $this->browser = $agent->browser();
        $this->browserVersion = $agent->version($this->browser);
        $this->platform = $agent->platform();
        $this->platformVersion = $agent->version($this->platform);
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
