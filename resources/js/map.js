import * as L from "leaflet";
import * as L1 from "leaflet.markercluster";
export default class Map{
    constructor() {
        if(document.getElementById('map')){

            const TILE_LAYER1 = 'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png';
            const TILE_LAYER2 = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const TILE_LAYER3 = 'https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png';
            const TILE_LAYER4 = 'https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png';
            const TILE_LAYER5 = 'http://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}.png';

            this.TILE_LAYER1_layers = L.tileLayer(TILE_LAYER1, {id: '1',noWrap: true, minZoom: 2, maxZoom: 20, attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'});
            this.TILE_LAYER2_layers = L.tileLayer(TILE_LAYER2, {id: '2',noWrap: true, minZoom: 2, maxZoom: 20, attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'});
            this.TILE_LAYER3_layers = L.tileLayer(TILE_LAYER3, {id: '3',noWrap: true, minZoom: 2, maxZoom: 20, attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'});
            this.TILE_LAYER4_layers = L.tileLayer(TILE_LAYER4, {id: '4',noWrap: true, minZoom: 2, maxZoom: 20, attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'});
            this.TILE_LAYER5_layers = L.tileLayer(TILE_LAYER5, {id: '5',noWrap: true, minZoom: 2, maxZoom: 20, attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>'});

            this.baseMaps = {
                "<span style='color: gray'>Dark Edition</span>": this.TILE_LAYER1_layers,
                "<span style='color: gray'>Negative Edition</span>": this.TILE_LAYER5_layers,
                "<span style='color: gray'>Light Smooth 1</span>": this.TILE_LAYER3_layers,
                "<span style='color: gray'>Light Smooth 2</span>": this.TILE_LAYER4_layers,
                "<span style='color: gray'>Light Smooth 3</span>": this.TILE_LAYER2_layers,
            };

            this.domain_url = window.location.origin;

            let img = this.domain_url+'/img/icon_map/marker-icon-';
            let shadow = this.domain_url+'/img/icon_map/marker-shadow.png';

            /*         Default           */
            this.IconWhite = L.icon({
                iconUrl: img+'white.png',
                shadowUrl: shadow
            });
            this.IconGrey = L.icon({
                iconUrl: img+'grey.png',
                shadowUrl: shadow
            });
            this.IconBlack = L.icon({
                iconUrl: img+'black.png',
                shadowUrl: shadow
            });
            this.IconBlue = L.icon({
                iconUrl: img+'blue.png',
                shadowUrl: shadow
            });
            this.IconRed = L.icon({
                iconUrl: img+'red.png',
                shadowUrl: shadow
            });
            this.IconGreen = L.icon({
                iconUrl: img+'green.png',
                shadowUrl: shadow
            });
            this.IconLightBlue = L.icon({
                iconUrl: img+'light-blue.png',
                shadowUrl: shadow
            });
            this.IconOrange = L.icon({
                iconUrl: img+'orange.png',
                shadowUrl: shadow
            });
            this.IconPink = L.icon({
                iconUrl: img+'pink.png',
                shadowUrl: shadow
            });
            this.IconPurple = L.icon({
                iconUrl: img+'purple.png',
                shadowUrl: shadow
            });
            this.IconYellow = L.icon({
                iconUrl: img+'yellow.png',
                shadowUrl: shadow
            });
            this.IconNAN = L.icon({
                iconUrl: img+'nan.png',
                shadowUrl: shadow
            });


            this.Lat = '44.55962000171788';
            this.Lng = '6.079823238576286';
            this.Zoom = '5';
            //this.Tile = TILE_LAYER2;
            this.Object = new Array();

            this.macarte = null;
            this.markers = null

            this.makerUse = [];

            this.Def_pos = {
                _northEast:{
                    lat: 54.29088164657006,
                    lng: 26.235351562500004
                },
                _southWest: {
                    lat: 32.91648534731439,
                    lng: -14.106445312500002 }
            };
            //this.changeSelect();
            this.init();
            /*alert('zerzre');
            window.addEventListener("beforeunload", function (event) {
                //your code goes here on location change
                alert('yolo');
            });*/
        }
    }
    init() {
        console.log('Creation Map');

        //console.log(document.querySelector('.container').scrollWidth);
        //console.log(document.querySelector('.container').scrollWidth);

        this.macarte = L.map('map', {center: [this.Lat, this.Lng], zoom: this.Zoom, layers: [this.TILE_LAYER2_layers]});
        this.macarte.setMaxBounds([[-90,-180],[90,180]])
        // vielle carte sans le layers des tuilles
        /*this.macarte = L.map('map').setView([this.Lat, this.Lng], this.Zoom);
        L.tileLayer(this.Tile, {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(this.macarte);*/

        L.control.layers(this.baseMaps).addTo(this.macarte);

        this.NewPoints(this.Def_pos);

        this.macarte.on('moveend', () => {
            //console.log(this.macarte.getBounds());
            this.NewPoints(this.macarte.getBounds());
        });

    }
    NewPoints(posMap) {
        console.log('Nouveau Marker');
        this.marker_remove();

        this.Fetch(posMap);

    }
    marker_remove(){
        console.log('Destruction Marker');
        //console.log(this.markers);
        if(this.markers){

            this.markers.remove();
            delete this.markers;

            document.getElementById('listRightShop').innerHTML = '';

            delete this.Object;
            this.Object = new Array();
        }
    }
    marker_add(){
        console.log('Creation Marker');
        this.markers = new L1.MarkerClusterGroup();

        this.Object.map((Item) => {
            //console.log(Item.detail);
            let type = Item.detail['subcategorie_id'];
            let libelle = Item.detail['subcategorie_lib'];
            let adresse = Item.detail['adresse'];
            let id = Item.detail['id'];
            let nom = Item.detail['nom'];

            let data = '';
            let marker;
            let Loc = [Item.coord['Lat'], Item.coord['Lng']];
            let icone = null;
            let color = null;

            data += '<p style="font-weight:bold; font-size:18px; color:#EE8E6B;">'+Item.detail['nom']+'</p>';
            data += '<p style="font-size:15px;">'+Item.detail['desc']+'</p>';

            //marker = L.marker([Item.coord['Lat'], Item.coord['Lng']],/* {icon: IconWhite}*/).bindPopup(data);

            switch (type){
                case 1: icone = {icon: this.IconBlue};color = '#2B82CB' ; break;
                case 2: icone = {icon: this.IconRed};color = '#F80B17' ; break;
                case 3: icone = {icon: this.IconGreen};color = '#0AF92A' ; break;
                case 4: icone = {icon: this.IconOrange};color = '#F87D10' ; break;
                case 5: icone = {icon: this.IconPurple};color = '#9E0DF7' ; break;
                case 6: icone = {icon: this.IconYellow};color = '#F8F008' ; break;
                case 7: icone = {icon: this.IconPink};color = '#F810B3' ; break;
                case 8: icone = {icon: this.IconLightBlue};color = '#0DF7EC' ; break;

                case 9: icone = {icon: this.IconWhite};color = '#E2E2E2' ; break;
                case 10: icone = {icon: this.IconGrey};color = '#888888' ; break;
                case 11: icone = {icon: this.IconBlack};color = '#2B2B2B' ; break;

                default: icone = {icon: this.IconNAN};color = 'NaN' ; break;
            }

            if(!(this.VerificationDejaDansTableau(libelle,this.makerUse))){
                //console.log('add '+ libelle);
                this.makerUse.push({type: libelle, color: color});
            }


            marker = L.marker(Loc,icone).bindPopup(data);
            console.log(marker);

            let NewList = '';
            NewList += '<li class="list-group-item">';
            NewList += '<strong><a id="shop_'+id+'">'+nom+'</a></strong>';
            NewList += '<p>'+adresse+'</p>';
            NewList += '<a class="btn btn-outline-danger btn-sm" href="'+this.domain_url+'/shop/'+id+'" role="button">Voir la page</a>';
            NewList += '</li>';

            document.getElementById('listRightShop').innerHTML += NewList;

            console.log('shop_'+id);

            document.getElementById('shop_'+id).addEventListener('click',function(ev){
                console.log(ev.target.attributes.id);
                console.log(marker);
                marker.openPopup();
            })

            this.markers.addLayer(marker);
        });
        /*document.getElementById('listRightShop').innerHTML = '';
        document.getElementById('listRightShop').innerHTML = this.NewList;*/

        //console.log(this.makerUse);
        this.macarte.addLayer(this.markers);

    }
    Fetch(posMap){
        console.log('Recherche Marker');
        let url = this.domain_url+'/API/get_marker';
        let params = ''
        let data = "{lat: 565,lng: 6546848,categorie: [1], subcategorie: [1]}";
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let test = this.get_data(this.Def_pos);
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
            //console.log(objected);
            for (const [key1, value1] of Object.entries(objected)) {
                //console.log(value1);
                if (value1 != null) {
                    this.Object.push({
                        'detail': {
                            'id': value1.id,
                            'nom': value1.nom,
                            'desc': value1.descriptif,
                            'adresse': value1.adresse,
                            'categorie_id': value1.category_id,
                            'subcategorie_id': value1.subcategory_id,
                            'subcategorie_lib': value1.libelle,
                        },
                        'coord': {
                            'Lat': value1.lat,
                            'Lng': value1.lng,
                        }
                    });
                }
            }
            //console.log(this.Object);
            this.marker_add();
        }).catch(error => alert("Erreur : " + error));
        //console.log(ResTo);
    }
    get_data(posMap){
        console.log('Récupération Data Map');
        let Url = window.location.href.split('/');
        let VariableGet = Url[3].indexOf('?search=');
        let search = 'default';
        let test;

        //categorie
        Url[4] = parseInt(Url[4]);
        //subcategorie
        Url[5] = parseInt(Url[5]);

        //console.log(Url[4]+' '+Url[5]);

        //si il y a pas de categorie
        if(isNaN(Url[4])){
            Url[4] = "All";
            //console.log('----// '+VariableGet);

            // si il y a ?q=
            if (VariableGet != -1){
                //alert('--- Dans le ?');
                search = Url[3].split('?search=');
            }
        }

        //si il y a pas de subcategorie
        if(isNaN(Url[5])){
            Url[5] = "All";
        }

        //si il y a un search
        if(search !== 'default'){
            //alert('--- Dans le search');
            test = {
                northEast: posMap._northEast,
                sudOuest: posMap._southWest,
                search: search[1]
            };
        }
        else{
            test = {
                northEast: posMap._northEast,
                sudOuest: posMap._southWest,
                categories: [Url[4]],
                subcategories: [Url[5]]
            };
        }
        return test;
    }
    ZoomShop(lat,lng,zoom){
        this.macarte.setView([lat, lng], zoom);
    }
    /*changeSelect(){
        document.getElementById('categorie_id')
            .addEventListener("change", function (event) {

                let url = this.domain_url+'/API/get_sub_category';
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                //console.log(this.value)
                let test = {
                    category_id: this.value
                };

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
                    //console.log(Object.entries(objected));
                    for (const [key1, value1] of Object.entries(objected)) {
                        for (const [key2, value2] of Object.entries(value1)) {
                            if (value2 != null) {
                                //console.log(value2);
                                this.Object.push({
                                    'detail': {
                                        'name': value2.nom,
                                        'desc': value2.descriptif,
                                        'categorie': value2.category_id,
                                        'subcategorie': value2.subcategory_id,
                                    },
                                    'coord': {
                                        'Lat': value2.lat,
                                        'Lng': value2.lng,
                                    }
                                });
                                //console.log(this.Object);
                            }
                        }
                    }
                    this.marker_add();
                    //console.log(this.Object);
                }).catch(error => alert("Erreur : " + error));
                //console.log(ResTo);
            });
        document.getElementById('subcategorie_id')
            .addEventListener("change", function (event) {

                alert('yolo2');
            });
    }*/
    VerificationDejaDansTableau(val,tab){
        let res = false;
        //console.log(tab.length);
        for(let i = 0; i < tab.length; i++){
            //console.log(val+' '+tab[i]['type']);
            if(val === tab[i]['type']){
                res = true;
            }
        }
        return res;
    }
}
