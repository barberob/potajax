const TILE_LAYER1 = 'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png';
const TILE_LAYER2 = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const TILE_LAYER3 = 'https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png';
const TILE_LAYER4 = 'https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png';
const TILE_LAYER5 = 'http://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}.png';

class Map {

    constructor(Lat, Lng, Zoom, Tile) {
        this.Lat = Lat;
        this.Lng = Lng;
        this.Zoom = Zoom;
        this.Tile = Tile;

        this.Object = null;

        this.macarte = null;
        this.markers = null

        this.init();
    }
    init() {
        console.log('Creation Map');
        this.macarte = L.map('map').setView([this.Lat, this.Lng], this.Zoom);
        L.tileLayer(TILE_LAYER2, {
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(this.macarte);
    }
    Gen_Json_Map(type,lat,lng,nom,desc){


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














/*
function laCarte(macarte){
    var lat = 44.55962000171788;
    var lon = 6.079823238576286;
    var zoom = 5;
    let macarte = null;



    macarte = L.map('map').setView([lat, lon], zoom);
    L.tileLayer(TILE_LAYER5, {
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);

    let markers = new L.MarkerClusterGroup();
    let counter_total = 0;
    let counter_not = 0;

    objStation.map((Station) => {
        counter_total++;
        let marker;

        if (Station.place.location['1'] || Station.place.location['0']) {
            counter_not++;
            //console.log(Station['place']['location']);

        }

        //console.log(Station.lat+' '+Station.lon+' '+Station.temp);

        var mesure = Object.entries(Station.measures)[0][1].res;
        var temperature = Object.entries(mesure)[0][1][0];
        var humidite = Object.entries(mesure)[0][1][1];

        var pressure = Object.entries(Station.measures)[1][1].res;
        var pasc = Object.entries(pressure)[0][1][0];

        var IconBlue = L.icon({
            iconUrl: 'icon/marker-icon-blue.png',
            shadowUrl: 'icon/marker-shadow.png'
        });
        var IconWhite = L.icon({
            iconUrl: 'icon/marker-icon-white.png',
            shadowUrl: 'icon/marker-shadow.png'
        });
        var IconRed = L.icon({
            iconUrl: 'icon/marker-icon-red.png',
            shadowUrl: 'icon/marker-shadow.png'
        });

        let data = '';
        data += '<p>'+temperature+' °C</p>';
        data += '<p>'+humidite+' %</p>';
        data += '<p>'+pasc+' hPa</p>';

        if(temperature == '0') {
            marker = L.marker([Station.place.location['1'], Station.place.location['0']], {icon: IconWhite}).bindPopup(data);
        }
        if(temperature > '0'){
            marker = L.marker([Station.place.location['1'], Station.place.location['0']], {icon: IconRed}).bindPopup(data);
        }

        if(temperature < '0') {
            marker = L.marker([Station.place.location['1'], Station.place.location['0']], {icon: IconBlue}).bindPopup(data);
        }

        marker.addEventListener('click',function (){
            document.getElementById('temperature_data').innerHTML = temperature+'°C';
            document.getElementById('humidite_data').innerHTML = humidite+'%';
            document.getElementById('pression_data').innerHTML = pasc+'hPa';
        },false);

        markers.addLayer(marker);
    });
    macarte.addLayer(markers);
    console.log(counter_total);
    console.log(counter_not);
}

function Xhr(){
    let rep = null
    try {
        rep = new ActiveXObject("Microsoft.XMLHTTP");
    } catch(Error) {
        try {
            rep = new ActiveXObject("MSXML2.XMLHTTP");
        } catch(Error) {
            try {
                rep = new XMLHttpRequest();
            } catch(Error) {
                console.error(' Impossible de créer l\'objet XMLHttpRequest')
            }
        }
    }
    return rep
}

function ajax(){
    let req = Xhr()
    req.onreadystatechange = function() {
        if (this.readyState == this.DONE) {
            //console.log(req.responseXML);
            autocomplete(document.getElementsByTagName("input")[0],req);

        }
    }
    req.open("GET", 'https://api-adresse.data.gouv.fr/search/?q='+ document.getElementById('myInput').value, true)
    req.send(null);

}

window.onload = function(){
    laCarte(macarte);
};
*/