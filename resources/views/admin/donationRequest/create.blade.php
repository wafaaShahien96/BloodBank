@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-default-success">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
 
    <div class="card-header">
        Create Donation Request
    </div>

    <div class="card-body">
    <form action="{{route('admin.donation_request.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="patient_name">Patient Name</label>
        <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="patient_name" >
      </div>

  <div class="form-group">
        <label for="patient_phone">Patient phone</label>
        <input type="text" class="form-control" id="patient_phone" name="patient_phone" placeholder="patient_phone" >
      </div>

      
      <div class="form-group">
        <label for="hospital_name">Hospital Name</label>
        <input type="text" class="form-control" id="hospital_name" name="hospital_name" placeholder="hospital_name" >
      </div>

      <div class="form-group">
        <label for="patient_age">Patient Age</label>
        <input type="text" class="form-control" id="patient_age" name="patient_age" placeholder="patient_age" >
      </div>

      <div class="form-group">
        <label for="bags_number">Bags Number</label>
        <input type="text" class="form-control" id="bags_number" name="bags_number" placeholder="bags_number" >
      </div>

        <div class="form-group">
            <label for="hospital_address">Hospital Address</label>
            <input type="text" class="form-control" id="hospital_address" name="hospital_address" placeholder="hospital_address" >
          </div>

        <div class="form-group">
            <label for="details">Details</label>
            <input type="text" class="form-control" id="details" name="details" placeholder="details" >
          </div>

    <div class="form-group">
        <label for="blood_type_id">Blood Type</label>
        <select  class="custom-select" type="text" id="blood_type_id" name="blood_type_id">
            <option value="1">O-</option>
            <option value="2">O</option>
            <option value="3">A-</option>
            <option value="4">A+</option>
            <option value="5">B-</option>
            <option value="6">B+</option>
            <option value="7">AB-</option>
            <option value="8">AB+</option>
        </select>
      </div>

      <div class="form-group">
        <label  for="city_id">Select City</label>
        <select class="form-control"  id="city_id" name="city_id">
          <option selected>Choose City</option>
          @foreach ($cities as $city)
              <option value="{{$city->id}}">{{$city->name ?? ''}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label  for="client_id">Select Client</label>
        <select class="form-control"  id="client_id" name="client_id">
          <option selected>Choose Client</option>
          @foreach ($clients as $client)
              <option value="{{$client->id}}">{{$client->name ?? ''}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="latitude">Latitude</label>
        <input type="text" id="latitude" name='latitude' class="form-control">
        </div>

      <div class="form-group">
        <label for="longitude">longitude</label>
        <input type="text" id="longitude" name='longitude' class="form-control">
        </div>

        <div class="form-group">
            <label for="pac-input"></label>
            <input type="text" id="pac-input" name='pac-input' class="form-control">
            </div>
      <div id="map" style="height: 500px;width: 1000px;"></div>
      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
    </div>
</div>
@endsection

@section('script')

    <script>
        $("#pac-input").focusin(function() {
            $(this).val('');
        });
        $('#latitude').val('');
        $('#longitude').val('');
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.740691, lng: 46.6528521 },
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow,marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('dsdsdsdsddsd');
                handleLocationError(false, infoWindow, map.getCenter());
            }
            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });
            function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());
                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
            }
            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];
            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
         async defer"></script>
    

    @endsection