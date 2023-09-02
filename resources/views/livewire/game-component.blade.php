<div>
    @include('auth-header', ['title'=>'Game'])
    <style>
        .countdown * {
        font-family: Impact, sans-serif;
        box-sizing: border-box;
        text-align: center;
        }
        .countdown {
        display: flex;
        margin: 0 auto;
        min-width: 500px;
        }

        /* (B) DAY/HR/MIN/SEC CELLS */
        .countdown .cell {
        flex-grow: 1;
        flex-basis: 0;
        padding: 10px;
        }
        .digits {
            font-size: 24px;
            color: #000;
            background: #fff;
            padding: 10px;
            border-radius: 5px;
        }
        .countdown .text {
        margin-top: 10px;
        color: #ddd;
        }

    </style>
    <div class="content">
        <div class="row justify-content-center" style="margin-top: 50px">
            <div class="col-9 col-xl-4">
                <div class="mb-3">
                    <div class="form-group">
                        <select wire:model="status" class="form-control">
                            <option>-- Select a Game --</option>
                            <option value="">Roulette</option>
                            <option value="">Jackpot</option>
                            
                        </select>
                        @error('status') <span class="error" style="color: red"">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 30px">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-header" style="background-color: #2C2F33">
                        <h1 class="text-center text-white">Bet</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="1st">1st Slot</label>
                            <input type="text" class="form-control" id="1st" placeholder="(0-9)">
                        </div>
                        <div class="form-group mb-2">
                            <label for="2nd">2nd Slot</label>
                            <input type="text" class="form-control" id="2nd" placeholder="(0-9)">
                        </div>
                        <div class="form-group mb-2">
                            <label for="3rd">3rd Slot</label>
                            <input type="text" class="form-control" id="3rd" placeholder="(0-9)">
                        </div>
                        <div class="form-group mb-2">
                            <label for="4th">4th Slot</label>
                            <input type="text" class="form-control" id="4th" placeholder="(0-9)">
                        </div>
                        <hr>
                        <div class="form-group mb-2">
                                <label for="amount" class="text-center">Amount</label>
                                <input type="text" class="form-control" id="amount">
                            </div>
                        <button class="btn btn-primary w-100 text-white" style="background-color: #5865F2">Start</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header" style="background-color: #2C2F33">
                        <h1 class="text-center text-white">Result</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="digits text-center text-white font-weight-bold" style="background-color: #2C2F33;">0</div>
                                <h5 class="text-center" style="color: blue;">win</h5>
                            </div>
                            <div class="col-3">
                                <div class="digits text-center text-white font-weight-bold" style="background-color: #2C2F33;">0</div>
                                <h5 class="text-center" style="color: red;">lose</h5>
                            </div>
                            <div class="col-3">
                                <div class="digits text-center text-white font-weight-bold" style="background-color: #2C2F33;">0</div>
                                <h5 class="text-center" style="color: blue;">win</h5>
                            </div>
                            <div class="col-3">
                                <div class="digits text-center text-white font-weight-bold" style="background-color: #2C2F33;">0</div>
                                <h5 class="text-center" style="color: blue;">win</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
