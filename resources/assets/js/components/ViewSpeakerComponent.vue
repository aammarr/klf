<template>
    <div class="col-md-12 speakers[]">
        <p v-if="!speakers.length">No Speaker Listed!</p>
        <div class="col-md-12">
        <div class="media" v-for="speaker in speakers" :key="speaker.id" style="background-color: #efefef; padding: 2em;">
            <img class="mr-3" />
            <div class="media-body">
                <div style="float: right;" class="mt-1">
                        <img style="border-radius: 50px;" :src="speaker.speaker_avatar" width="200px" height="225px">
                </div>
                <div class="mt-2">
                    <!-- <a :href="speaker.id"><label>Speaker :</label><b>{{ speaker.speaker_name }}</b></a> -->
                    <ul>
                        <li><label>Name:</label>{{ speaker.speaker_name }}</li>
                        <li><label>Description:</label>{{ speaker.speaker_description }}</li>
                        <li><label>Created On: </label>{{ speaker.created_at }}</li>
                    </ul>
                </div>
                <td @click.prevent="deleteSpeaker(speaker.id)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                </td>
            </div>
        </div>
    </div>
        
    </div>
</template>

<script>
import Event from '../event.js';
export default {
    data() {
        return {
            speakers: [],
            speaker: {}
        }
    },
    mounted() {
        axios.get('/speakers/view').then((resp => {
            this.speakers = resp.data;
        }));
        Event.$on('added_speaker', (event) => {
            this.speakers.unshift(event);
        });
    },
    methods :{
        deleteSpeaker(id){
            axios.get('./speaker/'+id+'/delete', {
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
            location.reload();

        }
    }
}
</script>