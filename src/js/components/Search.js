export default class Search {
  constructor(el) {
    this._el = el;
    this._searchBar = document.querySelector('.search-bar');

    this._el.addEventListener('click', this._openSearch.bind(this));
  }

  _openSearch(e) {
    console.log('test');
    if (this._el.classList.contains('open')) {
      this._searchBar.classList.remove('open');
      this._el.classList.remove('open');
    } else {
      this._searchBar.classList.add('open');
      this._el.classList.add('open');
    }
  }
}
