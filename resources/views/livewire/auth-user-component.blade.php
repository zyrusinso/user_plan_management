<div>
    <div class="home_banner " style="background-color: #2C2F33; color: white">
        
    </div>

    <div class="pt-5 p-auto " style="background-color: #2C2F33; color: white; width: 100% !imporant; margin: 0 0 0 0;">
        
        <div class="container" style="background-color: #2C2F33; min-height: 100vh !important;">
            <div class="d-flex justify-content-center text-center">
                <h2 style="font-size:50px !important">Welcome {{ auth()->user()->username }} to company <br> your balance is {{ auth()->user()->credit }}</h2>
            </div>           

            <div class="row">
                @foreach ($creditedUserPlans as $item)
                    <div class="col-12">
                        <div class="d-flex justify-content-center text-center mt-3">
                            <h4>you have a 
                                <b class="text-primary">{{ $item->amount }} in {{ App\Models\User::planList()[$item->plan_id]}}</b>
                                @if ($item->insurance_id != null)
                                    <b class="text-primary">+ {{ App\Models\Plan::insuranceList()[$item->insurance_id]}}</b>
                                @endif
                            </h4>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    <div class="justify-content-center text-center mt-3">
                        @if (auth()->user()->credit < 1)
                            <p class="text-danger">Please {{ auth()->user()->username }} Minimum Deposit your account by contacting support</p>
                            <a class="btn btn-primary text-white mb-2" style="background-color: #5865F2;" href="{{ route('chat') }}">Contact Support</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <div class="home_dignity plans">
        <div class="content">
            <div class="content">
                @if (session()->has('topUpSuccess'))
                <div class="row">
                    <div class="col-2 offset-5">
                        <div class="alert alert-success text-center">
                            {{ session('topUpSuccess') }}
                        </div>
                    </div>
                </div>
                @endif
                <h1>Investment Plans</h1>
                <div class="home_our_statistic_flex plans_wrapper">
                    <div class="stat_block">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Plan 1</h1>
                            <span>85%<span style="font-size: 16px;">profit in 72 hours</span></span>
                            <p class="details">Min: $50.00</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 50)
                                <a wire:click.prevent="planSelectionShowModal(1)" style="color: white; background-color: #5865F2; " type="button" class="btn btn-primary mb-3 text-white">Choose</a>
                            @else
                                <a href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click.prevent="insufficientShowModal">Choose</a>
                            @endif
                        </div>
                    </div>

                    <div class="stat_block">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Plan 2</h1>
                            <span>107%<span style="font-size: 16px;">profit in 72 hours</span></span>
                            <p class="details">Min: $70.00</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 70)
                                <button wire:click.prevent="planSelectionShowModal(2)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>
                    <div class="stat_block">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Plan 3</h1>
                            <span>200%<span style="font-size: 16px;">profit in 72 hours</span></span>
                            <p class="details">Min: $110.00</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 110)
                                <button wire:click.prevent="planSelectionShowModal(3)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>

                    <div class="stat_block">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Plan 4</h1>
                            <span>263%<span style="font-size: 16px;">profit in 72 hours</span></span>
                            <p class="details">Min: $250.00</p>
                            <p class="details">Plan duration:</p>
                            @if (auth()->user()->credit >= 250)
                                <button wire:click.prevent="planSelectionShowModal(4)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="home_our_statistic_flex plans_wrapper" style="justify-content: center">
                    <div class="stat_block" style="margin-right: 6px; margin-top: 10px;">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Plan 5</h1>
                            <span>380%<span style="font-size: 16px;">profit in 72 hours</span></span>
                            <p class="details">Min: $550.00</p>
                            <p class="details">Plan duration:</p>
                            @if (auth()->user()->credit >= 550)
                                <button wire:click.prevent="planSelectionShowModal(5)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>
                </div>

                <h1>Insurance Plans</h1>
                <div class="home_our_statistic_flex plans_wrapper" style="justify-content: center">
                    
                    <div class="stat_block" style="margin-right: 6px; margin-top: 10px;">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Basic Insurance</h1>
                            <span>$4.5<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">24% extra per plan</p>
                            <p class="details">5% withdrawal discount +</p>
                            <p class="details">increase betting win by 20%</p>
                            <p class="details">Plan duration: </p>
                            <button wire:click.prevent="insuranceSelectionShowModal(1)" style="color: white; background-color: #5865F2; " type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                        </div>
                    </div>

                    <div class="stat_block" style="margin-left: 10px; margin-top: 10px;">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>VIP Insurance</h1>
                            <span>$7<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">For balance over $100</p>
                            <p class="details">42% Extra per Plan</p>
                            <p class="details">15% withdrawal discount +</p>
                            <p class="details">Increase bet win rate by 50%</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 100)
                                <button wire:click.prevent="insuranceSelectionShowModal(2)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>
                    
                    <div class="stat_block" style="margin-left: 10px; margin-right: 6px; margin-top: 10px;">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>VIP+ Insurance</h1>
                            <span>$12<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">78.2% Extra per Plan</p>
                            <p class="details">20% withdrawal discount +</p>
                            <p class="details">Increase bet win rate by 80%</p>
                            <p class="details">Plan duration: </p>
                            <a wire:click.prevent="insuranceSelectionShowModal(3)" style="color: white; background-color: #5865F2; " type="button" class="btn btn-primary mb-3 text-white">Choose</a>
                        </div>
                    </div>

                    <div class="stat_block" style=" margin-left: 10px; margin-top: 10px;">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>VIP++ Insurance</h1>
                            <span>$20<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">For 100% extra per plan</p>
                            <p class="details">25% withdrawal discount +</p>
                            <p class="details">Increase bet win rate by 92.9%</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 500)
                                <button wire:click="insuranceSelectionShowModal(4)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Error!') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <h3>Sorry, but you have insufficient funds</h3>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Okay') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Create & Update Modal -->
    <x-jet-dialog-modal wire:model="planModalFormVisible">
        <x-slot name="title">
            @if (!$selectedInsuranceID)
                {{ __('Plan') }}
            @else
                {{ __('Insurance') }}
            @endif
        </x-slot>

        @if (!$selectedInsuranceID)
            <x-slot name="content">
                <div class="mb-3">
                    <h3 class="text-center">You choose {{ $selectedPlanID? strtoupper($this->planSelectedData()->name) : '' }}</h3>
                    <div class="mb-3 mt-3">
                        <x-jet-label for="amount" value="{{ __('Amount') }}" />
                        <x-jet-input id="amount" type="text" class="{{ $errors->has('amount') ? 'is-invalid' : '' }}"
                                    wire:model="amount" autofocus />
                        <x-jet-input-error for="amount" />
                    </div>
                </div>
            </x-slot>
        @else
            <x-slot name="content">
                <div class="mb-3">
                    <div class="mb-3 mt-3">
                        <label>Select a Plan where you put the Insurance</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Plan</label>
                        <select wire:model="planSelectedForInsurance" class="form-control">
                            <option>-- Select a Plan --</option>
                            @foreach(\App\Models\Plan::userSelectedPlan(auth()->user()->id) as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('planSelectedForInsurance') <span class="error" style="color: red"">{{ $message }}</span> @enderror
                    </div>
                </div>
            </x-slot>
        @endif

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('planModalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ms-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Submit') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
