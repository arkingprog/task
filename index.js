var selectCity = document.getElementById("city");
var selectWarehouse = document.getElementById("warehouse");

$.get('getCities.php', function (data) {
    var res = JSON.parse(JSON.parse(data));
    res.data.forEach(function (item, i, arr) {
        selectCity.options[selectCity.options.length] = new Option(item.Description, item.Desctiption);
    });
});

var map;
var markers = [];
function changeCity() {
    var city = this.value;
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    $(selectWarehouse).empty();
    markers=[];
    $.get('getWarehouses.php?city=' + city, function (data) {
        var res = JSON.parse(JSON.parse(data));
        map.panTo(new google.maps.LatLng(res.data[0].Latitude, res.data[0].Longitude));
        res.data.forEach(function (item, i, arr) {
            selectWarehouse.options[selectWarehouse.options.length] = new Option(
                item.Description,
                JSON.stringify({lng: parseFloat(item.Longitude), lat: parseFloat(item.Latitude)}));
            markers.push(new google.maps.Marker({
                position: {lng: parseFloat(item.Longitude), lat: parseFloat(item.Latitude)},
                map: map,
                title: item.Description
            }));
        });

    })
}
function selectedWarehouse() {
    var LatLng = JSON.parse(this.value);
    map.panTo(new google.maps.LatLng(LatLng.lat, LatLng.lng));
}
selectCity.addEventListener('change', changeCity);
selectWarehouse.addEventListener('change', selectedWarehouse);

function initMap() {
    $.get('getWarehouses.php?city=киев', function (data) {
        var res = JSON.parse(JSON.parse(data));
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lng: parseFloat(res.data[0].Longitude), lat: parseFloat(res.data[0].Latitude)}
        });
        res.data.forEach(function (item, i, arr) {
            selectWarehouse.options[selectWarehouse.options.length] = new Option(
                item.Description,
                JSON.stringify({lng: parseFloat(item.Longitude), lat: parseFloat(item.Latitude)}));
            markers.push(new google.maps.Marker({
                position: {lng: parseFloat(item.Longitude), lat: parseFloat(item.Latitude)},
                map: map,
                title: item.Description
            }));
        });

    });
}