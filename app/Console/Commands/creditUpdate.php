<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Plan;
use App\Models\Log;

class creditUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'credit:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is for Update the credit';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userToUpdate = User::where('plan_credit', now()->toDateTimeString())->get();

        foreach($userToUpdate as $item){
            $planSelected = $this->planList($item->plan_id);
            $insuranceSelected = $this->planList($item->plan_insurance_id);

            switch($item->plan_id){
                case 1:
                    User::where('id', $item->id)->update($this->updateCreditModel($item, $planSelected));
                    break;
                case 2:
                    User::where('id', $item->id)->update($this->updateCreditModel($item, $planSelected));
                    break;
                case 3:
                    User::where('id', $item->id)->update($this->updateCreditModel($item, $planSelected));
                    break;
                case 4:
                    if(now()->toDateTimeString() <= $item->plan_expired){
                        User::where('id', $item->id)->update($this->updateCreditModel($item, $planSelected));
                    }
                    break;
            }

            switch($item->plan_insurance_id){
                case 5:
                    if(now()->toDateTimeString() <= $item->insurance_expired){
                        User::where('id', $item->id)->update($this->insuranceCreditModel($item, $insuranceSelected));
                    }else{
                        User::where('id', $item->id)->update(['plan_insurance_id' => '', 'insurance_amount' => '']);
                    }
                    break;
                case 6:
                    if(now()->toDateTimeString() <= $item->insurance_expired){
                        User::where('id', $item->id)->update($this->insuranceCreditModel($item, $insuranceSelected));
                    }else{
                        User::where('id', $item->id)->update(['plan_insurance_id' => '', 'insurance_amount' => '']);
                    }
                    break;
            }
        }

        return 0;
    }

    private function planList($id){
        return Plan::where('id', $id)->first();
    }

    private function userLogs($user_id){
        $data = [];
        $userLogs = Log::where('user_id', $user_id)->get();
    }

    private function updateCreditModel($user, $planSelected){
        return [
            'credit' => $user->credit+(($planSelected->increase_percent/100)*$user->plan_amount),
            'plan_credit' => ($planSelected->id != 4)? now()->addHours(72) : now()->addHour(),
        ];
    }

    private function insuranceCreditModel($user, $insuranceSelected){
        return [
            'credit' => $user->credit+(($insuranceSelected->increase_percent/100)*$user->insurance_amount),
        ];
    }
}
