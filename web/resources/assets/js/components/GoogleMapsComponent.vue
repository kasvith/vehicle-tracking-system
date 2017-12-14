<template>
	<div>
		<div class="google-map" :id="map_name" :style="styles"></div>
		<form :action="add_entry_endpoint" @submit="addEntry" method="get" v-show="add_entry === true" class="form">
			<input type="hidden" name="lat" v-model="lat" required/>
			<input type="hidden" name="lng" v-model='lng' required/>
			<input type="hidden" name="location" v-model="location" required>
			<div class="info" v-show="location">Location : {{ location }}</div>
			<textarea name="note" id="" cols="60" rows="8" class="form-control mt-1" placeholder="Take a note" required></textarea>
			<a class="btn btn-success" @click="geoLocation()">Get current location</a>
			<button class="btn btn-primary">Add new entry</button>
		</form>
	</div>
</template>

<script>
export default {
	name: 'google-maps',
	props:{
		name: {required : true},
		width: {Number},
		height: {Number},
		add_entry: {required : true},
		add_entry_endpoint: {String},
		locations: {type: Array},
		zoom: {type : Number, default: 7}
	},
	data () {
		return {
			infoWindow: null,
			map: null,
			markers: [],
			location_marker: false,
			locationEntry: {},
			lat: null,
			lng: null,
			note: '',
			location:'',
			geocoder: null,
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
		    zoom: this.zoom,
		    center: new google.maps.LatLng(7.292501, 80.634192)
	    }

	    this.map = new google.maps.Map(element, options);
	    this.infoWindow = new google.maps.InfoWindow;
	    this.geocoder = new google.maps.Geocoder;

	    if (this.add_entry === true) {
	    	this.geoLocation()
	    }else{
	    	this.renderAll()
	    }
	    
  	},
  	methods:{
  		get_width(){
			return this.width + 'px';
		},

		get_height(){
			return this.height + 'px';
		},

		addEntry(){
			if (this.lat == null || this.lng == null) {
				alert('Please select the location')
				event.preventDefault()
			}
		},

		renderAll(){
			if (this.locations) {
				//this.locations = JSON.parse(this.locations)
				this.locations.forEach((location) => {
					let pos = {
						lat: location.lat,
						lng: location.lng,
					}

					let marker = this.renderMarker(pos, location.created_at)
					let content = '<div id="content">'+ location.note +'</div>'
					let infowindow = new google.maps.InfoWindow
					google.maps.event.addListener(marker, 'click', ((marker,content,infowindow) => {
						return function(){
							infowindow.setContent(content)
							infowindow.open(this.map, marker)
						}
					})(marker,content,infowindow));
				})
			}
		},

		geoLocation(){
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition((position) => {
					var pos = {
		              lat: position.coords.latitude,
		              lng: position.coords.longitude
		            };
		            this.map.setCenter(pos);

		            if (this.location_marker) {
		            	let latlng = new google.maps.LatLng(pos.lat, pos.lng)
		            	this.location_marker.setPosition(latlng)
		            	this.getLocationName(pos)
		            	return
		            }

		            this.location_marker = this.renderMarker(pos, true);
		            this.location_marker.addListener('dragend', (e) => {
		            	this.getLocationName(e.latLng)
		            })
		            this.getLocationName(pos);
				}, (err) => {
					alert('something went wrong');
				});
			}else{
				this.handleLocationError(false, this.infoWindow, this.map.getCenter())
			}
		},

		getLocationName(location){
			this.lat = location.lat;
		    this.lng = location.lng;
			this.geocoder.geocode({'location' : location}, (res, stat) => {
				if (stat === 'OK') {
					this.location = res[0].formatted_address;
				}else{
					console.log(stat)
				}
			});
		},

		renderMarker(coordinate, title="Current Location" ,draggable=false){
			const marker = new google.maps.Marker({
				position: coordinate,
				map: this.map,
				draggable: draggable,
				animation: google.maps.Animation.DROP,
				title: title
			});

			this.markers.push(marker);
			return marker;
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