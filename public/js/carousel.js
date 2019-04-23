
$('#blogCarousel').carousel({
    interval: 2000
});
$('#playButton').click(function () {
    $('#myCarousel').carousel('cycle');
});
$('#pauseButton').click(function () {
    $('#myCarousel').carousel('pause');
});