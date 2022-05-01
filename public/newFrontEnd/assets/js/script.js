$(".home_slider").owlCarousel({
        loop: true,
        nav: false,
        responsive: {
            0: {
                items:1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        lazyLoad: true,
        smartSpeed: 750,
        dots:false,
        animateIn: 'zoomIn',
        animateOut: 'zoomOut',
    });

    new WOW().init();

$('.slider_reviews').slick({
    autoplay: true,
    centerMode: true,
    centerPadding: '10%',
    slidesToShow: 2,
    arrows: true,
    dots: true,
    infinite: true,
    responsive: [
    {
        breakpoint: 1400,
        settings: {
        centerPadding: '20px',
        slidesToShow: 2
        }
    },
    {
        breakpoint: 770,
        settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
        }
    },
    {
        breakpoint: 480,
        settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
        }
    }
    ]
});







        var hBtnMob = document.getElementsByClassName('h_btn_mob');
        var hHeader = document.getElementsByClassName('header');
            hBtnMob[0].onclick = function() {
            hHeader[0].classList.toggle("active");
        };


        jQuery(function($){
            $(document).mouseup(function (e){
                var div = $("#cab_left_mobile");
                var div_tab = $("#cab_left_mob");
                if (!div.is(e.target)
                    && div.has(e.target).length === 0) {
                div_tab.removeClass('active');
                }
            });
        });




        let dropdown = function () {
            let selectHeader = document.querySelectorAll('.select_head');
            let selectItem = document.querySelectorAll('.select_item');

            selectHeader.forEach( item => {
                item.addEventListener('click', selectToggle)
            });

            selectItem.forEach( item => {
                item.addEventListener('click', selectChoose)
            });

            function selectToggle() {
                this.parentElement.classList.toggle('active');
            }

            function selectChoose() {
                let text = this.innerHTML,
                    select = this.closest('.dropdown'),
                    currentText = select.querySelector('.select_value');
                currentText.innerHTML = text;
                currentText.dataset.paymentmethod = this.dataset.paymentmethod;
                select.classList.remove('active');
            }



        };

        dropdown();

        $(".dropdown").click(function() {
            $('.select_body').toggle();
        });
        $(document).on('click', function(e) {
        if (!$(e.target).closest(".select_value").length) {
            $('.select_body').hide();
        }
        e.stopPropagation();
        });


        


        

    



        



        


        






        











