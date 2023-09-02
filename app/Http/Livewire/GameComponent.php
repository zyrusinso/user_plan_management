<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GameComponent extends Component
{
    public $outputNum;
    public $radioValue;
    public $randNum = null;

    protected $listeners = ['spinWheel'];

    public function spinWheel(){
        $random_num = (int)floor((rand(0,1000)/1000) * 36);
        // $this->outputNum = $random_num;
        $this->randNum = 34;
    }

    public function render()
    {
        return view('livewire.game-component')->layout('layouts.frontend');
    }
}
