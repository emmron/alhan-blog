
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.config.devtools = true;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('images', require('./components/Images.vue'));

const app = new Vue({
    el: '#app',
    // components: [images],
    data: {
        post: post,
        isEditor: isEditor,
        imageFile: '',
        altText: '',
        images: post.images
    },
    methods: {
        getImage(event) {
            console.log(event); 
            this.imageFile = event.target.files[0];
        },
        uploadImage() {
            var $this = this;
            if ($this.imageFile) {
                var formData = new FormData();
                formData.append('imageFile', this.imageFile);
                formData.append('altText', this.altText);
                axios.post('/posts/' + $this.post.id + '/images',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data' 
                    }
                })
                .then(response => {
                    $this.images.push(response.data)
                })
                .catch(e => {
                    console.log(e.response)
                })
            }
        }
    },
    mounted() {
        $this = this;
        // window.timing.printSimpleTable();
        if (!this.isEditor) {
            document.onkeypress = function(e) {
                e = e || window.event;
                var charCode = (typeof e.which == "number") ? e.which : e.keyCode;
                if (charCode === 101) {
                    document.getElementById('editLink').click();
                }
            }
            if (this.post) {
                window.addEventListener('storage', function(e) {  
                    $this.post = JSON.parse(e.newValue);
                });
            }
        }
        else {
            document.onkeypress = _.debounce(function() {
                localStorage.setItem('post_' + $this.post.id, JSON.stringify($this.post));
            },500)
            // this.images = images;
        }
        
        
        
    }
});
