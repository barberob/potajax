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
        document.querySelectorAll('.fav').forEach((button, i) => {
            button.addEventListener("click", function(){
                /*localStorage.setItem("id"+i, i);
                document.cookie = "id"+i+"="+i;
                console.log(document.cookie);*/
                console.log("favoris");
            }, false);
        });
    }
}
