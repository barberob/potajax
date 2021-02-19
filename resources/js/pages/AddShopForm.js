export default class RegisterForm {

    constructor() {
        if(document.querySelector('body.add_shop')) {
            this.initEls()
            this.initEvents()
        } else return

        this.config = {
            api_endpoint : 'https://api-adresse.data.gouv.fr/search/?q='
        }
        this.selectedItem = 0
        this.adresses = []
    }

    initEls() {
        this.els = {
            inputAutoComplete : document.querySelector('.js-adress'),
            autoCompleteContainer : document.querySelector('.js-autocomplete'),
            inputCity : document.querySelector('.js-city'),
            inputCp : document.querySelector('.js-cp'),
            inputStreetNumber : document.querySelector('.js-street_number'),
            autoCompleteItems : 0
        }
    }

    initEvents() {
        this.initAutoComplete()
    }

    initAutoComplete() {
        this.els.inputAutoComplete.addEventListener('input', () =>  {
            this._autoComplete().catch(e => console.log(e))
        })
        this.els.inputAutoComplete.addEventListener('blur', (e) =>  {
            this.els.autoCompleteContainer.classList.add('js-hidden')
        })
        this.els.inputAutoComplete.addEventListener('focus', (e) =>  {
            this.els.autoCompleteContainer.classList.add('js-hidden')
        })
        this.els.inputAutoComplete.addEventListener('keydown', event => {
            this._keyboardNavigation(event)
        })
    }

    _keyboardNavigation(event) {
        if (this.els.autoCompleteItems.length === 0) return
        if(event.key === 'ArrowDown' && this.selectedItem < this.els.autoCompleteItems.length) {
            this.selectedItem++
        }
        else if (event.key === 'ArrowUp' && this.selectedItem > 0) {
            this.selectedItem--
        }
        if (event.key === 'Enter' && this.selectedItem > 0) {
            event.preventDefault()
            this._handleView(false)
            this._fillForm(this.selectedItem - 1)
            this.selectedItem = 0
        }
        try {
            document.querySelectorAll(`ul.js-autocomplete li`).forEach((item, i) => {
                if (i === this.selectedItem - 1) item.classList.add('js-active')
                else item.classList.remove('js-active')
            })
        } catch (e) {}
    }

    _listenKeyEvents(event) {
        if(event.key === 'ArrowDown' && this.selectedItem < this.els.autoCompleteItems.length) {
            this.selectedItem++
        }
        else if (event.key === 'ArrowUp' && this.selectedItem > 0) {
            this.selectedItem--
        }
    }

    async _autoComplete() {
        const value = this.els.inputAutoComplete.value

        if(!value) {
            this._handleView(false)
            return
        }

        this.els.autoCompleteContainer.classList.remove('js-hidden')
        const query = value.split(' ').join('+')

        const source = await fetch(this.config.api_endpoint + query)
        const res = await source.json()
        this.adresses = res

        if (res.features.length === 0) this._handleView('false')
        const formatted_res = res.features.map(adress => adress.properties.label)

        this._createList(formatted_res)
    }

    _createList(data) {
        if(data.length === 0) this._handleView()
        this.els.autoCompleteContainer.innerHTML = ''
        data.forEach((result, count) => {
            this._createListItem(result, count)
        })
        this.els.autoCompleteItems = this.els.autoCompleteContainer.querySelectorAll('li')
        this._handleView(true)
    }

    _createListItem(result, count) {
        const li = document.createElement('li')
        li.addEventListener('mousedown', e => {
            this.els.autoCompleteContainer.classList.add('js-hidden')
            if(this.els.autoCompleteItems) {
                this._fillForm(count)
            }
        })
        li.textContent = result
        this.els.autoCompleteContainer.appendChild(li)
    }

    _fillForm(count) {
        const properties = this.adresses.features[count].properties
        console.log(properties)

        if (properties.type !== "municipality") {
            this.els.inputAutoComplete.value = properties.street || properties.name
            if(properties.type === 'housenumber') {
                this.els.inputStreetNumber.value = properties.housenumber
            } else {
                this.els.inputStreetNumber.value = ''
            }
            this.els.inputCp.value = properties.postcode
            this.els.inputCity.value = properties.city
        } else {
            this.els.inputCity.value         = ''
            this.els.inputCp.value           = ''
            this.els.inputStreetNumber.value = ''
        }
    }

    _handleView(haveResult = false) {
        if (!haveResult) this.els.autoCompleteContainer.classList.add('js-hidden')
        else this.els.autoCompleteContainer.classList.remove('js-hidden')
    }
}
