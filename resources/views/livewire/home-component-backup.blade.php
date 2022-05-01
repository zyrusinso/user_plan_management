<div x-data="{}" x-init="setTimeout(() => { $wire.crypto() }, 1000);">
    <style>
        #starred {
            box-shadow: 3px 3px 10px #b5b5b5
        }

        .table div.text-muted {
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            margin-top: 0.3rem
        }

        .icons {
            object-fit: contain;
            width: 25px;
            height: 25px;
            border-radius: 50%
        }

        .graph img {
            object-fit: contain;
            width: 40px;
            height: 50px;
            transform: scale(2) rotateY(45deg)
        }

        .graph .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 3px solid #fff;
            position: absolute;
            background-color: blue;
            box-shadow: 1px 1px 1px #a5a5a5;
            top: 25px
        }

        .graph .dot:after {
            background-color: #fff;
            content: '$9,999.00';
            font-weight: 600;
            font-size: 0.7rem;
            position: absolute;
            top: -25px;
            left: -20px;
            box-shadow: 1px 1px 2px #a5a5a5;
            border-radius: 2px
        }

        .font-weight-bold {
            font-size: 1.3rem
        }

        #ethereum {
            transform: scale(2) rotateY(45deg) rotateX(180deg)
        }

        #ripple {
            transform: scale(2) rotateY(10deg) rotateX(20deg)
        }

        #eos {
            transform: scale(2) rotateY(50deg) rotateX(190deg)
        }

        .table tr td {
            border: none
        }

        .red {
            color: #ff2f2f;
            font-weight: 700
        }

        .green {
            color: #1cbb1c;
            font-weight: 700
        }

        .labels,
        .graph {
            position: relative
        }

        .green-label {
            background-color: #00b300;
            color: #fff;
            font-weight: 600;
            font-size: 0.7rem
        }

        .orange-label {
            background-color: #ffa500;
            color: #fff;
            font-weight: 600;
            font-size: 0.7rem
        }

        .border-right {
            transform: scale(0.6);
            border-right: 1px solid black !important
        }

        .box {
            transform: scale(1.5);
            background-color: #dbe2ff
        }

        #top .table tbody tr {
            border-bottom: 1px solid #ddd
        }

        #top .table tbody tr:last-child {
            border: none
        }

        select {
            background-color: inherit;
            padding: 8px;
            border-radius: 5px;
            color: #444;
            border: 1px solid #444;
            outline-color: #00f
        }

        .text-white {
            background-color: rgb(43, 159, 226);
            border-radius: 50%;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 3px
        }

        a:hover {
            text-decoration: none
        }

        a:hover .text-white {
            background-color: rgb(20, 92, 187)
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 4px
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #999, #777);
            border-radius: 10px
        }

        @media(max-width:379px) {
            .d-lg-flex .h3 {
                font-size: 1.4rem
            }
        }

        @media(max-width:352px) {
            #plat {
                margin-top: 10px
            }
        }
    </style>
    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-7">
                        <h3>Company Name <br />Business</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        <a class="white_bg_btn" href="{{ route('login') }}">Sign In</a>
                    </div>
                    <div class="col-lg-5">
                        <div class="login_form_inner reg_form">
                            <h3>Logo</h3>
                            <h4>Sign Up</h4>
                            <form class="row login_form" method="POST" action="{{ route('register') }}"  id="contactForm">
                                @CSRF
                                <div class="col-md-12 form-group">
                                    <input type="username" class="form-control" id="username" name="username" placeholder="username" value="{{ old('username') }}">
                                    @error('username') <span class="error" style="color: red"">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    @error('password') <span class="error" style="color: red"">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option2" name="selector">
                                        <label for="f-option2">Keep me logged in</label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn submit_btn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature_product_area">
        <div class="main_box">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-outline">
                            <div class="card-body">
                                <div class="main_title">
                                    <h2>Active Users</h2>
                                    <h4 style="font-size: 30px !important;">{{ count($this->activeUsers()) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card card-outline">
                            <div class="card-body">
                                <div class="main_title">
                                    <h2>Current Account</h2>
                                    <h4 style="font-size: 30px !important;">{{ count($this->currentAccount()) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="clients_logo_area">
        
    </section>

    <section>
        <div class="container mt-5">
            <div class="main_title">
                <h2>LIVE CRYPTO PRICES</h2>
                <p>Top Cryptocurrency Prices</p>
            </div>
            <div class="d-lg-flex align-items-lg-center py-4">
                <div class="h3 text-muted"></div>
            </div>

            <div id="top">
                <div class="bg-white table-responsive">
                    <table class="table">
                        <tbody>
                            @foreach($cryptoData as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex mt-2 border-right">
                                            <div class="box p-2 rounded"> <span class="text-primary px-2 font-weight-bold">0{{ $loop->iteration }}</span> </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="text-muted">Name</div>
                                            <div class="d-flex align-items-center">
                                                <div> <img src="{{ asset('cryptoIcon').'/'.$this->cryptoIcon()[$item->data->id] }}" alt="" class="icons"> </div> <b class="pl-2">{{ $item->data->name }} ({{ $item->data->symbol }})</b>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="text-muted">Market cap</div>
                                            <div><b>${{ number_format(round($item->data->marketCapUsd, 2)) }}</b></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="text-muted">Price</div>
                                            <div><b>${{ round($item->data->priceUsd, 4) }}</b></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center labels">
                                                <div class="text-muted">Volume</div>
                                                <div class="green-label mx-1 px-1 rounded">24</div>
                                            </div>
                                            <div><b>${{ round($item->data->volumeUsd24Hr, 2) }}</b></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center labels">
                                                <div class="text-muted">Change</div>
                                                <div class="orange-label mx-1 px-1 rounded">24</div>
                                            </div>
                                            <div><b class="{{ ($item->data->changePercent24Hr > 0 )? 'green' : 'red' }}">{{ round($item->data->changePercent24Hr, 3) }}%</b></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>