$('.scrollUp').click(function () {
    $('html, body').animate(
        {scrollTop: 0}, 'slow');

});

var duration = 500;
var duration2 = 200;
$(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        // Si un défillement de 100 pixels ou plus.
        // Ajoute le bouton
        $('.scrollUp').fadeIn(duration);
    } else {
        // Sinon enlève le bouton
        $('.scrollUp').fadeOut(duration);
    }
    if ($(this).scrollTop() > 30) {
        $('.visible').fadeIn(duration2);
    } else {
        $('.visible').fadeOut(duration);
    }
});