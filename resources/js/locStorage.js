export default class locStorage
{

    constructor()
    {
        if(document.querySelector('body.shop'))
        {
            this.init();
        }
    }

    init()
    {
        let button = document.querySelector('.fav');
        let id = button.getAttribute("data-id");

        /*console.log(id);*/

        let data = JSON.parse(localStorage.getItem("id")) || [];

        /*console.log(data);*/

        button.addEventListener("click", function(){
            data.push(id);

            localStorage.setItem("id", JSON.stringify(data));
        }, false);

        /*if(document.querySelector('body.fav'))
        {
            this.fetchData();
        }*/
    }

    /*fetchData()
    {
        this.domain_url = window.location.origin;

        let url = this.domain_url+'/favorites';
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let recupId = localStorage.getItem("id");
        let stringId = JSON.stringify(recupId);

        // Fetch si y'a 0 fav dans la page

        // doc.querySelector sur les li de la liste des fav

        let li = document.querySelector('li');

        console.log(li);

        // fetch(url, {
        //             headers: {
        //                 "Content-Type": "application/json",
        //                 "Accept": "application/json",
        //                 "X-Requested-With": "XMLHttpRequest",
        //                 "X-CSRF-Token": token
        //             },
        //             method: "post",
        //             credentials: "same-origin",
        //             body: stringId
        //         }).then(response => response.text()).catch(error => alert("Erreur : " + error)).then(response => console.log(response));
    }*/
}
