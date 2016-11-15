///////// PARALAX DODGE///////////////////////////////////
window.requestAnimationFrame = window.requestAnimationFrame
 || window.mozRequestAnimationFrame
 || window.webkitRequestAnimationFrame
 || window.msRequestAnimationFrame
 || function(f){setTimeout(f, 1000/60)}

var dodge = document.getElementById('dodge')
var scrollheight = document.body.scrollHeight
var windowheight = window.innerHeight
function parallax(){
    var scrolltop = window.pageYOffset 
    var scrollamount = (scrolltop / (scrollheight-windowheight)) * 100
    var multiplicador = 2
    if (window.matchMedia("(max-width: 767px)").matches) {
        multiplicador = 10
    }
    var transformar = "translate3d(" + scrollamount * multiplicador + "%,0,0)";
    dodge.style.transform = transformar;
    dodge.style.webkitTransform = transformar;
    dodge.style.msTransform = transformar;
    dodge.style.animationFillMode = "none";
    dodge.style.opacity = "1";
}
window.addEventListener('scroll', function(){
 requestAnimationFrame(parallax)
}, false)

window.addEventListener('resize', function(){
 var scrolltop = window.pageYOffset
 var scrollamount = (scrolltop / (scrollheight-windowheight)) * 100
    var multiplicador = 2
    if (window.matchMedia("(max-width: 767px)").matches) {
        multiplicador = 10
    }
 var transformar = "translate3d(" + scrollamount * multiplicador + "%,0,0)";
 dodge.style.transform = transformar;
    dodge.style.webkitTransform = transformar;
    dodge.style.msTransform = transformar;
}, false)
//////////////////////////////////////////////////////////
/*
Visibility.onVisible(function(){
    setTimeout(function () {
        $(".dodge").addClass("bounce-carro animated");
    }, 400);
});

Visibility.onVisible(function(){
    setTimeout(function () {
        $(".icone_lanche").addClass("fadeInDown animated");
    }, 1900);
});

Visibility.onVisible(function(){
    setTimeout(function () {
        $(".icone-lanche-grande").addClass("fadeInDown animated");
    }, 1900);
});*/
///////////////////////////////////////////////////////////
var altura = 450
if (window.matchMedia("(max-width: 767px)").matches) {
        altura = 200
}
$(window).scroll(function() {
if ($(this).scrollTop() > altura){  
    $('header').addClass("small");
    $('.rango').removeClass("animated fadeInRightBig");
    $('.rango').addClass("animated fadeOutRightBig");
  }
if ($(this).scrollTop() == 0){
    $('header').removeClass("small");
    $('.rango').removeClass("animated fadeOutRightBig");
    $('.rango').addClass("animated fadeInRightBig");
  }
});

/////////////////////////////////////////////////////////////////////
////////////DELETE
/*
 Exemples :
 <a href="posts/2" data-method="delete" data-token="{{csrf_token()}}">
 - Or, request confirmation in the process -
 <a href="posts/2" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
 */


(function() {

    var laravel = {
        initialize: function() {
            this.methodLinks = $('a[data-method]');
            this.token = $('a[data-token]');
            this.registerEvents();
        },

        registerEvents: function() {
            this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function(e) {
            var link = $(this);
            var httpMethod = link.data('method').toUpperCase();
            var form;

            // If the data-method attribute is not PUT or DELETE,
            // then we don't know what to do. Just ignore.
            if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                return;
            }

            // Allow user to optionally provide data-confirm="Are you sure?"
            if ( link.data('confirm') ) {
                if ( ! laravel.verifyConfirm(link) ) {
                    return false;
                }
            }

            form = laravel.createForm(link);
            form.submit();

            e.preventDefault();
        },

        verifyConfirm: function(link) {
            return confirm(link.data('confirm'));
        },

        createForm: function(link) {
            var form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            var token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token')
                });

            var hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    laravel.initialize();

})();