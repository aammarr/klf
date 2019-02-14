<template>
    <div class="col-md-12">
        <h2>Add Sponsor</h2>
        <hr>
         <form @submit="formSubmit" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Sponsor Name:</label>
                         <input type="text" class="form-control" v-model="sponsor_name" required="true">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Sponsor Description:</label>
                        <textarea class="form-control" v-model="sponsor_description" placeholder="Sponsor Description" ></textarea>
                    </div>
                </div>
               <div class="col-md-12">
                    <div class="form-group ">
                        <label>Sponsor Avatar:</label>
                        <input type="file" class="form-control" v-on:change="onImageChange">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</template>


<script>
import Event from '../event.js';
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                name: '',
                image: '',
                sponsor_name: '',
                sponsor_avatar: '',
                sponsor_description: '',
                success: ''
            };
        },
        methods: {
            onImageChange(e){
                console.log(e.target.files[0]);
                this.image = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
 
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
                let formData = new FormData();
                formData.append('image', this.image);
                
               axios.post('./sponsors/store', {
                    sponsors_name: this.sponsor_name,
                    sponsor_description: this.sponsor_description, 
                    sponsors_avatar: this.sponsors_avatar
            
                    }).then(res => {
                        this.event = res.data;
                        Event.$emit('added_sponsor', this.event);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                axios.post('/sponsors/imgStore', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
                location.reload();
            }
        }
    }
</script>
