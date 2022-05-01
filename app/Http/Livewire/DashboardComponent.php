<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Log;
use App\Models\Plan;

class DashboardComponent extends Component
{
    public function newUsers(){
        return User::where('created_at', '>=', now()->subDays(2))->get();
    }

    public function activeUsers(){
        return User::where('status', 'active')->get();
    }

    public function inActiveUsers(){
        return User::where('status', 'inactive')->get();
    }

    public function read(){
        return Log::where('status', 'Pending')->latest()->get();
    }

    public function userData($id){
        return User::where('id', $id)->first();
    }

    public function planData($id){
        return Plan::where('id', $id)->first();
    }

    public function statusBadge(){
        return [
            'Success' => 'badge-success',
            'Pending' => 'badge-info'
        ];
    }

    public function render()
    {
        return view('livewire.dashboard-component', [
            'data' => $this->read()
        ])->layout('layouts.base');
    }
}
