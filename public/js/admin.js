$(document).ready(function () {
    "use strict";

    /* This is for countries but it has been blocked duo to some issues
    function getAJAX(url) {
        var results;
        $.ajax
        ({
            type: 'GET',
            url: url,
            dataType: 'json',
            data: {},
            async: false,
            success: function (data) {
                //console.log(data);
                results = data;
            },
            error: function (data) {
                console.log(data);
                results = data;
            }
        });
        return results;
    }

    var language = $("html").attr("lang"); //get language from html set lang="en" or lang ="ar" if you don't set it

    // countries
    var conutriesURL = 'http://api.geonames.org/countryInfoJSON?q=&country=&lang=ar&username=abdulnaser_mohsen'; //url that get your conuntries
    var countries = getAJAX(conutriesURL); // the importance of async test without aync or aync is true
    //console.log(countries);
    //console.log(countries.geonames);
    $(countries.geonames).each(function (index, item) {
        //console.log(item.countryName , item.geonameId);
        var selectOption = $("<option>")
        selectOption.attr("value", item.geonameId).append(item.countryName);
        $('.country').append(selectOption);
    });
    */

    /* For Arabic Language */
    (function () {
        var showChar = 150;
        var ellipsestext = "....";

        $('.truncate_ar').each(function () {
            var content = $(this).html();
            if (content.length > showChar) {
                var c = content.substr(0, showChar);
                var h = content;
                var html =
                    '<div class="truncate-text-ar" style="display:block">' +
                    c +
                    '<span class="moreellipses-ar">' +
                    ellipsestext +
                    '&nbsp;&nbsp;<a href="" class="moreless-ar more-ar">عرض المزيد</a></span></span></div><div class="truncate-text-ar" style="display:none">' +
                    h +
                    '<a href="" class="moreless-ar less-ar">&nbsp;عرض أقل</a></span></div>';

                $(this).html(html);
            }
        });

        $('.moreless-ar').click(function () {
            var thisEl = $(this);
            var cT = thisEl.closest('.truncate-text-ar');
            var tX = '.truncate-text-ar';

            if (thisEl.hasClass('less-ar')) {
                cT.prev(tX).toggle();
                cT.slideToggle();
            } else {
                cT.toggle();
                cT.next(tX).fadeToggle();
            }
            return false;
        });
        /* end iffe */
    })();


    /* For English Language */
    (function () {
        var showChar = 90;
        var ellipsestext = "....";

        $('.truncate_en').each(function () {
            var content = $(this).html();
            if (content.length > showChar) {
                var c = content.substr(0, showChar);
                var h = content;
                var html =
                    '<div class="truncate-text-en" style="display:block">' +
                    c +
                    '<span class="moreellipses-en">' +
                    ellipsestext +
                    '&nbsp;&nbsp;<a href="" class="moreless-en more-en">Read More</a></span></span></div><div class="truncate-text-en" style="display:none">' +
                    h +
                    '<a href="" class="moreless-en less-en">&nbsp; Read Less</a></span></div>';

                $(this).html(html);
            }
        });

        $('.moreless-en').click(function () {
            var thisEl = $(this);
            var cT = thisEl.closest('.truncate-text-en');
            var tX = '.truncate-text-en';

            if (thisEl.hasClass('less-en')) {
                cT.prev(tX).toggle();
                cT.slideToggle();
            } else {
                cT.toggle();
                cT.next(tX).fadeToggle();
            }
            return false;
        });
        /* end iffe */
    })();


    function ajax(type, url, form, processData) {
        var result;
        $.ajax({
            type: type,
            url: url,
            dataType: 'json',
            data: form,
            async: false,   //stop until the ajax request done
            processData: processData,
            contentType: false,

            success: function (data) {
                result = data;
            },
            error: function (data) {
                result = data;
            }
        });
        return result;
    }

    $(document).on('submit', '#editForm', function () {
        event.preventDefault();
        var url = $(this).attr('action');
        var formData = new FormData($(this)[0]);
        //console.log(FormData);
        var res = ajax('POST', url, formData, false);
        console.log(res);
        if (res.success == 'success') {
            swal(res.message, {
                icon: 'success',
                buttons: false,
                timer: 2800,
            });
            console.log(res.message);
            $('#section-table').load(location.href + ' #content-table');
        }
    });

    $(document).on('click', '.delete', function () {
        event.preventDefault();
        var url = $(this).attr('href');
        var res = ajax('GET', url, [], true);
        if (res.success == 'success') {
            swal(res.message, {
                icon: 'success',
                buttons: false,
                timer: 2800,
            });
            console.log(res.message);
            $('#section-table').load(location.href + ' #content-table');
        }
    });

});

!(function ($) {

    $(document).on('click', '.mobile-nav-toggle', function (e) {
        $('body').toggleClass('mobile-nav-active');
        $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
    });

    $(document).click(function (e) {
        var container = $(".mobile-nav-toggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if ($('body').hasClass('mobile-nav-active')) {
                $('body').removeClass('mobile-nav-active');
                $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            }
        }
    });

    var nav_sections = $('section');
    var main_nav = $('.nav-menu, .mobile-nav');

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop() + 200;

        nav_sections.each(function () {
            var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                if (cur_pos <= bottom) {
                    main_nav.find('li').removeClass('active');
                }
                main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
            }
            if (cur_pos < 300) {
                $(".nav-menu ul:first li:first").addClass('active');
            }
        });
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return true;
    });

    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000
    });

    function aos_init() {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out-back",
            once: true
        });
    }

    $(window).on('load', function () {
        aos_init();
    });

    $(document).ready(function () {
        "use strict";

        function initMilestones() {
            if ($('.milestone_counter').length) {
                var milestoneItems = $('.milestone_counter');

                milestoneItems.each(function (i) {
                    var ele = $(this);
                    var endValue = ele.data('end-value');
                    var eleValue = ele.text();

                    /* Use data-sign-before and data-sign-after to add signs
                    infront or behind the counter number */
                    var signBefore = "";
                    var signAfter = "";

                    if (ele.attr('data-sign-before')) {
                        signBefore = ele.attr('data-sign-before');
                    }

                    if (ele.attr('data-sign-after')) {
                        signAfter = ele.attr('data-sign-after');
                    }

                    var milestoneScene = new ScrollMagic.Scene({
                        triggerElement: this,
                        triggerHook: 'onEnter',
                        reverse: false
                    })
                        .on('start', function () {
                            var counter = {value: eleValue};
                            var counterTween = TweenMax.to(counter, 4,
                                {
                                    value: endValue,
                                    roundProps: "value",
                                    ease: Circ.easeOut,
                                    onUpdate: function () {
                                        document.getElementsByClassName('milestone_counter')[i].innerHTML = signBefore + counter.value + signAfter;
                                    }
                                });
                        })
                        .addTo(ctrl);
                });
            }
        }
    });

})(jQuery);
