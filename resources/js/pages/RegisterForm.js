
export default class RegisterForm {

    constructor() {
        this.config = {
            api_endpoint : 'https://api-adresse.data.gouv.fr/search/?q='
        }
        if(document.querySelector('body.register')) {
            this.initEls()
            this.initEvents()
        }
    }

    initEls() {
        this.els = {
            managerButton : document.querySelector('.js-manager-button'),
            managerInputsContainer : document.querySelector('.js-manager-inputs'),
            inputAutoComplete : document.querySelector('.js-adress'),
            autoCompleteContainer : document.querySelector('.js-autocomplete'),
            autoCompleteItems : null
        }
    }

    initEvents() {
        this.initManagerForm()
        this.initAutoComplete()
    }

    initManagerForm() {
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

    initAutoComplete() {
        console.log('attach event');
        this.els.inputAutoComplete.addEventListener('input', () =>  {
            this._autoComplete().catch(e => console.log(e))
        })
        this.els.inputAutoComplete.addEventListener('blur', (e) =>  {
            e.preventDefault()
            this.els.autoCompleteContainer.classList.add('js-hidden')
        })
    }

    async _autoComplete() {
        this.els.autoCompleteContainer.classList.remove('js-hidden')
        const value = this.els.inputAutoComplete.value
        const query = value.split(' ').join('+')

        const source = await fetch(this.config.api_endpoint + query)
        const res = await source.json()
        if (res.features.length === 0) return
        const formatted_res = res.features.map(adress => adress.properties.label)

        this._createList(formatted_res)
    }

    _createList(data) {
        console.log(data);
        if(data.length === 0) this._handleView()
        this.els.autoCompleteContainer.innerHTML = ''
        data.forEach(result => {
            this._createListItem(result)
        })
        this.els.autoCompleteItems = this.els.autoCompleteContainer.querySelectorAll('li')
        this._handleView(true)
    }

    _createListItem(result) {
        const li = document.createElement('li')
        li.addEventListener('click', e => {
            this.els.autoCompleteContainer.classList.add('js-hidden')
            if(this.els.autoCompleteItems) {
                this.els.inputAutoComplete.value = e.currentTarget.textContent
            }
        })
        li.textContent = result
        this.els.autoCompleteContainer.appendChild(li)
    }

    _handleView(haveResult = false) {
        if (!haveResult) this.els.autoCompleteContainer.classList.add('js-hidden')
        else this.els.autoCompleteContainer.classList.remove('js-hidden')
    }
}
