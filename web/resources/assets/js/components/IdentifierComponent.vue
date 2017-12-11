<template>
	<div class="card" style="width: 20rem;">
		<div class="card-header">
			Identify vehicle
		</div>
		<form class="form" :action="action" :method="method">
			<div class="card-body">
				<div class="card-text">
					<div class="m-1" :class="{ error : hasError }">
						<div v-if="image">
							<button type="button" @click="reset" class="btn btn-outline-danger btn-sm float-right m-1">Remove</button>
							<img class="card-img-top img-thumbnail" :src="image" alt="Image" />
							<div v-if="hasError" class="error-box text-center text-white">{{ error_message }}</div>
						</div>
						<div v-if="!image">
							<label class="custom-file">
									<input type="file" class="custom-file-input"  name="image" @change="onFileChange">
									<span class="custom-file-control"></span>
							</label>
						</div>
					</div>
					<div class="form-group m-1 text-center">
						<input type="text" class="form-control" name="vehicle_id" v-model="vehicle_id" placeholder="or enter number manually">
						<button type="submit" class="btn btn-primary mt-1 align-content-center pt-1" :disabled="!vehicle_id">Proceed...</button>
					</div>
				</div>
	
			</div>
	
		</form>
	</div>
</template>

<script>
	const config = {
		headers: {
			'content-type': 'multipart/form-data',
			"Access-Control-Allow-Origin": "*",
		}
	}
	
	export default {
		props: {
			'action' : {
		      	type: String,
		      	required: true
	    	},
	    	'method':{
	    		type: String,
	    		required: true,
	    	}
		},
		data() {
			return {
				vehicle_id: '',
				data: new FormData(),
				image: '',
				hasError: false,
				error_message: '',
			}
		},
		methods: {
			onFileChange(e) {
				var files = e.target.files || e.dataTransfer.files;
				if (!files.length)
					return;
				this.createImage(files[0]);
				this.data.append('image', files[0]);
				this.onSubmit();
			},
			createImage(file) {
				var image = new Image();
				var reader = new FileReader();
				var vm = this;
	
				reader.onload = (e) => {
					vm.image = e.target.result;
				};
				reader.readAsDataURL(file);
			},
			onSubmit() {
				axios.post(identity_server_uri, this.data, config)
					.then(res => {
						if (res.data.error === 'true') {
							this.hasError = true;
							this.vehicle_id = '';
							this.error_message = res.data.message;
						}else{
							this.hasError = false;
							this.vehicle_id = res.data.payload;
						}
						
					})
					.catch(err => {
						alert('Server unavaliable');
						this.reset();
					})
			},
			reset(){
				this.hasError = false;
				this.error_message = '';
				this.image = null;
				this.vehicle_id = '';
				this.data = new FormData();
			}
		}
	}
</script>

<style lang="scss" scoped>
	.error{
		img{
			border-color: #AA3939;
		}
	}

	.error-box{
		background-color: #AA3939;
		margin: 5px;
	}
</style>


