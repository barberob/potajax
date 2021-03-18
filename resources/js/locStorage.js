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
            this.domain_url = window.location.origin;
            this.hookAffiche = document.getElementById('favorite_list');
            this.ViewStorage();
            this.Fetch('load');
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
                this.hookAffiche.appendChild(shop).innerText = tempData[i];
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
        let url = this.domain_url + '/API/get_favorite';
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if(idShop === 'load'){
            console.log('Loading Fav');

            let test = [{type: 'read'}];
            let dat = JSON.parse(localStorage.getItem("id"))
            test.push(dat);
            /*let test = JSON.parse(localStorage.getItem("id"));
            test.push({type: 'read'});*/
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
                this.FormAffiche(objected);
            }).catch(error => alert("Erreur : " + error));

        } else {

        console.log('Enregistement Fav');

        let test = [{type: 'create',id: idShop}];
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

    FormAffiche(objected){
        if (objected !== null) {
            let formTab = '<table class="table table-striped">';
                    formTab += '<thead>';
                        formTab += '<tr>';
                            formTab += '<th scope="col">#</th>';
                            formTab += '<th scope="col">Nom</th>';
                            formTab += '<th scope="col">Adress</th>';
                            formTab += '<th scope="col">Catégorie</th>';
                            formTab += '<th scope="col">Sous Catégorie</th>';
                            formTab += '<th scope="col">Go to</th>';
                        formTab += '</tr>';
                    formTab += '</thead>';
                formTab += '<tbody>';
            for (let i = 0; i < objected.length; i++) {
                //console.log(objected[i]);
                    formTab += '<tr>';
                        formTab += '<td>';
                            formTab += '<th scope="row">'+objected[i].id+'</th>';
                            formTab += '<td>'+objected[i].nom+'</td>';
                            formTab += '<td>'+objected[i].adresse+'</td>';
                            formTab += '<td>'+objected[i].Cat_libelle+'</td>';
                            formTab += '<td>'+objected[i].SubCat_libelle+'</td>';
                            formTab += '<td>'+objected[i].id+'</td>';
                        formTab += '</td>';
                    formTab += '</tr>';
            }
            this.hookAffiche.innerHTML = formTab;
        }
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
