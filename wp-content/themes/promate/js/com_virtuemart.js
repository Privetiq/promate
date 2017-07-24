jQuery(function($) {
    $('.hasTooltip').tooltip({
        html: true
    });
    $('.link-modal, .vm-single-info h1 a').magnificPopup({
        type: 'iframe',
        mainClass: 'my-mfp-zoom-in',
        removalDelay: 160,
        preloader: false,
        closeBtnInside: true
    });

    function goToByScroll(id) {
        id = id.replace("#", "");
        $('html,body').animate({
            scrollTop: $("#" + id).offset().top
        }, 'slow');
    }
    $("a.gotoreview").click(function(e) {
        e.preventDefault();
        $('.nav-review').click();
        goToByScroll($(this).attr("href"));
    });

});

//relayout masonry
jQuery(function($) {
    $(document).delegate('.vm-tools-layout > a', 'click', function() {
        var m = $('.vm-product-grid').data('masonry');
        if (!m) {
            return;
        }
        m.layout();
    });
});
