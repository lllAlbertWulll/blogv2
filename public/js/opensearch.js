$(document).ready(function () {
    $('.opensearch').on('click', function (e) {
        if ($(".search-form").hasClass("is-active")) {
            $(".search-form").removeClass("is-active");
        } else {
            $(".search-form").addClass("is-active");
        }
    });
});