$(document).ready(function () {

    // /* magnificPopup img view */
    // $('.popup-image').magnificPopup({
    //     type: 'image',
    //     gallery: {
    //         enabled: true
    //     }
    // });

    // /* magnificPopup video view */
    // $('.popup-video').magnificPopup({
    //     type: 'iframe'
    // });

    // //for menu active class
    // $('.portfolio-menu button').on('click', function (event) {
    //     $(this).siblings('.active').removeClass('active');
    //     $(this).addClass('active');
    //     event.preventDefault();
    // });

    // // WOW active
    // new WOW().init();

    // // slick slider for banner 
    $('.banner-slider').slick({
        prevArrow: '<i class="arrows prev icofont-rounded-left"></i>',
        nextArrow: '<i class="arrows next icofont-rounded-right"></i>',
        // dots: true,
        autoplay: true
    });

    $('.slider-1').slick({
        prevArrow: '<i class="arrows prev icofont-rounded-left"></i>',
        nextArrow: '<i class="arrows next icofont-rounded-right"></i>',
        // autoplay: true,
        slidesToShow: 6,
        slidesToScroll: 2,
        infinite: false,
    })
    $('.slider-5').slick({
        prevArrow: '<i class="arrows prev icofont-rounded-left"></i>',
        nextArrow: '<i class="arrows next icofont-rounded-right"></i>',
        // autoplay: true,
        slidesToShow: 5,
        slidesToScroll: 2,
        infinite: false,
    })


    $.each($('.count-down'), (index, item) => {
        const time = $(item).data('countDown');

        $(item).countdown(time).on('update.countdown', function(event) {

            var format = '%H:%M:%S';

            if(event.offset.totalDays > 0) {
                format = '%-d day%!d ' + format;
            }
            if(event.offset.weeks > 0) {
                format = '%-w week%!w ' + format;
            }
            $(this).html(event.strftime(format));

        }).on('finish.countdown', function(event) {
            $(this).html('This offer has expired!').parent().addClass('disabled');
        });
    })


    $('.count-down').data('countDown');
    $('.countTo').waypoint(function() {
        $('.countTo').countTo();
    }, {offset: '90%'});


    const sideBar = $('#slide-bar');
    sideBar.stickySidebar({
        topSpacing: 60,
        bottomSpacing: 60
    });
    
    // $(window).on('scroll', () => {
    //     const productSection = $('#product-details-section').offset().top;
    //     const scrolled = $(document).scrollTop();
    //     if (scrolled >= productSection) {
    //         $('.new-side-bar').replaceWith(sideBar);
    //     }
    // });
    

    // // my code ----------------------------------------------------------------------
    // // preloader
    // $(".preloader").animate({
    //     top: -2000000
    // }, 1500);

    // // sticky menu ber and go to top button
    // $(window).scroll(function () {
    //     var scrolled = $(window).scrollTop();
    //     var topMain = $('main').offset().top - 400;

    //     // go to top button
    //     if (scrolled > topMain) {
    //         $('.go-to-top').addClass('active');
    //         $('.nav-outer').addClass('sticky');

    //         $('.go-to-top').click(function () {
    //             $(window).scrollTop(0);
    //         });
    //     } else {
    //         $('.go-to-top').removeClass('active');
    //         $('.nav-outer').removeClass('sticky')
    //     }
    //     // console.log(scrolled);
    // });

    // // menu bar open -------------------------
    // $('.navigations .menu-icon').click(function () {
    //     $('.mobile-navigations').css({
    //         'width': '100%',
    //         'padding': '3rem 5rem'
    //     });
    //     // $('.mobile-navigations').toggleClass('w-100 py-5 pl-50 pr-50')
    // });
    // // menu bar close -------------------------
    // $('.mobile-navigations li.close-menu').click(function () {
    //     $('.mobile-navigations').css({
    //         'width': '0',
    //         'padding': '0'
    //     });
    // });
    // // dropdown toggle ------------------
    // $('.mobile-navigations li.has-dropdown > i').click(function () {
    //     $(this).parent().find('>ul').slideToggle()
    // });

    let dataStyle = $('.data-style');
    $.each(dataStyle, (index, item) => {
        $(item).css({
            'background-color': $(item).data('backgroundColor'),
            'height': $(item).data('height'),
            'width': $(item).data('width'),
        });
    });


});    
