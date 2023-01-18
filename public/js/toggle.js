/* eslint-disable*/

function toggleMenu() {
  const menuToggle = document.querySelector('.menuToggle');
  const navigation = document.querySelector('.navigation');
  menuToggle.classList.toggle('active');
  navigation.classList.toggle('active');
}

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
