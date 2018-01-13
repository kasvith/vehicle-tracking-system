$(document).ready(function () {
    $('.has-error').click(function () {
        $(this).removeClass('has-error');
        $(this).children('.help-block').remove();
    });

    $('.select2').select2();

    $('.overlay').children('.callout').each(function (i, elem) {
        $(this).click(function () {
            $(this).fadeOut(300, function () {
                $(this).remove();
            });
        });

        $(this).delay(2000).fadeOut((i+1)*2000, function () {
            $(this).remove()
        })
    })
});