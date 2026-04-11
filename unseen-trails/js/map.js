/* =========================================================
   Unseen Trails — map.js
   Google Maps JavaScript API integration
   Callback: initGoogleMap (fired by the API script tag)
   ========================================================= */

'use strict';

/* ── Destination pin data ── */
var MAP_PLACES = {
  'ilam': {
    lat: 26.9115, lng: 87.9272,
    name: 'Ilam',
    desc: 'Tea Gardens · Province No. 1',
    link: 'destination.php?place=ilam'
  },
  'janakpur': {
    lat: 26.7288, lng: 85.9250,
    name: 'Janakpur',
    desc: 'Sacred City · Madhesh Province',
    link: 'destination.php?place=janakpur'
  },
  'koshi-tappu': {
    lat: 26.6318, lng: 87.0036,
    name: 'Koshi Tappu',
    desc: 'Wildlife Reserve · Koshi River',
    link: 'destination.php?place=koshi-tappu'
  },
  'kanchenjunga': {
    lat: 27.7025, lng: 88.1475,
    name: 'Kanchenjunga',
    desc: 'Mountain Trek · Far East Nepal',
    link: 'destination.php?place=kanchenjunga'
  }
};

/* Called automatically by Google Maps API (async defer callback) */
function initGoogleMap() {
  var mapEl = document.getElementById('main-map');
  if (!mapEl) return; /* Not on a page that has the map */

  /* ── Map instance centred on Nepal ── */
  var nepal = { lat: 27.7, lng: 85.3 };

  var map = new google.maps.Map(mapEl, {
    center: nepal,
    zoom: 7,
    mapTypeId: 'terrain',
    mapTypeControl: false,
    streetViewControl: false,
    fullscreenControl: true,
    zoomControl: true,
    zoomControlOptions: {
      position: google.maps.ControlPosition.RIGHT_BOTTOM
    },
    styles: [
      { featureType: 'water',      elementType: 'geometry', stylers: [{ color: '#b3d1e8' }] },
      { featureType: 'landscape',  elementType: 'geometry', stylers: [{ color: '#e8f0e9' }] },
      { featureType: 'poi.park',   elementType: 'geometry', stylers: [{ color: '#c5dfc6' }] },
      { featureType: 'road',       elementType: 'geometry', stylers: [{ color: '#ffffff' }] },
      { featureType: 'administrative.country', elementType: 'geometry.stroke', stylers: [{ color: '#1a6b4a' }, { weight: 2 }] },
      { featureType: 'administrative',         elementType: 'labels.text.fill', stylers: [{ color: '#1a1f2e' }] }
    ]
  });

  /* ── Store globally so script.js sidebar buttons can pan ── */
  window._googleMap = map;
  window._googleMapMarkers = {};

  /* ── Custom SVG marker icon ── */
  var pinSvg = encodeURIComponent(
    '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="46" viewBox="0 0 36 46">' +
    '<ellipse cx="18" cy="43" rx="7" ry="3" fill="rgba(0,0,0,0.15)"/>' +
    '<path d="M18 0C8.059 0 0 8.059 0 18c0 13.5 18 28 18 28S36 31.5 36 18C36 8.059 27.941 0 18 0z" fill="#1a6b4a"/>' +
    '<circle cx="18" cy="18" r="8" fill="#ffffff"/>' +
    '<circle cx="18" cy="18" r="4" fill="#1a6b4a"/>' +
    '</svg>'
  );
  var markerIcon = {
    url: 'data:image/svg+xml,' + pinSvg,
    scaledSize: new google.maps.Size(36, 46),
    anchor:     new google.maps.Point(18, 46),
    origin:     new google.maps.Point(0, 0)
  };

  /* ── Add markers + info windows ── */
  Object.entries(MAP_PLACES).forEach(function(entry) {
    var slug = entry[0];
    var place = entry[1];

    var marker = new google.maps.Marker({
      position: { lat: place.lat, lng: place.lng },
      map:      map,
      title:    place.name,
      icon:     markerIcon,
      animation: google.maps.Animation.DROP
    });

    var infoContent =
      '<div style="font-family:Poppins,sans-serif;padding:4px 2px;min-width:150px">' +
        '<div style="font-size:0.92rem;font-weight:700;color:#1a1f2e;margin-bottom:3px">' + place.name + '</div>' +
        '<div style="font-size:0.75rem;color:#8892a4;margin-bottom:8px">' + place.desc + '</div>' +
        '<a href="' + place.link + '" style="' +
          'display:inline-block;background:#1a6b4a;color:#fff;' +
          'font-size:0.73rem;font-weight:600;padding:5px 14px;' +
          'border-radius:999px;text-decoration:none;">' +
          'Explore &rarr;' +
        '</a>' +
      '</div>';

    var infoWindow = new google.maps.InfoWindow({ content: infoContent, maxWidth: 220 });

    marker.googleInfoWindow = infoWindow;
    window._googleMapMarkers[slug] = marker;

    marker.addListener('click', function() {
      /* Close any open windows first */
      Object.values(window._googleMapMarkers).forEach(function(m) {
        m.googleInfoWindow && m.googleInfoWindow.close();
      });
      infoWindow.open(map, marker);

      /* Sync sidebar active state */
      document.querySelectorAll('.map-place-btn').forEach(function(btn) {
        btn.classList.toggle('active', btn.dataset.slug === slug);
      });
    });
  });

  /* ── Fit Nepal bounds ── */
  var bounds = new google.maps.LatLngBounds();
  Object.values(MAP_PLACES).forEach(function(p) {
    bounds.extend({ lat: p.lat, lng: p.lng });
  });
  map.fitBounds(bounds, { top: 60, right: 60, bottom: 60, left: 60 });
}
