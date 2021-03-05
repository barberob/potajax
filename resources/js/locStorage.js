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

            /*jQuery.post("FavoritesController.php", {id: localStorage.getItem("id")}, function(data)
            {
                alert(localStorage.getItem("id"));
            }).fail(function()
            {
                alert("not working");
            });*/

            /*document.cookie = "id="+localStorage.getItem("id");

            alert(document.cookie);*/

        }, false);
    }
}
