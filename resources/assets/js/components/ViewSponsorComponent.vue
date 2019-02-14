<template>
    <div class="col-md-12 sponsors[]"> 
        <p v-if="!sponsors.length">No Sponsor Listed!</p>
        <div class="col-md-12">
        <div class="media" v-for="sponsor in sponsors" :key="sponsor.id" style="background-color: #efefef; padding: 2em;">
            <img class="mr-3" />
            <div class="media-body">
                <div style="float: right;" class="mt-1">
                        <img style="border-radius: 50px;" :src="sponsor.sponsors_avatar" width="200px" height="225px">
                </div>
                <div class="mt-3">
                    <!-- <h4><label>Sponsor :</label><b>{{ sponsor.sponsors_name }}</b></h4> -->
                    <ul>
                        <li><label>Name:</label>{{ sponsor.sponsors_name }}</li>
                        <li><label>Description:</label>{{ sponsor.sponsors_description }}</li>
                        <!-- <li>
                            <label>Avatar:</label>
                            <img style="border-radius: 10em;width: 80px;" src="https://via.placeholder.com/150">
                        </li> -->
                    </ul>
                </div>
                <p><label>Created On: </label>{{ sponsor.created_at }}</p>
                <!-- <td id="show-modal" @click="showModal=true;" class="btn btn-info">
                    <span class="glyphicon glyphicon-pencil"></span>  
                </td> -->
                <td @click.prevent="deleteSponsor(sponsor.id)" class="btn btn-danger">
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
            sponsors: [],
            sponsor: {}
        }
    },
    mounted() {
        axios.get('/sponsors/view').then((resp => {
            this.sponsors = resp.data;
        }));
        Event.$on('added_sponsor', (event) => {
            this.sponsors.unshift(event);
        });
    },
    methods :{
        deleteSponsor(id){
            axios.get('./sponsor/'+id+'/delete', {
            })
            .then(function (response) {
                console.log(response);
                this.sponsors.splice(id, 1);
            })
            .catch(function (error) {
                console.log(error);
            });
            location.reload();

        }
    }
}
</script>