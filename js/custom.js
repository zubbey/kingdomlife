(function($) {
    // 'use strict';

    // Main Navigation
    $( '.hamburger-menu' ).on( 'click', function() {
        $(this).toggleClass('open');
        $('.site-navigation').toggleClass('show');
    });

    // Hero Slider
    var mySwiper = new Swiper('.hero-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        direction: 'vertical',
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">0' + (index + 1) + '</span>';
            },
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });

    // Cause Slider
    var causesSlider = new Swiper('.causes-slider', {
        slidesPerView: 3,
        spaceBetween: 30,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints: {
            1200: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 0,
            }
        }
    } );

    // Accordion & Toggle
    $('.accordion-wrap.type-accordion').collapsible({
        accordion: true,
        contentOpen: 0,
        arrowRclass: 'arrow-r',
        arrowDclass: 'arrow-d'
    });

    $('.accordion-wrap .entry-title').on('click', function() {
        $('.accordion-wrap .entry-title').removeClass('active');
        $(this).addClass('active');
    });

    // Tabs
    $(function() {
        $('.tab-content:first-child').show();

        $('.tab-nav').bind('click', function(e) {
            $this = $(this);
            $tabs = $this.parent().parent().next();
            $target = $($this.data("target"));
            $this.siblings().removeClass('active');
            $target.siblings().css("display", "none");
            $this.addClass('active');
            $target.fadeIn("slow");
        });

        $('.tab-nav:first-child').trigger('click');
    });

    // Circular Progress Bar
    $('#loader_1').circleProgress({
        startAngle: -Math.PI / 4 * 2,
        value: 0.83,
        size: 156,
        thickness: 3,
        fill: {
            gradient: ["#ff5a00", "#ff3600"]
        }
    }).on('circle-animation-progress', function(event, progress) {
        $(this).find('strong').html(Math.round(83 * progress) + '<i>%</i>');
    });

    $('#loader_2').circleProgress({
        startAngle: -Math.PI / 4 * 2,
        value: 0.9999,
        size: 156,
        thickness: 3,
        fill: {
            gradient: ["#ff5a00", "#ff3600"]
        }
    }).on('circle-animation-progress', function(event, progress) {
        $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
    });

    $('#loader_3').circleProgress({
        startAngle: -Math.PI / 4 * 2,
        value: 0.75,
        size: 156,
        thickness: 3,
        fill: {
            gradient: ["#ff5a00", "#ff3600"]
        }
    }).on('circle-animation-progress', function(event, progress) {
        $(this).find('strong').html(Math.round(75 * progress) + '<i>%</i>');
    });

    $('#loader_4').circleProgress({
        startAngle: -Math.PI / 4 * 2,
        value: 0.65 ,
        size: 156,
        thickness: 3,
        fill: {
            gradient: ["#ff5a00", "#ff3600"]
        }
    }).on('circle-animation-progress', function(event, progress) {
        $(this).find('strong').html(Math.round(65 * progress) + '<i>%</i>');
    });

    // Counter
    $(".start-counter").each(function () {
        var counter = $(this);

        counter.countTo({
            formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });
    });

    // Bar Filler
    $('.featured-fund-raised-bar').barfiller({ barColor: '#ff5a00', duration: 1500 });

    $('.fund-raised-bar-1').barfiller({ barColor: '#ff5a00', duration: 1500 });
    $('.fund-raised-bar-2').barfiller({ barColor: '#ff5a00', duration: 1500 });
    $('.fund-raised-bar-3').barfiller({ barColor: '#ff5a00', duration: 1500 });
    $('.fund-raised-bar-4').barfiller({ barColor: '#ff5a00', duration: 1500 });
    $('.fund-raised-bar-5').barfiller({ barColor: '#ff5a00', duration: 1500 });
    $('.fund-raised-bar-6').barfiller({ barColor: '#ff5a00', duration: 1500 });

    // Load more
    let $container      = $('.portfolio-container');
    let $item           = $('.portfolio-item');

    $item.slice(0, 9).addClass('visible');

    $('.load-more-btn').on('click', function (e) {
        e.preventDefault();

        $('.portfolio-item:hidden').slice(0, 9).addClass('visible');
    });
})(jQuery);




$(document).ready(function () {
    $('.home-page-audio').mouseenter(function () {
        $(this).toggleClass('changed');
    });
});

if(window.matchMedia('(min-width:320px) and (max-width: 768px)').matches)
{
    $('.testimonial-item.col.col-6.col-4.m-auto').removeClass(['col-6', 'col-4']);
    $('ul.tabs-nav .tab-nav, .btn').css({'padding': '10px', 'border-radius': '15px'});
    $('div#event-img').addClass(['col-12','my-4']);
    $('div#event-details').addClass('col-12');
    // INDEX
    $('.home-page-icon-boxes').css('padding', '10px 0');
    $('.swiper-slide.hero-content-wrap img').css('height','150px');
    $('.hero-slider').css('height','150px');
    $('div#testimony-content-box').addClass('col-12');
    $('.flickity-viewport').css('height','600px !important');
    // MEDIA
    $('ul.tabs-nav').css('margin-top','2em');
    $('.tabs-container').css({'padding': '0px', 'margin-top': '2em'});
    $('.playlist-wrap li').css('margin','0 0 0 1em');
    $('.player-wrap.enabled').css('padding','0px');
    $('.player-wrap .button').css('margin','1em');
    $('.player-wrap .info').css('margin-left','1em');
    $('li#track span a').html('<i class="fas fa-arrow-down"></i>');
    // TESTIMONY
    $('.testimonial-item').addClass('col-12');
    $('.testimonial-cont').css('margin-top','30px');
    // UNITS
    $('div#units').css('margin','30px 0');
    // BULLETIN
    $('#bulletin').removeClass('media');
    console.log('your screen size is mobile');
    // the browser window is larger than 900px
}

// FOR LAPTOPS
if(window.matchMedia('(min-width:1030px) and (max-width: 1366px)').matches)
{
    $('.home-page-icon-boxes').css('padding', '10px 0');
    $('.swiper-slide.hero-content-wrap img').css('height','400px');
    $('.hero-slider').css('max-height','400px');
    $('.position-absolute.w-100').css('margin-top','33rem');
    $('.get-involved').addClass('d-none');
    // $('div#testimony-content-box').addClass('col-12');
    // $('.flickity-viewport').css('height','600px !important');
}
// FOR LOGIN | REGISTER
function queryParameters () {
    var result = {};
    var params = window.location.search.split(/\?|\&/);
    params.forEach( function(it) {
        if (it) {
            var param = it.split("=");
            result[param[0]] = param[1];
        }
    });
    return result;
}
if (queryParameters().login === "true"){
    $('#loginModal').modal('show');
}
if (queryParameters().register === "true"){
    $('#registerModal').modal('show');
}
if (queryParameters().forgotten === "true"){
    $('#forgottenModal').modal('show');
}
if (queryParameters().resetpassword === "true"){
    $('#resetpasswordModal').modal('show');
}
if (queryParameters().playaudio === "true"){
    $('#bigPlay')[0].click();
}

// for testimony and prayer
if (queryParameters().success === "posted"){
    Swal.fire({
        icon: 'success',
        title: 'Posted!',
        showConfirmButton: false,
        timer: 5000
    })
}
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
if (queryParameters().success === "prayersent" || queryParameters().passwordlink === "sent"){
    Swal.fire({
        icon: 'success',
        title: 'Sent Successfully!',
        showConfirmButton: false,
        timer: 1500
    });
    register();

    let urlfullname = getUrlVars()["fullname"];
    let urlemail = getUrlVars()["email"];
    let urlphone = getUrlVars()["phone"];

    urlfullname = urlfullname.replace(/\s/g,'');
}

function register() {

    $('#registerModal').modal('show');
    $("#register-heading").html("Continue Registration");
    $("#inputUsername").val(urlfullname);
    $("#inputEmail").val(urlemail);
    $("#inputPhone").val(urlphone);
}
if (queryParameters().resendmail === "true" || queryParameters().contact === "Send"){
    Swal.fire({
        icon: 'success',
        title: 'Email Sent Successfully! Please Check your mail.',
        showConfirmButton: false,
        timer: 2500
    });
}
function comingSoon(){
    Swal.fire({
        icon: 'warning',
        title: 'Coming Soon!',
        showConfirmButton: false,
        timer: 2000
    })
}
// makes sure the whole site is loaded
jQuery(window).load(function() {
// will first fade out the loading animation
    jQuery("#status").fadeOut();
// will fade out the whole DIV that covers the website.
    jQuery("#preloader").delay(1000).fadeOut("slow");
});
// LOADING WHEN BTN CLICKS

// GOOGLE MAP
function myMap() {
    var mapProp= {
        center:new google.maps.LatLng(4.832504, -6.990813),
        zoom:5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
// Controller Routing
const about_nav = document.querySelector("li.about");
const media_nav = document.querySelector("li.media");
const give_nav = document.querySelector("li.give");
const store_nav = document.querySelector("li.store");
const events_nav = document.querySelector("li.events");
const contact_nav = document.querySelector("li.contact");
const connect_nav = document.querySelector("li.connect");
const sign_in_nav = document.querySelector("li.sign-in");
const account_nav = document.querySelector("li.profile");
const loading = document.querySelector("#preloader");


let body = document.querySelector("body");
// let active = document.querySelector("nav.site-navigation ul li");
let title_el = document.querySelector("title");

let admin = document.URL.indexOf("/admin") >= 0;
let home = document.URL.indexOf("index") >= 0;
let about = document.URL.indexOf("/about") >= 0;
let contact = document.URL.indexOf("/contact") >= 0;
let media = document.URL.indexOf("/media") >= 0;
let give = document.URL.indexOf("/give") >= 0;
let e_store = document.URL.indexOf("/store") >= 0;
let events = document.URL.indexOf("/events") >= 0;
let prayer_request = document.URL.indexOf("/prayer-request") >= 0;
let testimony = document.URL.indexOf("/testimonies") >= 0;
let bulletin = document.URL.indexOf("/bulletins") >= 0;
let units = document.URL.indexOf("/units") >= 0;
let bishop = document.URL.indexOf("/bishop") >= 0;
let pastoral = document.URL.indexOf("/pastoral") >= 0;
let outreaches = document.URL.indexOf("/outreaches") >= 0;
let profile = document.URL.indexOf("/profile") >= 0;
let live = document.URL.indexOf("/live") >= 0;

if(home){
    title_el.innerHTML = "Home | kingdomlifegospel.org";
}
if(about){
    title_el.innerHTML = "About | kingdomlifegospel.org";
    body.classList.add("about-page");
    about_nav.classList.add("current-menu-item");
}
if(contact){
    title_el.innerHTML = "Contact | kingdomlifegospel.org";
    body.classList.add("about-page");
    contact_nav.classList.add("current-menu-item");
    loading.classList.remove("d-none");
}
if(media){
    title_el.innerHTML = "Media | kingdomlifegospel.org";
    body.classList.add("media-page");
    media_nav.classList.add("current-menu-item");
}
if(give){
    title_el.innerHTML = "Give | kingdomlifegospel.org";
    body.classList.add("about-page");
    give_nav.classList.add("current-menu-item");
    loading.classList.remove("d-none");
}
if(e_store){
    title_el.innerHTML = "E Store | kingdomlifegospel.org";
    body.classList.add("store-page");
    loading.classList.remove("d-none");
}
if(events){
    title_el.innerHTML = "Events | kingdomlifegospel.org";
    events_nav.classList.add("current-menu-item");
    body.classList.add("media-page");
}
if(prayer_request){
    title_el.innerHTML = "Prayer Request | kingdomlifegospel.org";
    connect_nav.classList.add("current-menu-item");
    body.classList.add("testimony-page");
    loading.classList.remove("d-none");
}
if(testimony){
    title_el.innerHTML = "Testimony | kingdomlifegospel.org";
    connect_nav.classList.add("current-menu-item");
    body.classList.add("testimony-page");
    loading.classList.remove("d-none");
}
if(bulletin){
    title_el.innerHTML = "Bulletins | kingdomlifegospel.org";
    connect_nav.classList.add("current-menu-item");
    body.classList.add("testimony-page");
    loading.classList.remove("d-none");
}
if(units){
    title_el.innerHTML = "Units | kingdomlifegospel.org";
    connect_nav.classList.add("current-menu-item");
    body.classList.add("about-page");
}
if(bishop){
    title_el.innerHTML = "Victor Uzosike | kingdomlifegospel.org";
    about_nav.classList.add("current-menu-item");
}
if(pastoral){
    title_el.innerHTML = "Pastoral | kingdomlifegospel.org";
    about_nav.classList.add("current-menu-item");
    body.classList.add("pastoral-page");
}
if(outreaches){
    title_el.innerHTML = "Outreaches | kingdomlifegospel.org";
    about_nav.classList.add("current-menu-item");
    body.classList.add("outreaches-page");
}
if(profile){
    account_nav.classList.add("current-menu-item");
    loading.classList.remove("d-none");
}
if(live){
    title_el.innerHTML = "Live | kingdomlifegospel.org";
    body.classList.add("live-page");
    $('.stream-live span a').addClass('p-0');
    $('.stream-live span a').html('<span><img src="https://media.giphy.com/media/1k4sqw2jZHaOkFvHs0/giphy.gif" height="40"/></span>');
}