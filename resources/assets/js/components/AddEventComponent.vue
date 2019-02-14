<template>
    <div class="col-md-12">
        <h2>Add Event</h2>
        <hr>
         <form   @submit.prevent="addEvent">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Event Name</label>
                    <input class="form-control" type="text" v-model="event_name" placeholder="Event Name" required="true"/>
                </div>
                <div class="form-group">
                    <label>Event Date</label>
                    <input class="form-control" type="Date" v-model="event_date"  required="true"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Event Start Time</label>
                    <input class="form-control" type="time" v-model="event_start_time"  required="false"/>
                </div>
                <div class="form-group">
                    <label>Event Duration (eg: 30 min)</label>
                    <input class="form-control" type="number" v-model="event_duration" placeholder="90 min" required="false"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Event Venue</label>
                    <input class="form-control" type="text" v-model="event_venue" placeholder="Jasmin Hall, Beach Luxury" required="true" />
                </div>
                <div class="form-group">
                    <label>Event Speaker</label>
                    <select v-model="speaker_id" class="form-control">
                        <option value="Null">Select Speaker</option>
                        <option value="Null">No Speaker</option>
                        <option v-for="speaker in speakers" :value="speaker.id">{{ speaker.speaker_name }}</option>
                    </select>
    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Event Sponsor</label>
                    <select v-model="sponsor_id" class="form-control" >
                        <option value="Null">Select Sponsor</option>
                        <option value="Null">No sponsor</option>
                        <option v-for="sponsor in sponsors" :value="sponsor.id">{{ sponsor.sponsors_name }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Event Category</label>
                    <!-- <input class="form-control" type="text" v-model="event_topic" placeholder="Story Telling"  /> -->
                     <select v-model="category" class="form-control" >
                        <option>Select Category</option>
                        <option value="Category_1">Category 1</option>
                        <option value="Category_2">Category 2</option>
                        <option value="Category_3">Category 3</option>
                        <option value="Category_4">Category 4</option>
                        <option value="Category_5">Category 5</option>
                        <option value="Category_6">Category 6</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Event Detail</label>
                    <input class="form-control" type="text" v-model="event_detail"  />
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Event Moderator</label>
                    <input class="form-control" type="text" v-model="event_moderator"  />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group text-center">
                    <button class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>        
    </div>
</template>

<script>
import Event from '../event.js';
export default {
    data() {
        return {
            speakers: [],
            sponsors: [],
            event_name:'',
            event_date:'',
            event_start_time:'',
            event_duration:'',
            event_venue:'',
            speaker_id:'',
            sponsor_id:'',
            event_topic:'',
            event_detail:'',
            event_avatar:'',
            event: []

        }
    },
    methods: {
        addEvent() {
             axios.post('/events/store', {
                event_name : this.event_name,
                event_date : this.event_date,
                event_start_time : this.event_start_time,
                event_duration : this.event_duration,
                event_venue : this.event_venue,
                speaker_id : this.speaker_id,
                sponsor_id : this.sponsor_id,
                event_topic : this.event_topic,
                event_detail : this.event_detail,
                event_avatar : this.event_avatar,
                event: this.event_name

            }).then(res => {
                this.event = res.data;
                Event.$emit('added_event', this.event);
            }).catch(e => {
                console.log(e);
            });
            location.reload();
        }
    },
    mounted() {
        axios.get('/speakers/view').then((resp => {
            this.speakers = resp.data;
        }));
        axios.get('/sponsors/view').then((resp => {
            this.sponsors = resp.data;
        }));
    }
}
</script>