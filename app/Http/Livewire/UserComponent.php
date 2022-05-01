<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
// use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class UserComponent extends Component
{
    // use WithPagination;
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public $username;
    public $credit;
    public $status;
    public $is_admin;
    public $userFilter;

    //Validation Rules
    public function rules(){
        return [
            'username' => 'required|string|min:4',
            'credit' => 'required|numeric',
            'status' => 'required|string',
            'is_admin' => 'required'
        ];
    }

    public function loadModel(){
        $data = User::where('id', $this->modelId)->first();
        //Assign The Variable Here

        $this->username = $data->username;
        $this->credit = $data->credit;
        $this->status = $data->status;
        $this->is_admin = $data->is_admin;
    }
    
    //The Data for the model mapped in this component
    public function modelData(){
        return [
            'username' => $this->username,
            'credit' => $this->credit,
            'status' => $this->status,
            'is_admin' => $this->is_admin,
        ];
    }
    
    public function read(){
        if($this->userFilter == 'active'){
            return User::where('status', 'active')->latest()->get();
        }

        if($this->userFilter == 'inactive'){
            return User::where('status', 'inactive')->latest()->get();
        }

        if($this->userFilter == 'new'){
            return User::where('created_at', '>=', now()->subDays(2))->latest()->get();
        }

        return User::latest()->get();
    }

    public function update(){
        $this->validate();
        User::where('id', $this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete(){
        User::where('id', $this->modelId)->delete();
        $this->modalConfirmDeleteVisible = false;
    }

    public function createShowModal(){
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function updateShowModal($id){
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    public function deleteShowModal($id){
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function mount(){
        if(request()->has('ref')){
            if(request()->query('ref') == 'active'){
                $this->userFilter = 'active';
                $this->render();
            }

            if(request()->query('ref') == 'inactive'){
                $this->userFilter = 'inactive';
                $this->render();
            }

            if(request()->query('ref') == ''){
                $this->userFilter = 'new';
                $this->render();
            }
        }
    }

    public function render()
    {
        return view('livewire.user-component', [
            'data'=> $this->read()
        ])->layout('layouts.base');
    }
}