export default class RegisterForm {

    constructor() {
        if(document.querySelector('body.register')) {
            this.initEls()
            this.initEvents()
        } else return

        this.config = {
            api_endpoint : 'https://api-adresse.data.gouv.fr/search/?q='
        }
        this.selectedItem = 0
    }

    initEls() {
        this.els = {
            managerButton : document.querySelector('.js-manager-button'),
            managerInputsContainer : document.querySelector('.js-manager-inputs'),
            inputAutoComplete : document.querySelector('.js-adress'),
            autoCompleteContainer : document.querySelector('.js-autocomplete'),
            autoCompleteItems : 0
        }
    }

    initEvents() {
        this.initManagerForm()
        this.initAutoComplete()
    }

    initManagerForm() {
        this.els.managerButton.addEventListener('click', () => {
            if (this.els.managerButton.checked) {
                this.els.managerInputsContainer.classList.remove('hidden')
                this.els.managerInputsContainer.querySelectorAll('input').forEach(input => {
                    input.removeAttribute('disabled')
                })
            } else {
                this.els.managerInputsContainer.classList.add('hidden')
                this.els.managerInputsContainer.querySelectorAll('input').forEach(input => {
                    input.setAttribute('disabled', '')
                })
            }
        })
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
            console.log(event.key);
            if (this.els.autoCompleteItems.length === 0) return
            if(event.key === 'ArrowDown' && this.selectedItem < this.els.autoCompleteItems.length) {
                this.selectedItem++
            }
            else if (event.key === 'ArrowUp' && this.selectedItem > 0) {
                this.selectedItem--
            }
            if (event.key === 'Enter') {
                event.preventDefault()
                try {
                    this.els.inputAutoComplete.value = document.querySelector(
                        `ul.js-autocomplete li:nth-of-type(${this.selectedItem})`)
                        .textContent
                    this._handleView(false)
                } catch (e) {}
                this.selectedItem = 0
                return
            }
            try {
                document.querySelectorAll(`ul.js-autocomplete li`).forEach((item, i) => {
                    if (i === this.selectedItem - 1) item.classList.add('js-active')
                    else item.classList.remove('js-active')
                })
            } catch (e) {}
        })
    }

    _listenKeyEvents(event) {
        if(event.key === 'ArrowDown' && this.selectedItem < this.els.autoCompleteItems.length) {
            this.selectedItem++
        }
        else if (event.key === 'ArrowUp' && this.selectedItem > 0) {
            this.selectedItem--
        }
        console.log(this.selectedItem)
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

        if (res.features.length === 0) this._handleView('false')
        const formatted_res = res.features.map(adress => adress.properties.label)

        this._createList(formatted_res)
    }

    _createList(data) {
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
        li.addEventListener('mousedown', e => {
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

