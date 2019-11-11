$(document).on('click', '.rating input', function () {
    let form = $(this).closest('form');
    let action = form.attr('action');
    let csrf = $("meta[name='csrf-token']").attr('content');
    let val = $(this).val();
    Swal.fire({
        title: 'Czy na pewno chcesz ocenić tą grę?',
        text: "Nie będziesz mógł dodać kolejnej oceny!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Oceń!',
        cancelButtonText: 'Anuluj',
        reverseButtons: true,
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return fetch(action, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                    'Content-Type': 'application/json'
                },
                redirect: 'follow', // manual, *follow, error
                referrer: 'no-referrer', // no-referrer, *client
                body: JSON.stringify({'value': val, '_token': csrf}) // body data type must match "Content-Type" header
            }).then(response => {
                if (!response.ok) {
                    throw new Error(response.statusText)
                }
                return response.json()
            }).then(response => {
                if (response.success == false) {
                    throw new Error(response.message);
                }
                return response;
            })
                .catch(error => {
                    Swal.showValidationMessage(
                        `${error}`
                    )
                })
            // return fetch(action)
            //     .then(response => {
            //         if (!response.ok) {
            //             throw new Error(response.statusText)
            //         }
            //         return response.json()
            //     })
            //     .catch(error => {
            //         Swal.showValidationMessage(
            //             `${error}`
            //         )
            //     })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Dziękujemy za ocenę!',
                '',
                'success'
            )
        }
    });
});

$(document).ready(function () {
    $(".navigation a").click(function () {
        if (!$(this).hasClass("dropy")) {
            // hide any open menus and remove all other classes
            $(".sidebar").slideUp('350');
            $(".navigation a").removeClass("dropy");

            // open our new menu and add the dropy class
            $(".sidebar").slideDown('350');
            $(this).addClass("dropy");
        } else if ($(this).hasClass("dropy")) {
            $(this).removeClass("dropy");
            $(".sidebar").slideUp('350');
        }
    });
});

$(document).on('change', '.input-check2', function (e) {
    if ($(this).is(':checked')) {
        $('.sidebar').addClass('show');
    } else {
        $('.sidebar').removeClass('show');
    }
});

$('.service-item').waypoint(function (down) {
    $(this).addClass('animation');
    $(this).addClass('fadeInUp');
}, {offset: '90%'});

$('.feature-item').waypoint(function (down) {
    $(this).addClass('animation');
    $(this).addClass('fadeInUp');
}, {offset: '90%'});

$('.testimonial-content').waypoint(function (down) {
    $(this).addClass('animation');
    $(this).addClass('fadeInUp');
}, {offset: '90%'});

/* Scroll to Top */
$(".totop").hide();

$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.totop').slideDown();
        } else {
            $('.totop').slideUp();
        }
    });
    $('.totop a').click(function (e) {
        e.preventDefault();
        $('body,html').animate({scrollTop: 0}, 500);
    });

});

