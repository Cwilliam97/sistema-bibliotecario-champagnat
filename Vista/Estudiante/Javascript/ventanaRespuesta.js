$(document).ready(function () {

    $('.overlay-container').fadeIn(function () {

        window.setTimeout(function () {
            $('.window-container').addClass('window-container-visible');
        }, 100);

    });

    $('.close').click(function () {
        $('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
    });

});