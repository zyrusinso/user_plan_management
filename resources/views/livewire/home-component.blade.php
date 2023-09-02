<div>
    <style>
    .plans .stat_block{background: rgba(212, 222, 255, 0.5);}
    .plans_wrapper {margin-top: 50px;}


    .plans_wrapper p.details{
        font-weight: 500;
        font-size: 18px;
        line-height: 22px;
        color: #170083;
        margin-top: 20px;
        margin-bottom: 15px;
    }
    </style>

    <div class="container">
        <div class="home_dignity plans">
            <div class="content">
                <div class="content">
                    <h1>Investment Plans</h1>
                    <div class="home_our_statistic_flex plans_wrapper">

                        <div class="stat_block">

                            <div class="stat_block_icon">
                            </div>
                            <div class="stat_block_text">
                                <h1>Plan 1</h1>
                                <span>85%<span style="font-size: 16px;">profit in 72 hours</span></span>
                                <p class="details">Min: $50.00</p>
                                <p class="details">Plan duration: </p>
                            </div>
                        </div>

                        <div class="stat_block">

                            <div class="stat_block_icon">
                            </div>
                            <div class="stat_block_text">
                                <h1>Plan 2</h1>
                                <span>107%<span style="font-size: 16px;">profit in 72 hours</span></span>
                                <p class="details">Min: $70.00</p>
                                <p class="details">Plan duration: </p>
                            </div>
                        </div>

                        <div class="stat_block">

                            <div class="stat_block_icon">
                            </div>
                            <div class="stat_block_text">
                                <h1>Plan 3</h1>
                                <span>200%<span style="font-size: 16px;">profit in 72 hours</span></span>
                                <p class="details">Min: $110.00</p>
                                <p class="details">Plan duration: </p>
                            </div>
                        </div>

                        <div class="stat_block">

                            <div class="stat_block_icon">
                            </div>
                            <div class="stat_block_text">
                                <h1>Plan 4</h1>
                                <span>263%<span style="font-size: 16px;">profit in 72 hours</span></span>
                                <p class="details">Min: $250.00</p>
                                <p class="details">Plan duration:</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home_our_statistic" style="margin-top: 20px;">
            <div class="rings">
                <span class="a_ring"></span>
                <span class="a_ring"></span>
                <span class="a_ring"></span>
                <span class="a_ring"></span>
                <span class="a_ring"></span>
            </div>
            <div class="planets">
                <img src="{{ asset('newFrontEnd/assets/img/h_ourstat_p1.png') }}" class="img_1" alt="">
                <img src="{{ asset('newFrontEnd/assets/img/h_ourstat_p1.png') }}" class="img_2" alt="">
                <img src="{{ asset('newFrontEnd/assets/img/h_ourstat_p1.png') }}" class="img_3" alt="">
            </div>


            <div class="content">
                <h1>Website statistics</h1>
                <div class="home_our_statistic_flex" style="justify-content: center;">
                    <div class="stat_block" style="margin-right: 10px;">
                        <div class="stat_block_icon">
                            <img src="{{ asset('newFrontEnd/assets/img/h_our_stat2.png') }}" alt="">
                        </div>
                        <div class="stat_block_text">
                            <p>Active Users</p>
                            <span>{{ count($this->activeUsers()) }}</span>
                        </div>
                    </div>

                    <div class="stat_block">
                        <div class="stat_block_icon">
                            <img src="{{ asset('newFrontEnd/assets/img/h_our_stat2.png') }}" alt="">
                        </div>
                        <div class="stat_block_text">
                            <p>Current Account</p>
                            <span>{{ count($this->currentAccount()) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="home_crypto_statistic" >
            <div class="content">
                <h1>Today’s Cryptocurrency Statistics</h1>
                <div class="home_crypto_statistic_table">

                    <div class="crypto_table" id="crypto">
                        <div class="row caption">
                            <p>Name</p>
                            <p>Price</p>
                            <p>24h %</p>
                            <p>Marcet cap</p>
                            <p>Volume (24h)</p>
                        </div>

                        <div class="scroll" wire:poll="crypto">
                            @foreach ($this->cryptoData as $item)
                                <div class="row">
                                    <p>
                                        <img style="width: 40px" src="{{ asset('cryptoIcon').'/'.$this->cryptoIcon()[$item->data->id] }}"
                                            alt="">
                                        <span>{{ $item->data->name }} ({{ $item->data->symbol }})</span>
                                    </p>
                                    <p>$ {{ round($item->data->priceUsd, 4) }}</p>
                                    <p class="{{ ($item->data->changePercent24Hr > 0)? 'up' : 'down' }}">{{ round($item->data->changePercent24Hr, 3) }} %</p>
                                    <p>$ {{ number_format(round($item->data->marketCapUsd, 2)) }}</p>
                                    <p style="flex-direction: column; justify-content: center; align-items: flex-end">
                                        <span>$ {{ round($item->data->volumeUsd24Hr, 2) }}</span>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer">
            <div class="content">

                <div class="footer_flex">
                    <div class="flex_left">
                        Company Logo
                        <!-- <a href="coinrost_default.html" class="logo"><img src="{{ asset('newFrontEnd/') }}assets/img/logo.png" alt=""></a> -->
                        <div class="footer_copyright">
                            <p>Company© 2022 all rights reserved</p>
                        </div>
                    </div>
                    <div class="flex_right">
                        <!--<div class="footer_socials">
                            <a href="https://t.me/" target="_blank"><img src="/assets/img/h_tel.png" alt=""></a>
                            <a href="https://t.me/" target="_blank"><img src="/assets/img/h_tel.png" alt=""></a>

                        </div>-->
                        <div class="footer_copyright right">
                            <a href="#">Terms to use</a>
                        </div>
                        <div class="footer_menu">
                            <a href="#">About</a>
                            <a href="#">Referral</a>
                            <a href="#">F.A.Q.</a>
                            <a href="#">Contacts</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script>
            function getElementY(query) {
                return window.pageYOffset + document.querySelector(query).getBoundingClientRect().top;
            }
            function doScrolling(element, duration) {
                var startingY = window.pageYOffset;
                var elementY = getElementY(element);
                var targetY = document.body.scrollHeight - elementY < window.innerHeight ? document.body.scrollHeight - window.innerHeight : elementY;
                var diff = targetY - startingY;
                var easing = function (t) { return t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1 }
                var start;
                if (!diff) return;
                window.requestAnimationFrame(function step(timestamp) {
                    if (!start) start = timestamp;
                    var time = timestamp - start;
                    var percent = Math.min(time / duration, 1);
                    percent = easing(percent);
                    window.scrollTo(0, startingY + diff * percent);
                    if (time < duration) {
                        window.requestAnimationFrame(step);
                    }
                })
            }

            var flag = 0;

            $(document).ready(function () {
                "use strict";

                var e = $(".top"); $(window).on("scroll", function () { 300 < $(this).scrollTop() ? e.addClass("is-visible") : e.removeClass("is-visible fade-out"), 1200 < $(this).scrollTop() && e.addClass("fade-out") }); e.on("click", function (e) { e.preventDefault(); doScrolling(".container-menu", 700); });


                $(".btn_lang").on("click", function () {
                    $(".dropdown-menu").toggle();
                });
            });
        </script>
    </div>
</div>