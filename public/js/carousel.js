$(function () {
    $('#blogCarousel').carousel({
        interval: 2000
    });
    $('#playButton').click(function () {
        $('#blogCarousel').carousel('cycle');
    });
    $('#pauseButton').click(function () {
        $('#blogCarousel').carousel('pause');
    });
});