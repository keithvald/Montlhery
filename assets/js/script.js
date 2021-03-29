var mymap = L.map('map').setView([43.18711366554758, 3.0071415211895802], 13);

L.tileLayer(
  'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}',
  {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken:
      'pk.eyJ1IjoibW9udGxoZXJ5IiwiYSI6ImNrbXVqbWUzcDB3M2IycG13bDQ1NHlqaGYifQ.6W4rg1tci7YdKr_z58QS4w',
  }
).addTo(mymap);

// Pliage 31
var marker = L.marker([43.18711366554758, 3.0071415211895802]).addTo(mymap);
marker.bindPopup(
  'Auto-école Montlhery <br> 8 Rue Ancienne Porte de Béziers, 11100 Narbonne'
);

$(function () {
  $('#mdb-lightbox-ui0').load('mdb-addons/mdb-lightbox-ui.html');
  $('#mdb-lightbox-ui1').load('mdb-addons/mdb-lightbox-ui.html');
  $('#mdb-lightbox-ui2').load('mdb-addons/mdb-lightbox-ui.html');
  $('#mdb-lightbox-ui3').load('mdb-addons/mdb-lightbox-ui.html');
});

window.onscroll = function () {
  if (document.documentElement.scrollTop > 300) {
    document.getElementById('logo').style.width = '140px';
    document.getElementById('logo').style.transition = 'ease 1s';

    document.getElementById('nav').style.padding = '0 16px';
    document.getElementById('nav').style.transition = 'ease 1s';
  } else if (document.documentElement.scrollTop < 80) {
    document.getElementById('logo').style.width = '180px';
    document.getElementById('logo').style.transition = 'ease 1s';

    document.getElementById('nav').style.padding = '8px 16px';
    document.getElementById('nav').style.transition = 'ease 1s';
  }

  if (document.documentElement.scrollTop > 250) {
    document.getElementById('back-to-top').style.opacity = '1';
  } else {
    document.getElementById('back-to-top').style.opacity = '0';
  }
};

// Button Du scroll ver haut de page smooth
document.getElementById('back-to-top').addEventListener('click', function () {
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth',
  });
});

//Smooth vers les ancres
document.querySelectorAll('a[href^="#ancre"]').forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth',
    });
  });
});
