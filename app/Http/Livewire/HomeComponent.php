<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WisdomDiala\Cryptocap\Facades\Cryptocap;
use App\Models\User;

class HomeComponent extends Component
{
    public $cryptoData = [];

    public function redirectToLogin(){
        redirect(route('login'));
    }

    public function mount(){
        if(auth()->user()){
            redirect(route('home'));
        }
        $this->crypto();
    }

    public function crypto(){
        $this->reset();

        array_push($this->cryptoData, Cryptocap::getSingleAsset('bitcoin'));
        array_push($this->cryptoData, Cryptocap::getSingleAsset('ethereum'));
        array_push($this->cryptoData, Cryptocap::getSingleAsset('tether'));
        array_push($this->cryptoData, Cryptocap::getSingleAsset('tron'));
        $this->render();
    }

    public function cryptoIcon(){
        return [
            'bitcoin' => 'bitcoin.png',
            'ethereum' => 'ethereum.png',
            'tether' => 'tether.png',
            'tron' => 'tron.png',
        ];
    }

    public function activeUsers(){
        return User::where('status', 'active')->get();
    }

    public function currentAccount(){
        return User::all();
    }

    public function render()
    {
        return view('livewire.home-component', [
            'cryptoData' => $this->cryptoData
        ])->layout('layouts.frontend');
    }
}
