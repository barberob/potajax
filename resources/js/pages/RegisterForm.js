export default class RegisterForm {

    constructor() {
        if(document.querySelector('.container.register')) {
            this.initEls()
            this.initEvents()
        }
    }

    initEls() {
        this.els = {
            managerButton : document.querySelector('.js-manager-button'),
            managerInputs : document.querySelector('.js-manager-inputs')
        }
    }

    initEvents() {
        this.els.managerButton.addEventListener('click', (event) => {
            this.els.managerInputs.classList.toggle('hidden')
        })
    }
}
