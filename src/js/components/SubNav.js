/** Componsante Nav de TimTools */
export default class SubNav {
  /**
   * Méthode constructeur
   * @param {HTMLElement} element - Élément HTML sur lequel la composante est instanciée
   */
  constructor(element) {
    this.element = element;
    this.header = document.querySelector('.header');
    this.menu = this.element.querySelectorAll(':scope > ul > .menu-item > a');

    this.init();
  }

  init() {
    for (let i = 0; i < this.menu.length; i++) {
      const menuitem = this.menu[i];
      menuitem.addEventListener('mouseenter', this.openSub.bind(this));
      menuitem.addEventListener('click', this.openSubMobile.bind(this));
    }
  }
  openSub(e) {
    if (document.querySelector('.nav-is-active')) return;

    const target = e.currentTarget;
    const subNav = target.parentNode.querySelector('.sub-menu');

    this.closeAll();

    if (subNav) {
      e.preventDefault();
      this.header.addEventListener('mouseleave', this.closeAll.bind(this));
      subNav.classList.add('active');
    }
  }

  openSubMobile(e) {
    if (!document.querySelector('.nav-is-active')) return;
    const target = e.currentTarget;

    const subNav = target.parentNode.querySelector('.sub-menu');
    if (subNav) {
      e.preventDefault();
      if (subNav.classList.contains('active')) {
        this.closeAll();
      } else {
        this.closeAll();
        subNav.classList.add('active');
      }
    }
  }
  closeAll(e) {
    const subNavs = document.querySelectorAll(`.sub-menu`);

    for (let i = 0; i < subNavs.length; i++) {
      const subNav = subNavs[i];
      subNav.classList.remove('active');
    }
  }
}
