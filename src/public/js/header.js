'use strict';

/*
---------------------------------------
| collapse header navigation
---------------------------------------
*/
const headerMobileMenuTrigger = document.getElementById('headerMobileMenuTrigger');
const headerMobileMenuSymbol  = document.getElementById('headerMobileMenuSymbol');
const headerCollapseNav       = document.getElementById('headerCollapseNav');

headerMobileMenuTrigger.addEventListener('click', function () {
  headerCollapseNav.classList.toggle('visible');

  if (headerMobileMenuSymbol.textContent == 'menu') {
    headerMobileMenuSymbol.textContent = 'close';
  } else {
    headerMobileMenuSymbol.textContent = 'menu';
  }
});

/*
---------------------------------------
| user info modal
---------------------------------------
*/
const htmlBody  = document.body;
const headerMask  = document.getElementById('headerMask');

const userInfoModalTrigger = document.getElementById('userInfoModalTrigger');
const userInfoModal        = document.getElementById('userInfoModal');

userInfoModalTrigger.addEventListener('click', () => {
  userInfoModal.classList.add('show');
  headerMask.classList.add('show');
  htmlBody.classList.add('modal-open');
});

headerMask.addEventListener('click', () => {
  userInfoModal.classList.remove('show');
  headerMask.classList.remove('show');
  htmlBody.classList.remove('modal-open');
});

/*
---------------------------------------
| Logout
---------------------------------------
*/
const logoutFormTrigger = document.getElementById('logoutFormTrigger');
const logoutForm        = document.getElementById('logoutForm');

logoutFormTrigger.addEventListener('click', () => {
  logoutForm.submit();
});
