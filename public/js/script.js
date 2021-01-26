$(document).ready(function () {
    "use strict";

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.search_nav').hide();
            var header = {height: '104px'};
            $(".header").css(header);
            var logo = {marginTop: '1rem'};
            $(".logo_container").css(logo);
        } else {
            $('.search_nav').fadeIn(1000);
            var header2 = {height: '10rem'};
            $(".header").css(header2);
            var logo2 = {marginTop: '2.5rem'};
            $(".logo_container").css(logo2);
        }
    });

    if ($(window).width() > 992 && $(window).width() < 1160) {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.language').hide();
            } else {
                $('.language').fadeIn(1000);
            }
        });
    }

    if ($(window).width() <= 768) {
        $('.site-main-section').find('.container-lg').removeClass();
        $('.site-main-section').find('.container').removeClass();
    }

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

    $('[data-background]').each(function () {
        $(this).css({
            'background-image': 'url(' + $(this).data('background') + ')'
        });
    });

    $('.panel-block').on('mouseover', function () {
        $(this).find('.data-counter').css('background-color', 'white');
    });

    $('.panel-block').on('mouseleave', function () {
        $(this).find('.data-counter').css('background-color', '#eff7e5');
    });

    $('.panel-block-active').on('mouseover', function () {
       $(this).find('.data-counter').css('background-color', 'white');
    });

    $('.panel-block-active').on('mouseleave', function () {
        $(this).find('.data-counter').css('background-color', 'white');
    });

    $('.site-content-item').hover(function () {
        $(this).find('.icon-favourite').css('color', 'white');
        $(this).find('.question-title').css('color', 'white');
        $(this).find('.question-date').css('color', 'white');
    }, function () {
        $('.icon-favourite').css('color', '#4a7c12');
        $('.question-title').css('color', 'rgb(48, 48, 48)');
        $('.question-date').css('color', 'rgb(181, 181, 181)');
    });

    $('body').tooltip({
        selector: '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])',
        trigger: 'hover',
        container: 'body'
    }).on('click mousedown mouseup mouseover mouseleave', '[data-toggle="tooltip"], [title]:not([data-toggle="popover"])', function () {
        $('[data-toggle="tooltip"], [title]:not([data-toggle="popover"])').tooltip('remove');
    });

    function ajax(type, url, form, processData, token) {
        var result;
        $.ajax({
            type: type,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            dataType: 'json',
            data: form,
            async: false, //to make js wait until ajax finish
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

    $(document).on('submit', '#registerForm', function () {
        event.preventDefault();
        var url = $(this).attr('action');
        var formData = new FormData($(this)[0]);
        //console.log(FormData);
        var res = ajax('POST', url, formData, false);
        console.log(res);
        if (res.status == 422) {
            var inputs = $("#registerForm .form-control");
            //console.log(inputs);

            $.each(inputs, function () {
                //console.log($(this));
                if ($(this).next().has('span')) {
                    $(this).next().remove();
                }

            });
            $.each(res.responseJSON.errors, function (index, item) {
                if ($('#registerForm input[name="' + index + '"]').next().has('span') && $('#registerForm select[name="' + index + '"]').next().has('span')) {
                    $('#registerForm input[name="' + index + '"]').next().remove();
                    $('#registerForm select[name="' + index + '"]').next().remove();
                }
                $("#registerForm input[name='" + index + "']").after("<span class='text-danger' role='alert'><strong>" + item + "</strong></span>");
                $("#registerForm select[name='" + index + "']").after("<span class='text-danger' role='alert'><strong>" + item + "</strong></span>");
            });
        } else if (res.success == 'success') {
            window.location = res.index;
        }
    });

    $(document).on('submit', '#loginForm', function () {
        event.preventDefault();
        var url = $(this).attr('action');
        var formData = new FormData($(this)[0]);
        //console.log(FormData);
        var res = ajax('POST', url, formData, false);
        console.log(res);
        if (res.status == 422) {
            var inputs = $("#loginForm .form-control");
            //console.log(inputs);

            $.each(inputs, function () {
                //console.log($(this));
                if ($(this).next().has('span')) {
                    $(this).next().remove();
                }

            });
            $.each(res.responseJSON.errors, function (index, item) {
                if ($('#loginForm input[name="' + index + '"]').next().has('span')) {
                    $('#loginForm input[name="' + index + '"]').next().remove();
                }
                $("#loginForm input[name='" + index + "']").after("<span class='text-danger' role='alert'><strong>" + item + "</strong></span>");
            });
        } else if (res.success == 'success') {
            window.location = res.index;
        }
    });

    $(document).on('submit', '#profileForm', function () {
        event.preventDefault();
        var url = $(this).attr('action');
        var formData = new FormData($(this)[0]);
        //console.log(FormData);
        var res = ajax('POST', url, formData, false);
        console.log(res);
        if (res.status == 422) {
            var inputs = $("#profileForm .form-control");
            //console.log(inputs);

            $.each(inputs, function () {
                //console.log($(this));
                if ($(this).next().has('span')) {
                    $(this).next().remove();
                }

            });
            $.each(res.responseJSON.errors, function (index, item) {
                if ($('#profileForm input[name="' + index + '"]').next().has('span') && $('#profileForm select[name="' + index + '"]').next().has('span')) {
                    $('#profileForm input[name="' + index + '"]').next().remove();
                    $('#profileForm select[name="' + index + '"]').next().remove();
                }
                $("#profileForm input[name='" + index + "']").after("<span class='text-danger' role='alert'><strong>" + item + "</strong></span>");
                $("#profileForm select[name='" + index + "']").after("<span class='text-danger' role='alert'><strong>" + item + "</strong></span>");
            });
        } else if (res.success == 'success') {
            swal(res.message, {
                icon: 'success',
                buttons: false,
                timer: 2800,
            });
            console.log(res.message);
            $('#section-profile').load(location.href + ' #content-profile');
            //window.location = res.index;
        }
    });

    $(document).on('submit', '#addForm', function () {
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

    $(document).on('click', '.addFav', function () {
        event.preventDefault();
        var url = $(this).attr('href');
        var res = ajax('POST', url, [], false);
        if (res.success == 'success') {
            swal(res.message, {
                icon: 'success',
                buttons: false,
                timer: 2800,
            });
            console.log(res.message);
            $('#section-table').load(location.href + ' #content-table');
        } else if (res.success == 'warning') {
            swal(res.message, {
                icon: 'warning',
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

    /* This is just for a test, but will use it in another way in other projects later*/
    // $('.add-fav-icon').on('click', function () {
    //     if ($(this).find('.far').hasClass('far')) {
    //         $(this).find('.far').removeClass('far').addClass('fas').addClass('icon-fav-active');
    //     } else {
    //         $(this).find('.fas').removeClass('fas').removeClass('icon-fav-active').addClass('far');
    //     }
    // });

    // $('[data-toggle="tooltip"]').tooltip({
    //     trigger : 'hover'
    // });
});

(function ($) {
    'use strict';

    // Preloader js
    $(window).on('load', function () {
        $('.preloader').fadeOut(700);
    });

    // Sticky Menu
    $(window).scroll(function () {
        var height = $('.top-header').innerHeight();
        if ($('header').offset().top > 10) {
            $('.top-header').addClass('hide');
            $('.navigation').addClass('nav-bg');
            $('.navigation').css('margin-top', '-' + height + 'px');
        } else {
            $('.top-header').removeClass('hide');
            $('.navigation').removeClass('nav-bg');
            $('.navigation').css('margin-top', '-' + 0 + 'px');
        }
    });

})(jQuery);
