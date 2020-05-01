(function($) {

/*Google Map Style*/
var CustomMapStyles  = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

var windowWidth = $(window).width();
$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};

//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}



/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}




if( $('#mapID').length ){
var latitude = $('#mapID').data('latitude');
var longitude = $('#mapID').data('longitude');

var myCenter= new google.maps.LatLng(latitude,  longitude);
function initialize(){
    var mapProp = {
      center:myCenter,
      mapTypeControl:true,
      scrollwheel: false,
      zoomControl: true,
      disableDefaultUI: true,
      zoom:7,
      streetViewControl: false,
      rotateControl: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      styles: CustomMapStyles
      };

    var map= new google.maps.Map(document.getElementById('mapID'),mapProp);
    var marker= new google.maps.Marker({
      position:myCenter,
        //icon:'map-marker.png'
      });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

}
/*---------------------------*/
if( $('#datepicker').length ){
  $('#datepicker').datepicker({
    dateFormat: 'dd-mm-yy'
})
}








var allPanels = $('.faq-accordion-des').hide();
$('.faq-accordion-tab-row').removeClass('remove-border');
  $('.faq-accordion-title').click(function() {
        allPanels.slideUp();
        $('.faq-accordion-title').removeClass('faq-accordion-active');
        $('.faq-accordion-tab-row').removeClass('remove-border');
        $(this).next().slideDown();
        $(this).addClass('faq-accordion-active');
        $(this).parent().next().addClass('remove-border');
        return false;
});


/*
----------------------
 Tabs Js
----------------------
*/

$('.ylw-tabs:first').show();
$('.tabs-menu li:first').addClass('active');

$('.ylw-lb-tabs-menu li').on('click',function(){
  index = $(this).index();
  $('.ylw-lb-tabs-menu li').removeClass('active');
  $(this).addClass('active');
  $('.ylw-tabs').hide();
  $('.ylw-tabs').eq(index).show();
});


$('.ylw-about-counter').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 8000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

/*
-----------------------
Start Sticky sidebar ->> 
-----------------------
*/
if (windowWidth > 767) {
  if( $('#sidebar').length ){
  $('#sidebar').stickySidebar({
      topSpacing: 100,
      bottomSpacing: 60
  });
}
}

/*
-----------------------
Start scrollNav ->> 
-----------------------
*/
if( $('#sidebar').length ){
  $('#scrollNav').onePageNav({
    changeHash: false,
    scrollSpeed: 500,
    scrollThreshold: 0.5,
    filter: '',
    easing: 'swing',
    scrollChange: function($currentListItem) {
      //console.log($currentListItem);
      var acnum = $('#scrollNav').find('li.current').find('a').text();
      var actext = $('#scrollNav').find('li.current').find('a').attr('title');
      $('#hdr-scroll-nav').removeClass();
      $('#hdr-scroll-nav').addClass('acsec-'+acnum);
      $('#astitle').text(actext);
    }
  });
}

if( $('#sidebar').length ){
  $('#scrollToAarea').onePageNav({
    changeHash: false,
    scrollSpeed: 500,
    scrollThreshold: 0.5,
    filter: '',
    easing: 'swing',
  });
}



if( $('.hmNewAarrivalsSlider').length ){
    $('.hmNewAarrivalsSlider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: $('.hm-new-arrivals-sec .fl-prev'),
      nextArrow: $('.hm-new-arrivals-sec .fl-next'),
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}


if( $('.giftIdeasSecFeaImgSlider').length ){
    $('.giftIdeasSecFeaImgSlider').slick({
      dots: true,
      infinite: false,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
}
if( $('.mainBnrSlider').length ){
    $('.mainBnrSlider').slick({
      dots: true,
      infinite: false,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
}



/**
Sidebar menu
*/
if (windowWidth <= 991) {
  $('.hdr-humbergur-btn').on('click', function(e){
    $('.xs-nav-cntlr').addClass('opacity-1');
    $('.bdoverlay').addClass('active');
    $('body').addClass('active-scroll-off');
    $(this).addClass('menu-expend');
  });
  $('.menu-closebtn').on('click', function(e){
    $('.bdoverlay').removeClass('active');
    $('.xs-nav-cntlr').removeClass('opacity-1');
    $('body').removeClass('active-scroll-off');
    $('.hdr-humbergur-btn').removeClass('menu-expend');
  });
  
  $('li.menu-item-has-children > a').on('click', function(e){
    e.preventDefault();
    //$('li.menu-item-has-children .sub-menu').slideUp(300);
    //$(this).parent().find('.sub-menu').slideToggle(300);
    $(this).toggleClass('sub-menu-active');
    $(this).next().slideToggle(300);

  });
}



$('.hdr-search-btn').on('click', function(){
  $('#header-popups').addClass('opacity-1');
  $('body').css('overflow','hidden');
});

$('.popup-cross').on('click', function(){
  $('#header-popups').removeClass('opacity-1');
  $('body').css('overflow','initial');
});


$('#status1').fadeOut(); // will first fade out the loading animation 
$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
$('body').delay(350).css({'overflow':'visible'});

$('.hdr-account span').on('click', function(){
  $('.hdr-account ul').slideToggle(300);
});
  var querySort = '';var archive = '';
if($("#sorting").length){
  var querySort = $("#sorting").data('sort');
}
if($("#archive").length){
  var archive = $("#archive").data('archive');
}
function querySorting(){
  if(querySort !='')
    return querySort;
  else
    return false;
}

function postArchive(){
  if(archive != '' && typeof archive != "undefined")
    return archive;
  else
    return false;
}
$("#loadMore").on('click', function(e) {
    e.preventDefault();
    var archive = '';
    var sortQuery = '';
    if(postArchive() != '') archive = postArchive();

    if(querySorting() != '' ) sortQuery = querySorting();
    //init
    var that = $(this);
    var page = $(this).data('page');
    var newPage = page + 1;
    var ajaxurl = that.data('url');
    //ajax call
    $.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
            page: page,
            archive: archive,
            sorting: sortQuery,
            el_li: 'not',
            action: 'ajax_post_script_load_more'
        },
        beforeSend: function ( xhr ) {
            $('#ajxaloader').show();
             
        },
        
        success: function(html ) {
            //check
            if (html  == 0) {
                $('.ylw-blog-grid-load').prepend('<div class="clearfix"></div><div class="text-center"><p>Geen producten meer om te laden.</p></div>');
                $('.ylw-blog-grid-load').hide();
                $('#ajxaloader').hide();
            } else {
                $('#ajxaloader').hide();
                that.data('page', newPage);
                $('#ajax-content').append(html .substr(html .length-1, 1) === '0'? html.substr(0, html.length-1) : html);

            }
        },
        error: function(html ) {
            console.log('asdfsd');
        },
    });
});

jQuery('#sortForm').change(function() {
    this.form.submit();
});
jQuery('.arvhieForm').change(function() {
    this.form.submit();
});
})(jQuery);