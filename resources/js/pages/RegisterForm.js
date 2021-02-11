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
            managerInputsContainer : document.querySelector('.js-manager-inputs')
        }
    }

    initEvents() {
        this.els.managerButton.addEventListener('click', () => {
            this.els.managerInputsContainer.classList.toggle('hidden')
            if (this.els.managerButton.checked) {
                this.els.managerInputsContainer.querySelectorAll('input').forEach(input => {
                    input.removeAttribute('disabled')
                })
            } else {
                this.els.managerInputsContainer.querySelectorAll('input').forEach(input => {
                    input.setAttribute('disabled', '')
                })
            }
        })
    }
}
