@extends('layouts.layout')

@section('title', 'Facility')

@section('content') 

<div class="row">
  <div class="col-sm-5 col-md-offset-1">

    <h3><b>EPS Training Address:</b></h3>

        <div class="well">     
          <p><a href="https://www.whippanyac.com"><b>Whippany Athletic Club</b></a><br>
             156 Algonquin Parkway <br>
             Whippany, NJ &nbsp;07981</p>

          <p>Algonquin Parkway is conveniently located right off of route 10!</p>

          <p>EPS Training is run out of <a href="https://www.whippanyac.com">Whippany Athletic Club</a>. Click the link to learn more about the gym.</p>
        </div>

        <div class="well">
            <dl>
                <dt class="red"><span class="blue glyphicon glyphicon-earphone"></span> Call or Text:</dt>
                    <ul>
                        <li><dd><span>Whippany Athletic Club: <a href="tel:1-973-887-2496">(973) 887-2496</a></span></dd></li>
                       <li><dd><span>Cellphone: <a href="tel:1-646-717-3142">(646) 717-3142</a></span></dd></li>
                    </ul>
            </dl>

            <dl>
                <dt class="red"><span class="blue glyphicon glyphicon-globe"></span> Social Media:</dt>
                    <ul>
                        <li><dd><a href="https://www.facebook.com/Evolution-Performance-Systems-131558953564049/?fref=ts"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></dd></li>
                    <li><dd><a href="https://www.instagram.com/eps_training"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></dd></li>
                    </ul>
            </dl>     
        </div>


    <h3>The Facility:</h3>
    <p class="center"><img src="{{ url('images/WAC/Gym_001.jpg') }}" class="img-responsive" alt="Gym pic" width="800" height="700"></a></p>
  </div>

  <div class="col-sm-5">
    <h3>Gym Hours of Operation:</h3>
  
    <table class="table table-bordered table-hover">

      <tr>
        <td>Monday-Friday</td>
        <td>5:30 AM - 10:00 PM</td>
      </tr>

      <tr>
        <td>Saturday & Sunday</td>
        <td>7 AM - 7 PM</td>
      </tr>

    </table>      

    <h3 class="location-box-spacing">EPS Training Location</h3>
      
      <div id="map"></div>
      
        <script>
          function initMap() {
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: 40.825753, lng: -74.391679},
                zoom: 17
            });
            
            var marker = new google.maps.Marker({
              position: {lat: 40.825753, lng: -74.391679},
              map: map,
              title: 'Whippany Athletic Club & EPS Training'
            });

          }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSikv68Hua_l8ZcQ57n37H0nzFDocNI04&callback=initMap">
        </script>

    </div>
</div>

@stop