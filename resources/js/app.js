import Vue from 'vue';
import axios from 'axios';

import CreatePost from './components/CreatePost.vue';
import EditPost from './components/EditPost.vue';
import EditProfile from './components/EditProfile.vue';



const app = new Vue({
    el: '#app',
    components: {CreatePost, EditPost, EditProfile}
});
