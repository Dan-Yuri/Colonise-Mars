@extends('layout')
{{-- ______________________________________________________Form____________________________________________________________ --}}
@section('main-section')
<div class="container text-center">
    
    <h1 style="color:rgb(169, 188, 169);">Welcome to your adventurer space</h1>

    <form action="{{route('addZone')}}" method="POST">
        @csrf

        <div class="row">
            <div class="col-sm-3">
                <label>Location</label>
                <input type="text" placeholder="Enter your location" name="location" id="location"  required>
            </div> 
            <div class="col-sm-3">
                <label>Name of adventurer</label>
                <input type="text" name="name" placeholder="Enter your name"  required>
            </div>
           <div class="col-sm-3 form-group">
                <label for="mineral">Mineral</label>
                <select name="mineral_type" id="mineral" class="form-control" >
                    <option value="klingon">Klingon</option>
                    <option value="chomdu">Chomdû</option>
                    <option value="perl">Perl</option>
                </select>
            </div>

            {{-- <div class="col-sm-3 form-group">
                <label for="mineral">Mineral</label>
                <select name="mineral_type" id="mineral" class="form-control">
                    {!! addOptionsToSelect(['klingon' => 'Klingon', 'chomdu' => 'Chomdû', 'perl' => 'Perl']) !!}
                </select>
            </div> --}}
        
            
            
            <div class="col-sm-3 form-group">
                <label for="level">Level of danger</label>
                <select id="level" name="dangerous_level" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
            </div>
        </div>
        <div class="row text-center d-flex justify-content-center">
            <div class="col-sm-3 ">
                <label>The date of your exploration</label>
                <input type="date" name="date">
            </div>
        
            <div class="col-sm-3">
                <label>Votre latitude</label>
                <input type="text"  placeholder="latitude" name="latitude" id="lat">
            </div>
            <div class="col-sm-3">
                <label>Votre longitude</label>
                <input type="text"  placeholder="longitude" name="longitude" id="lng">
            </div>
    </div>

        {{-- _______________________________________MAP__________________________________________________________ --}}

        <div class="mapform" >
            
            <div id="map" style="height:300px; width: 800px;" class=" "></div>

            <script>
                let map;
                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: { lat: 43.5434218, lng: 1.5097892 },
                        zoom: 8,
                        scrollwheel: true,
                    });

                    const uluru = { lat: 43.5434218, lng: 1.5097892 };
                    let marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                        draggable: true
                    });

                    google.maps.event.addListener(marker,'position_changed',
                        function (){
                            let lat = marker.position.lat()
                            let lng = marker.position.lng()
                            $('#lat').val(lat)
                            $('#lng').val(lng)
                        })

                    google.maps.event.addListener(map,'click',
                    function (event){
                        pos = event.latLng
                        marker.setPosition(pos)
                    })
                }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"
                    type="text/javascript"></script>
        </div>
        <button type="submit"class='glowing-btn'><span class='glowing-txt'>C<span class='faulty-letter'>L</span>ICK</span></button>
    </form> 
    </div>

    @if(Session::has ('Success'))
<br><h5 style="color:green;">{{Session::get('Success')}}</h5>
@endif
</div>

@endsection


