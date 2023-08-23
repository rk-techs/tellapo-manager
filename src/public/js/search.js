'use strict';

/*
---------------------------------------
| Toggle collapse search area
---------------------------------------
*/
const toggleExpandSymbol   = document.getElementById('toggleExpandSymbol');
const collapseSearchBody   = document.getElementById('collapseSearchBody');
const collapseSearchFooter = document.getElementById('collapseSearchFooter');

toggleExpandSymbol.addEventListener('click', () => {
  collapseSearchBody.classList.toggle('collapse');
  collapseSearchFooter.classList.toggle('collapse');

  if (toggleExpandSymbol.textContent == 'unfold_less') {
    toggleExpandSymbol.textContent = 'unfold_more';
  } else {
    toggleExpandSymbol.textContent = 'unfold_less';
  }
});

/*
---------------------------------------
| Submit search form when sort select box is changed
---------------------------------------
*/
const searchForm      = document.getElementById('searchForm');
const sortFieldSelect = document.getElementById('sortFieldSelect');
const sortTypeSelect  = document.getElementById('sortTypeSelect');

function handleSubmit() {
  searchForm.submit();
}

sortFieldSelect.addEventListener('change', handleSubmit);
sortTypeSelect.addEventListener('change', handleSubmit);
