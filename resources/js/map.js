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

            this.Lat = '44.55962000171788';
            this.Lng = '6.079823238576286';
            this.Zoom = '5';
            this.Tile = TILE_LAYER2;

            this.Object = new Array();

            this.macarte = null;
            this.markers = null

            this.init();
        }
    }
    init() {
        console.log('Creation Map');

        console.log(document.querySelector('.container').scrollWidth);
        console.log(document.querySelector('.container').scrollWidth);


        this.macarte = L.map('map').setView([this.Lat, this.Lng], this.Zoom);
        L.tileLayer(this.Tile, {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(this.macarte);

        this.macarte.on('moveend', () => {
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
            this.Object = new Array();
            this.markers.remove();
        }
    }
    marker_add(){
        console.log('Creation Marker');
        this.markers = new L1.MarkerClusterGroup();

        this.Object.map((Item) => {
            let marker;
            let data = '';

            var IconBlue = L.icon({
                iconUrl: 'icon/marker-icon-blue.png',
                shadowUrl: 'icon/marker-shadow.png'
            });

            var IconWhite = L.icon({
                /*iconUrl: 'icon/marker-icon-white.png',
                shadowUrl: 'icon/marker-shadow.png'
                 */
            });

            var IconRed = L.icon({
                iconUrl: 'icon/marker-icon-red.png',
                shadowUrl: 'icon/marker-shadow.png'
            });

            data += '<p>Nom: '+Item.detail['name']+'</p>';
            data += '<p>Desc: '+Item.detail['desc']+'</p>';

            marker = L.marker([Item.coord['Lat'], Item.coord['Lng']],/* {icon: IconWhite}*/).bindPopup(data);

            /*let type = Item.type;
            if(type == '0') {
                marker = L.marker([Item.coord.Lat, Item.coord.Lng], {icon: IconWhite}).bindPopup(data);
            }
            if(type > '0'){
                marker = L.marker([Item.coord.Lat, Item.coord.Lng], {icon: IconRed}).bindPopup(data);
            }
            if(type < '0') {
                marker = L.marker([Item.coord.Lat, Item.coord.Lng], {icon: IconBlue}).bindPopup(data);
            }
            else{

            }*/
            this.markers.addLayer(marker);

        });
        this.macarte.addLayer(this.markers);
    }

    Fetch(posMap){
        console.log('Recherche Marker');
        let url = 'http://potajax.prog/API/get_marker';
        let params = ''
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let data = "{lat: 565,lng: 6546848,categorie: [1], subcategorie: [1]}";

        let test = {
            northEast: posMap._northEast,
            sudOuest: posMap._southWest,
            categories: [1, 2, 3],
            subcategories: [1, 2, 3]
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
    }
}
