<script type="text/javascript">
    
</script>

<template>
    <div class="col-md-12 abouts[]">
 
        <p v-if="!abouts.length">No About</p>
        <div v-else>
        <div class="media" v-for="about in abouts" :key="about.id" style="background-color: #efefef; padding: 2em;">
            <img class="mr-3" />
            <div class="media-body">
                <div class="mt-3">
                    <span>{{ about.about }}</span> 
                </div> <br>
                <p><label>Last Updated at:</label>{{ about.created_at }}</p>
                <!-- <button class="btn btn-warning" v-on:click="editItem(about.id)">Edit</button> -->
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
            abouts: [],
            about: {}
        }
    },
    mounted() {
        axios.get('/about/view').then((resp => {
            this.abouts = resp.data;
        }));
        Event.$on('added_about', (event) => {
            this.abouts.unshift(event);
        });
    },
    methods: {
        editItem(id)
            {
                alert(id)
            }
    }
}
</script>