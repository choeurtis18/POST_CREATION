$(document).ready(function(){

    $('.card__info').each(function (f) {

        var newstr = $(this).text().substring(0,200);
        $(this).text(newstr);

    });
})