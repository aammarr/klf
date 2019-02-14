<template>
    <div class="col-md-12">
        <h2>Add Prize Or Award</h2>
        <hr>
        <form  method="POST" @submit.prevent="addPrize()">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Prize Name:</label>
                         <input type="text" class="form-control" v-model="prize_name" required="true">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Prize Details:</label>
                        <textarea class="form-control" v-model="prize_details" placeholder="Prize Details Here.." ></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- <div class="form-group">
                        <label>Prize Avatar:</label>
                        <input type="text" class="form-control" v-model="prize_avatar" />
                    </div> -->
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
    data(){
        return{
          prize_name: '',
          prize_details: '',
          prize_avatar: ''
        }
    },
    methods: {
        addPrize(){
        axios.post('./prizes/store', {
                prize_name: this.prize_name,
                prize_details: this.prize_details, 
                prize_avatar: this.prize_avatar
                
            }).then(res => {
                this.event = res.data;
                Event.$emit('added_prize', this.event);
            })
            .catch(function (error) {
                console.log(error);
            });
            location.reload();
        }
  }
}
</script>