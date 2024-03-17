import './styles/main.scss';

import ComponentFactory from './js/ComponentFactory';
import Icons from './js/utils/Icons';

// import
export class Main {
  constructor() {
    this.init();
  }
  init() {
    document.documentElement.classList.add('has-js');

    Icons.load();

    this.componentFactory = new ComponentFactory();
  }
}
const main = new Main();
