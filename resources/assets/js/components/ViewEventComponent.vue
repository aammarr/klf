 <template>
    <div class="col-md-12 events">
        <p v-if="!events.length">No Event</p>
        <div class="col-md-12">
        <div class="media" v-for="event in events" :key="event.id" style="background-color: #efefef; padding: 2em;">
            <img class="mr-3" />
            <div class="media-body">
                <div class="mt-3">
                    <a ><label>Event Topic:</label>{{ event.event_name }}</a>
                    <ul>
                        <!-- <li><label>Id:</label>{{ event.id }}</li> -->
                        <li><label>Date :</label>{{ event.event_date }}</li>
                        <li><label>Start Time :</label>{{ event.event_startTime }}</li>
                        <li><label>Duration :</label>{{ event.event_duration }} minutes</li> 
                        <li><label>Venue :</label>{{ event.event_venue }}</li>
                        <li><label>Speaker :</label>{{ event.speaker_name }}</li>
                        <li><label>Sponsor :</label>{{ event.sponsors_name }}</li>
                        <li><label>Category :</label>{{ event.event_topic }}</li>
                        <li><label>Details :</label>{{ event.event_details }}</li>
                        <!-- <li><label>Avatar :</label>{{ event.event_avatar }}</li> -->
                    </ul>
                </div>
                <p><label>Created On : </label>{{ event.created_at }}</p>
                <!-- <td id="show-modal" @click="showModal=true;" class="btn btn-info">
                    <span class="glyphicon glyphicon-pencil"></span>  
                </td> -->
                <td @click.prevent="deleteEvent(event.id)" class="btn btn-danger">
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
            events: [],
            event: {}
        }
    },mounted() {
        console.log('Component mounted.');
        
        axios.get('/events/view').then((resp => {
            this.events = resp.data;
        }));
        Event.$on('added_event', (event) => {
            this.events.unshift(event);
        });
    },
    methods :{
        deleteEvent(id){
            axios.get('./event/'+id+'/delete', {
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
            this.events='';
            location.reload();

        }
    }
}

</script>

<modal v-if="showModal" @close="showModal=false">
    <h3 slot="header">Edit Item</h3>
    <div slot="body">
      
    </div>
    <div slot="footer">
        <button class="btn btn-default" @click="showModal = false"> Cancel </button>

      <button class="btn btn-info" @click="editItem()">
        Update
      </button>
    </div>
</modal>