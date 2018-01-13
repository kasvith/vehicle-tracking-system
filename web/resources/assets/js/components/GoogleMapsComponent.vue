<template>
	<div>
		<div class="google-map" :id="map_name" :style="styles">
		</div>
		<div v-if="addEntryEndpoint">
			<form :action="addEntryEndpoint" @submit="addEntry" method="post" class="form">
				<input type="hidden" name="lat" v-model="lat" required/>
				<input type="hidden" name="lng" v-model='lng' required/>
				<input type="hidden" name="_token" :value="token"/>
				<input type="hidden" name="location" v-model="location" required>
				<div class="p-1 m-1 text-center"><h6>Location : <b> {{ location }} </b></h6></div>
				<textarea name="note" rows="8" class="form-control p-1" v-model="note" placeholder="Take a note" required></textarea>
				<div class="text-center p-1 m-1">
					<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Entry</button>
					<button class="btn btn-danger" @click.prevent="clear"><i class="fa fa-eraser"></i> Clear</button>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
export default {
	name: 'google-maps',
	props:{
		name: {required : true},
		width: {String, default: '100%'},
		height: {String, default:'600px'},
		addEntryEndpoint: {String},
		locs: {type: String},
		zoom: { default: 8},
		token: {type : String, default: ''},
	},
	data () {
		return {
		    loaded: false,
			infoWindow: null,
			map: null,
			markers: [],
			location_marker: false,
			locationEntry: {}, 
			lat: null,
			lng: null,
			note: '',
			location:'Locating...',
			geocoder: null,
			styles : {
				height : this.get_height(),
				width: this.get_width(),
			}
		}
	},
	computed:{
		map_name(){
			return this.name + "-map";
		},
		locations(){
		    return JSON.parse(this.locs);
		}
	},
	created() {
	  	window.bus.$on('loadMaps', this.init)
	},
  	methods:{
        init() {
            const element = document.getElementById(this.map_name)
            const options = {
                zoom: this.zoom,
                center: new google.maps.LatLng(7.292501, 80.634192)
            }

            this.map = new google.maps.Map(element, options);
            this.infoWindow = new google.maps.InfoWindow;
            this.geocoder = new google.maps.Geocoder;

            if (this.addEntryEndpoint) {
                var centerControlDiv = document.createElement('div');
                var centerControl = new this.CenterControl(centerControlDiv, this.map);

                centerControlDiv.index = 1;
                this.map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
                this.geoLocation()
            }else{
                this.renderAll()
            }


        },
  		get_width(){
			return this.width;
		},
		get_height(){
			return this.height;
		},
		CenterControl(controlDiv, map) {
	        // Set CSS for the control border.
	        var controlUI = document.createElement('div');
	        controlUI.style.backgroundColor = '#fff';
	        controlUI.style.border = '2px solid #fff';
	        controlUI.style.borderRadius = '3px';
	        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
	        controlUI.style.cursor = 'pointer';
	        controlUI.style.margin = '5px';
	        controlUI.style.textAlign = 'center';
	        controlUI.title = 'Click to find your location';
	        controlDiv.appendChild(controlUI);

	        // Set CSS for the control interior.
	        var controlText = document.createElement('div');
	        controlText.style.color = 'rgb(25,25,25)';
	        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
	        controlText.style.fontSize = '16px';
	        controlText.style.lineHeight = '38px';
	        controlText.style.paddingLeft = '5px';
	        controlText.style.paddingRight = '5px';
	        controlText.innerHTML = '<i class="fa fa-location-arrow" aria-hidden="true"></i> My Location';
	        controlUI.appendChild(controlText);

	        // Setup the click event listeners: simply set the map to Chicago.
	        controlUI.addEventListener('click', this.geoLocation);
      	},

		addEntry(){
			if (this.lat == null || this.lng == null || this.location == 'Locating...') {
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

					// we will need to change this later
					let marker = this.renderMarker(pos, location.created_at, false);
					let content = '<div id="content">' + '<h5>'+ location.created_at +'</h5>' + location.note +'</div>';
					let infowindow = new google.maps.InfoWindow;

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

		            this.location_marker = this.renderMarker(pos,'Current Location' ,true);
		            this.location_marker.addListener('dragend', (e) => {
		            	let pos = {
		            		lat : e.latLng.lat(),
		            		lng : e.latLng.lng()
		            	}
		            	this.getLocationName(pos);
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
		    this.location = 'Locating...';
			this.geocoder.geocode({'location' : location}, (res, stat) => {
				if (stat === 'OK') {
					this.location = res[0].formatted_address;
				}else{
					console.log(stat)
				}
			});
		},

		renderMarker(coordinate, title ,draggable){
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
      	},

      	clear(){
      		this.note = '';
      		this.location = 'Locating...';
      		this.geoLocation();
      	}
  	}
}
</script>

<style lang="css" scoped>
	.google-map {
	  background: gray;
	}
</style>