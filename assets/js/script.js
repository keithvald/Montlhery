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
