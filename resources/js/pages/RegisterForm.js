import autoComplete from '@tarekraafat/autocomplete.js'

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
            managerInputsContainer : document.querySelector('.js-manager-inputs'),
            inputAutoComplete : document.querySelector('.js-adress')
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
        new autoComplete({
            data: {                              // Data src [Array, Function, Async] | (REQUIRED)
                src: async () => {
                    // API key token
                    const token = "this_is_the_API_token_number";
                    // User search query
                    const query = this.els.inputAutoComplete.value.split(' ').join('+')
                    // Fetch External Data Source
                    const source = await fetch(`https://api-adresse.data.gouv.fr/search/?q=${query}`);
                    // Format data into JSON
                    const data = await source.json();
                    // Return Fetched data
                    return data;
                },
                key: ["title"],
                cache: false
            },
            query: {                             // Query Interceptor               | (Optional)
                manipulate: (query) => {
                    return query.replace("pizza", "burger");
                }
            }
        });
    }
}
