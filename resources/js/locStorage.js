export default class locStorage {

    constructor() {
        if (document.querySelector('body.shop')) {
            this.domain_url = window.location.origin;
            this.button = document.querySelector('.fav');
            this.id = this.button.getAttribute("data-id");
            this.data = JSON.parse(localStorage.getItem("id")) || [];

            this.init();
            //this.DebugRS();
        }
        if (document.querySelector('body.favorites')) {
            document.getElementById('favorite_list').addEventListener("load", () => {
                this.DebugLS();
                this.ViewStorage();
            })
        }
    }

    init() {
        /*console.log(this.id);*/
        /*console.log(this.data);*/

        this.button.addEventListener("click", () => {

            this.AddStorage()

            this.DebugLS();

            this.Fetch(this.id);


            /*if(document.querySelector('body.fav'))
            {
                this.fetchData();
            }*/
        }, false);
    }

    AddStorage() {

        if (localStorage.getItem("id")) {
            this.FindInStorage()
        } else {
            this.data.push(this.id);
            localStorage.setItem("id", JSON.stringify(this.data));
        }
    }

    ViewStorage() {

        if (localStorage.getItem("id")) {
            let tempData = JSON.parse(localStorage.getItem('id'));
            for (let i = 0; i < tempData.length; i++) {
                console.log(tempData[i]);
                let shop = document.createElement('p')
                document.getElementById('favorite_list').appendChild(shop).innerText = tempData[i];
            }
        }
    }


    RemoveStorage() {
        localStorage.removeItem('id');
        localStorage.clear();
        this.data = [];
    }

    FindInStorage() {
        let tempData = JSON.parse(localStorage.getItem('id'));
        for (let i = 0; i < tempData.length; i++) {
            /*console.log(this.id);
            console.log(tempData[i]);*/
            if (this.id === tempData[i]) {
                //console.log(localStorage.getItem('id'));
                console.log(this.id + ' ' + tempData[i]);
                return true;
            }
        }
        this.data.push(this.id);
        localStorage.setItem("id", JSON.stringify(this.data));
        return false;
    }

    Fetch(idShop) {

        console.log('Enregistement Fav');
        let url = this.domain_url + '/API/get_favorite';
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let test = [{id: idShop}];
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

    DebugRS() {
        localStorage.removeItem('id');
        localStorage.clear();
        this.data = [];
    }

    DebugLS() {

        for (let i = 0; i < localStorage.length; i++) {
            console.log(localStorage.getItem('id'));
        }
    }
}
