<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;
use App\Models\Log;
use App\Models\User;
use App\Models\UserPlan;
use App\Models\Insurance;

class AuthUserComponent extends Component
{
    public $modalFormVisible = false;
    public $planModalFormVisible = false;
    public $selectedPlanID;
    public $amount;
    public $selectedInsuranceID;
    public $planSelectedForInsurance;

    //Validation Rules
    public function rules(){
        return [
            'amount' => 'required|numeric',
        ];
    }

    public function create(){
        $planSelected = Plan::where('id', $this->selectedPlanID)->first();
        $insuranceSelected = Insurance::where('id', $this->planSelectedForInsurance)->first();
        
        if(!$this->selectedInsuranceID){
            if($this->amount < $planSelected->amount){
                return $this->addError('amount', 'Input amount minimum of '.$planSelected->amount);
            }
    
            if($this->amount > auth()->user()->credit){
                return $this->addError('amount', 'insufficient funds, you only have '.auth()->user()->credit);
            }

            Log::create($this->selectedPlanModel());
            UserPlan::updateOrCreate(['user_id' => auth()->id(), 'plan_id' => $planSelected->id], $this->userPlanModel($planSelected));
            User::where('id', auth()->user()->id)->update($this->userTopUpModel($planSelected));
        }else{
            Log::create($this->selectedPlanModel());
            UserPlan::where('user_id', auth()->id())->where('plan_id', $this->planSelectedForInsurance)->update($this->userInsuranceModel());
            User::where('id', auth()->user()->id)->update($this->userTopUpModel($planSelected));
        }

        session()->flash('topUpSuccess', 'Successfully Top Up');
        $this->planModalFormVisible = false;
        // $this->render();
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

    public function userPlanModel($planSelected){
        return [
            'user_id' => auth()->id(),
            'plan_id' => $this->selectedPlanID,
            'amount' => (!$planSelected)? $this->amount : $this->userPlan($planSelected)->amount + $this->amount,
            'plan_credit' => now()->addHours(72),
            // 'insurance_expired' => '',
        ];
    }

    public function userInsuranceModel(){
        return [
            'insurance_id' => $this->selectedInsuranceID
        ];
    }

    public function userTopUpModel($planSelected){
        return [
            // 'plan_id' => $planSelected->id,
            // 'plan_credit' => now()->addHours($planSelected->credit_time),
            // 'plan_amount' => ($planSelected->id != 5 || $planSelected->id != 6)? $this->amount : auth()->user()->plan_amount,
            // 'plan_expired' => now()->addHours($planSelected->expired_time),
            // 'insurance_expired' => now()->addHours($planSelected->expired_time),
            // 'plan_insurance_id' => ($planSelected->id == 5 || $planSelected->id == 6)? $planSelected->id : auth()->user()->plan_insurance_id,
            'credit' => auth()->user()->credit-$this->amount
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

    public function insuranceSelectionShowModal($id){
        $this->resetValidation();
        $this->selectedInsuranceID = $id;
        $this->planModalFormVisible = true;
    }

    public function planSelectedData(){
        return Plan::where('id', $this->selectedPlanID)->first();
    }

    public function creditedUserPlans(){
        return UserPlan::where('user_id', auth()->user()->id)->get();
    }

    public function userPlan($planSelected){
        return UserPlan::where('user_id', auth()->user()->id)->where('plan_id', $planSelected->id)->first();
    }

    public function render()
    {
        return view('livewire.auth-user-component', [
            'creditedUserPlans' => $this->creditedUserPlans()
        ])->layout('layouts.frontend');
    }
}
