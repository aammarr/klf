<template>
    <div class="col-md-12 prizes[]">
        <p v-if="!prizes.length">No Prize or Award Listed!</p>
        <div class="col-md-12">
        <div class="media" v-for="prize in prizes" :key="prize.id" style="background-color: #efefef; padding: 2em;">
            <img class="mr-3" />
            <div class="media-body">
                <div class="mt-3">
                    <!-- <a :href="prize.id"><label>Prize :</label><b>{{ prize.prize_name }}</b></a> -->
                    <ul>
                        <li><label>Prize Name:</label>{{ prize.prize_name }}</li>
                        <li><label>Prize Details:</label>{{ prize.prize_details }}</li>
                       <!--  <li><label>Avatar:</label> <img src="http://via.placeholder.com/400x100/ee0000?text=Vue+Rocks!!"></li> -->
                    </ul>
                </div>
                <p><label>Created On: </label>{{ prize.created_at }}</p>
                <!-- <td id="show-modal" @click="showModal=true;" class="btn btn-info">
                    <span class="glyphicon glyphicon-pencil"></span>  
                </td> -->
                <td @click.prevent="deletePrize(prize.id)" class="btn btn-danger">
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
            prizes: [],
            prize: {}
        }
    },
    mounted() {
        axios.get('./prizes/view').then((resp => {
            this.prizes = resp.data;
        }));
        Event.$on('added_prize', (event) => {
            this.prizes.unshift(event);
        });
    },
    methods :{
        deletePrize(id){
            axios.get('./prize/'+id+'/delete', {
            })
            .then(function (response) {
                console.log(response);
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
            location.reload();
        }
    }
}
</script>