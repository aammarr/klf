<template>
    <div class="col-md-4 users">
        <p v-if="!users.length">No User</p>
        <div v-else>
        <div class="media" v-for="user in users" :key="users.id">
            <img class="mr-3" />
            <div class="media-body">
                <div class="mt-3">
                    <a :href="user.id">{{ user.full_name }}</a> | {{ user.email }}
                </div>
                <p>{{ user.created_at }}</p>
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
            users: [],
            user: {}
        }
    },
    mounted() {
        axios.get('/users/view').then((resp => {
            this.users = resp.data;
        }));
        Event.$on('added_user', (event) => {
            this.users.unshift(event);
        });
    }
}
</script>