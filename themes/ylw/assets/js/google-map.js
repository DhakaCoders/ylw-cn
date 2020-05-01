(function($) {

  /*
-----------------------
Start Contact Google Map ->> 
-----------------------
*/

/*Google Map Style*/
var CustomMapStyles  = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

if( $('#maplocation').length ){
  var markerSrc = $('#maplocation').data('homeurl');
}
if( $('#googlemap1').length ){
    var latitude = $('#googlemap1').data('latitude');
    var longitude = $('#googlemap1').data('longitude');

    var myCenter= new google.maps.LatLng(latitude,  longitude);
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    function initialize(){
        var mapProp = {
          center:myCenter,

          mapTypeControl:false,
          scrollwheel: false,

          zoomControl: false,
          disableDefaultUI: true,
          zoom:17,
          streetViewControl: false,
          rotateControl: false,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          styles : CustomMapStyles
      };
      var map= new google.maps.Map(document.getElementById('googlemap1'),mapProp);

      var marker= new google.maps.Marker({
        position:myCenter,
        icon: markerSrc+'/assets/images/map-marker.png'
        });
      marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}

if( $('#googlemap2').length ){
    var latitude = $('#googlemap2').data('latitude');
    var longitude = $('#googlemap2').data('longitude');

    var myCenter= new google.maps.LatLng(latitude,  longitude);
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    function initialize(){
        var mapProp = {
          center:myCenter,

          mapTypeControl:false,
          scrollwheel: false,

          zoomControl: false,
          disableDefaultUI: true,
          zoom:17,
          streetViewControl: false,
          rotateControl: false,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          styles : CustomMapStyles
      };
      var map= new google.maps.Map(document.getElementById('googlemap2'),mapProp);

      var marker= new google.maps.Marker({
        position:myCenter,
        icon: markerSrc+'/assets/images/map-marker.png'
        });
      marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}

if( $('#googlemap3').length ){
    var latitude = $('#googlemap3').data('latitude');
    var longitude = $('#googlemap3').data('longitude');

    var myCenter= new google.maps.LatLng(latitude,  longitude);
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    function initialize(){
        var mapProp = {
          center:myCenter,

          mapTypeControl:false,
          scrollwheel: false,

          zoomControl: false,
          disableDefaultUI: true,
          zoom:17,
          streetViewControl: false,
          rotateControl: false,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          styles : CustomMapStyles
      };
      var map= new google.maps.Map(document.getElementById('googlemap3'),mapProp);

      var marker= new google.maps.Marker({
        position:myCenter,
        icon: markerSrc+'/assets/images/map-marker.png'
        });
      marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}

if( $('#googlemap4').length ){
    var latitude = $('#googlemap4').data('latitude');
    var longitude = $('#googlemap4').data('longitude');

    var myCenter= new google.maps.LatLng(latitude,  longitude);
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    function initialize(){
        var mapProp = {
          center:myCenter,

          mapTypeControl:false,
          scrollwheel: false,

          zoomControl: false,
          disableDefaultUI: true,
          zoom:17,
          streetViewControl: false,
          rotateControl: false,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          styles : CustomMapStyles
      };
      var map= new google.maps.Map(document.getElementById('googlemap4'),mapProp);

      var marker= new google.maps.Marker({
        position:myCenter,
        icon: markerSrc+'/assets/images/map-marker.png'
        });
      marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}

})(jQuery);