'use strict';

/*
---------------------------------------
| Delete form
---------------------------------------
*/
const deleteForm        = document.getElementById('deleteForm');
const deleteFormTrigger = document.getElementById('deleteFormTrigger');

deleteFormTrigger.addEventListener('click', e => {
  e.preventDefault();
  let confirmDialog = confirm("本当に削除しますか？");

  if (confirmDialog) {
    deleteForm.submit();
  }
});
