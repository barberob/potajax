import L from 'leaflet'
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

            this.Object = null;

            this.macarte = null;
            this.markers = null

            this.init();
        }
    }
    init() {
        console.log('Creation Map');

        console.log(document.querySelector('.container').scrollWidth);
        console.log(document.querySelector('.container').scrollWidth);


        document.getElementById('map').style.width = document.querySelector('.container').scrollWidth+'px';
        document.getElementById('map').style.height = document.querySelector('.container').scrollWidth+'px';

        window.onresize = () => {
            document.getElementById('map').style.width = document.querySelector('.container').scrollWidth+'px';
            document.getElementById('map').style.height = document.querySelector('.container').scrollWidth+'px';
        }



        this.macarte = L.map('map').setView([this.Lat, this.Lng], this.Zoom);
        L.tileLayer(this.Tile, {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(this.macarte);
    }
    NewPoints(Obj){
        console.log('Nouveau Marker');
        this.marker_remove();
        this.Object = Obj;
        this.marker_add();
    }
    marker_remove(){
        console.log('Destruction Marker');
        console.log(this.markers);
        if(this.markers) this.markers.remove();
    }
    marker_add(){
        console.log('Creation Marker');
        this.markers = new L.MarkerClusterGroup();

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

            let type = Item.type;
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

            }
            this.markers.addLayer(marker);

        });
        this.macarte.addLayer(this.markers);
    }
}
