$(function(){
    $('.cookie-button').click(function() {
        createCookie('allow_cookies', true, 90);
        $('.cookie-bar').slideUp('fast');
    });
    function createCookie(name, value, days) {
        let expires = new Date(new Date().getTime() + 1000 * 60 * 60 * 24 * days);
        let cookie = name + "=" + value + ";samesite=strict;expires=" + expires.toGMTString() + ";";
        document.cookie = cookie;
    }
});
