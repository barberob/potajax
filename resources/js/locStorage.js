export default class locStorage {

    constructor() {
        if (document.querySelector('body.shop')) {
            this.domain_url = window.location.origin;
            this.button = document.querySelector('.fav');
            this.id = this.button.getAttribute("data-id");
            this.data = JSON.parse(localStorage.getItem("id")) || [];

            this.init();
            this.DebugRS();
        }
    }

    init() {
        /*console.log(this.id);*/
        /*console.log(this.data);*/

        this.button.addEventListener("click", () => {

            this.data.push(this.id);

            localStorage.setItem("id", JSON.stringify(this.data));

            this.DebugLS();

            this.Fetch(this.id);


            /*if(document.querySelector('body.fav'))
            {
                this.fetchData();
            }*/
        }
    }

    AddStorage() {

        //localStorage.setItem($_('CP').value,$_('Ville').value);
    }

    RemoveStorage() {

        //localStorage.clear();
    }

    DebugRS() {

        localStorage.clear();
    }

    DebugLS() {

        for (let i = 0; i < localStorage.length; i++) {
            console.log(localStorage.getItem('id'));
        }
    }

    Fetch(idShop) {

        console.log('Enregistement Fav');
        let url = this.domain_url + '/API/get_favorite';
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let test = {id: idShop};
        //console.log(test);

        let ResTo = fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": token
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify(test)
        }).then(response => {
            return response.json();
        }).then(objected => {
            console.log(objected);
        }).catch(error => alert("Erreur : " + error));
    }

}
