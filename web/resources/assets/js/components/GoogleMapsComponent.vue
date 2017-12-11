<template>
	<div>
		<div class="google-map" :id="map_name" :style="styles"></div>
		<button class="btn btn-primary" @click="geoLocation()">Get current location</button>
	</div>
</template>

<script>
export default {
	name: 'google-maps',
	props:{
		name: {required : true},
		width: {Number},
		height: {Number},
	},
	data () {
		return {
			infoWindow: null,
			map: null,
			markers: [],
			styles : {
				width : this.get_width(),
				height : this.get_height(),
			}
		}
	},
	computed:{
		map_name(){
			return this.name + "-map";
		},
	},
	mounted() {
	    const element = document.getElementById(this.map_name)
	    const options = {
		    zoom: 14,
		    center: new google.maps.LatLng(7.292501, 80.634192)
	    }
	    this.map = new google.maps.Map(element, options);
	    this.infoWindow = new google.maps.InfoWindow;

  	},
  	methods:{
  		get_width(){
			return this.width + 'px';
		},

		get_height(){
			return this.height + 'px';
		},

		geoLocation(){
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition((position) => {
					var pos = {
		              lat: position.coords.latitude,
		              lng: position.coords.longitude
		            };

		            this.map.setCenter(pos);
		            this.renderMarker(pos, true);
				}, (err) => {

				});
			}else{
				this.handleLocationError(false, this.infoWindow, this.map.getCenter())
			}
		},

		renderMarker(coordinate, draggable=false){
			const marker = new google.maps.Marker({
				position: coordinate,
				map: this.map,
				draggable: draggable,
				animation: google.maps.Animation.DROP,
			});
			this.markers.push(marker);
		},

		handleLocationError(browserHasGeolocation, infoWindow, pos) {
        this.infoWindow.setPosition(pos);
        this.infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(this.map);
      }
  	}
}
</script>

<style lang="css" scoped>
	.google-map {
	  background: gray;
	}
</style>