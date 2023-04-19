
jQuery(document).ready(function() {
    $('.dismiss, .overlay').on('click', function() {
        $('.sidebar, .overlay').toggleClass('active');
    });

    $('.open-menu').on('click', function(e) {
        e.preventDefault();
        $('.sidebar, .overlay').toggleClass('active');
    });
});
