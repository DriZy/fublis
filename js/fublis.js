jQuery(function ($) {
    $(document).ready(function () {
        //adding modal toggle attributes to menu item
        $('.login-menu').find('a').attr('data-toggle', 'modal');
        $('.login-menu').find('a').attr('data-target', '#loginModal');

        //triggering modal from menu item
        $('.login-menu').on('click', function (e) {
            e.preventDefault();
            $('#loginModal').modal('toggle');
            $('#loginModal').modal('show');
        });
    });
});
