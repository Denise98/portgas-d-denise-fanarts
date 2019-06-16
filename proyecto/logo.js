var logo =anime({
  targets: '.logo',
  translateX: -50,
  direction: 'alternate',
  loop: false,
  easing: 'linear',
  autoplay:false
});
document.querySelector('.logo').onclick=logo.restart;