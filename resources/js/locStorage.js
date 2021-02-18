export default class locStorage
{

    constructor()
    {
        if(document.querySelector('body.shops'))
        {
            this.init();
        }
    }

    init()
    {
        document.querySelectorAll('.fav').forEach((button, i) => {
            button.addEventListener("click", function(){
                localStorage.setItem("id"+i, i);
                document.cookie = "id"+i+"="+i;
                /*alert(document.cookie);*/
            }, false);
        });
    }
}
