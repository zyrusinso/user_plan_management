<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;
use App\Models\Log;
use App\Models\User;

class AuthUserComponent extends Component
{
    public $modalFormVisible = false;
    public $planModalFormVisible = false;
    public $selectedPlanID = 1;
    public $amount;

    //Validation Rules
    public function rules(){
        return [
            'amount' => 'required|numeric',
        ];
    }

    public function create(){
        $planSelected = Plan::where('id', $this->selectedPlanID)->first();

        if($this->amount < $planSelected->amount){
            return $this->addError('amount', 'Input amount minimum of '.$planSelected->amount);
        }

        if($this->amount > auth()->user()->credit){
            return $this->addError('amount', 'insufficient funds, you only have '.auth()->user()->credit);
        }
        
        Log::create($this->selectedPlanModel());
        User::where('id', auth()->user()->id)->update($this->userTopUpModel($planSelected));
        session()->flash('topUpSuccess', 'Successfully Top Up');
        $this->planModalFormVisible = false;
        return redirect(request()->header('Referer'));
    }

    public function selectedPlanModel(){
        return [
            'user_id' => auth()->user()->id,
            'plan_id' => $this->selectedPlanID,
            'status' => 'Pending',
            'amount' => $this->amount,
        ];
    }

    public function userTopUpModel($planSelected){
        return [
            'plan_id' => $planSelected->id,
            'plan_credit' => now()->addHours($planSelected->credit_time),
            'plan_amount' => ($planSelected->id != 5 || $planSelected->id != 6)? $this->amount : auth()->user()->plan_amount,
            'plan_expired' => now()->addHours($planSelected->expired_time),
            'insurance_expired' => now()->addHours($planSelected->expired_time),
            'plan_insurance_id' => ($planSelected->id == 5 || $planSelected->id == 6)? $planSelected->id : auth()->user()->plan_insurance_id,
            'credit' => ($planSelected->id != 5 || $planSelected->id != 6)? auth()->user()->credit-$this->amount : auth()->user()->credit
        ];
    }

    public function insufficientShowModal(){
        $this->modalFormVisible = true;
    }

    public function planSelectionShowModal($id){
        $this->resetValidation();
        $this->selectedPlanID = $id;
        $this->planModalFormVisible = true;
    }

    public function planSelectedData(){
        return Plan::where('id', $this->selectedPlanID)->first();
    }

    public function render()
    {
        return view('livewire.auth-user-component')->layout('layouts.frontend');
    }
}
