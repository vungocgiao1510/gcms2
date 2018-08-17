$(document).ready(function(){
    var heightContent = $("#content").height();
    if(heightContent < 350 ){
        $('.read-more').hide();
    }
    $('.read-more').click(function(){
        $('#content').css({
            'maxHeight': '100%',
            'overflow': 'unset'
        });
        $('#content p').removeClass('read-more');
        $('#content .button').hide();
    });
});

function add_to_cart(e) {
    window.location.replace('home/addcard/' + e);
}