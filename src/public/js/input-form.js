'use strict';

const inputForm        = document.getElementById('inputForm');
const inputFormTrigger = document.getElementById('inputFormTrigger');

inputFormTrigger.addEventListener('click', () => {
  inputForm.submit();
});

