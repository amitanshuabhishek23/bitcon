
/*Dashborad latest update*/
function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}

$(document).ready(function () {
    $('#orderHistory').DataTable();
});

// custom accordion
function accordion() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;
        // Variables privadas
        var links = this.el.find('.js-accordion-link');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }
    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el,
            $this = $(this),
            $next = $this.next();
        $next.slideToggle();
        $this.parent().toggleClass('is-open');
        if (!e.data.multiple) {
            $el.find('.js-accordion-submenu').not($next).slideUp().parent().removeClass('is-open');
            $el.find('.js-accordion-submenu').not($next).slideUp();
        };
    }
    var accordion = new Accordion($('#accordion'), false);
}
accordion();


