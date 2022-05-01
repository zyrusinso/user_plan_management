<div>
    <div class="home_banner " style="background-color: #2C2F33; color: white">
        
    </div>

    <div class="pt-5" style="background-color: #2C2F33; color: white;">
        
        <div class="d-flex justify-content-center text-center">
            <h2 style="font-size:50px !important">Welcome {{ auth()->user()->username }} to company <br> your balance is {{ auth()->user()->credit }}</h2>
        </div>           
       
        <div class="d-flex justify-content-center text-center mt-3">
            @if (auth()->user()->plan_insurance_id != null || auth()->user()->plan_id != null)
                <h4>you have a 
                    <b class="text-primary">{{ auth()->user()->plan_amount }} in {{ App\Models\User::planList()[auth()->user()->plan_id]}}</b>
                    @if (auth()->user()->plan_id != null)
                        <b class="text-primary">+ {{ App\Models\User::insuranceList()[auth()->user()->plan_insurance_id]}}</b>
                    @endif
                </h4>
            @endif
        </div>

        <div class="justify-content-center text-center mt-3">
            @if (auth()->user()->credit < 1)
                <p class="text-danger">Please {{ auth()->user()->username }} Minimum Deposit your account by contacting support</p>
                <a class="btn btn-primary text-white mb-2" style="background-color: #5865F2;" href="#">Contact Support</a>
            @endif
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
                            <h1>Plan A</h1>
                            <span>85%<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">Min: $50.00</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 50)
                                <a wire:click="planSelectionShowModal(1)" style="color: white; background-color: #5865F2; " type="button" class="btn btn-primary mb-3 text-white">Choose</a>
                            @else
                                <a href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</a>
                            @endif
                        </div>
                    </div>

                    <div class="stat_block">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Plan B</h1>
                            <span>180%<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">Min: $70.00</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 70)
                                <button wire:click="planSelectionShowModal(2)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>
                    <div class="stat_block">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Plan C</h1>
                            <span>200%<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">Min: $110.00</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 110)
                                <button wire:click="planSelectionShowModal(3)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>

                    <div class="stat_block">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Plan D</h1>
                            <span>5%<span style="font-size: 16px;">per hour</span></span>
                            <p class="details">Min: $250.00</p>
                            <p class="details">Plan duration: 72 hours</p>
                            @if (auth()->user()->credit >= 250)
                                <button wire:click="planSelectionShowModal(4)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
                            @else
                                <button href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"">
                <div class="home_our_statistic_flex plans_wrapper" style="justify-content: center">
                    <div class="stat_block" style="  margin-right: 6px; margin-top: 10px;">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Basic Insurance Plan</h1>
                            <span>$4.5<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">for balance under $500</p>
                            <p class="details">increase by 41.9%</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit < 500)
                                <a wire:click="planSelectionShowModal(1)" style="color: white; background-color: #5865F2; " type="button" class="btn btn-primary mb-3 text-white">Choose</a>
                            @else
                                <a href="#" type="button" class="btn btn-outline-secondary mb-3" wire:click="insufficientShowModal">Choose</a>
                            @endif
                        </div>
                    </div>

                    <div class="stat_block" style=" margin-left: 10px; margin-top: 10px;">
                        <div class="stat_block_icon mt-2">
                        </div>
                        <div class="stat_block_text">
                            <h1>Silver Insurance Plan</h1>
                            <span>180%<span style="font-size: 16px;">per 72 hours</span></span>
                            <p class="details">for balance over $500</p>
                            <p class="details">increase by 91.1%</p>
                            <p class="details">Plan duration: </p>
                            @if (auth()->user()->credit >= 500)
                                <button wire:click="planSelectionShowModal(2)" style="background-color: #5865F2" type="button" class="btn btn-primary mb-3 text-white">Choose</button>
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
            {{ __('User') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <h3>You choose {{ strtoupper($this->planSelectedData()->name) }}</h3>
                <div class="mb-3 mt-3">
                    <x-jet-label for="amount" value="{{ __('Amount') }}" />
                    <x-jet-input id="amount" type="text" class="{{ $errors->has('amount') ? 'is-invalid' : '' }}"
                                wire:model="amount" autofocus />
                    <x-jet-input-error for="amount" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('planModalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ms-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Okay') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
