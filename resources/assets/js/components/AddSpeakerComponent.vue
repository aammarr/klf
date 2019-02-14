<template>
    <div class="col-md-12">
        <h2>Add Speaker</h2>
        <hr>
        <form @submit="formSubmit" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Speaker Name:</label>
                         <input type="text" class="form-control" v-model="speaker_name"required="true" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Speaker Description:</label>
                        <textarea class="form-control" v-model="speaker_description" placeholder="Speaker Details Here.." ></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group ">
                        <label>Speaker Avatar:</label>
                        <input type="file" class="form-control" v-on:change="onImageChange">
                    </div>
                </div>
            </div> 
            <!-- <button class="btn btn-success">Add</button> -->
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Add</button>
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
                speaker_name: '',
                speaker_avatar: '',
                speaker_description: '',
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
            

                axios.post('/speakers/store',{
                    formData,config,
                    speaker_name: this.speaker_name, 
                    speaker_avatar: this.speaker_avatar,
                    speaker_description: this.speaker_description

                }).then(res => {
                    this.speaker = res.data;
                    Event.$emit('added_speaker', this.speaker);
                })
                .catch(function (error) {
                    console.log(error);
                });

                axios.post('/speakers/imgStore', formData, config)
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