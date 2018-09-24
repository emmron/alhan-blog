<template>
    <div>
        <div v-for="image in images" :key="image.id" class="mt-3" style="display: flex;">
            <div class="post-image mt-3 mb-3" :data-id="'image_' + image.id">
                <picture>
                    <source 
                        :media="'(min-width:' + 480 + 'px)'" 
                        type="image/webp"
                        :data-srcset="'/images/posts/' + image.file_basename + '_lg.webp'">
                    <source 
                        :media="'(max-width:' + 480 + 'px)'" 
                        type="image/webp"
                        :data-srcset="'/images/posts/' + image.file_basename + '_md.webp'">
                    <source 
                        :media="'(max-width:' + 380 + 'px)'"
                        type="image/webp"
                        :data-srcset="'/images/posts/' + image.file_basename + '_sm.webp'">
                    <source 
                        :media="'(min-width:' + 480 + 'px)'" 
                        type="image/jpeg"
                        :data-srcset="'/images/posts/' + image.file_basename + '_lg.jpg'">
                    <source 
                        :media="'(max-width:' + 480 + 'px)'" 
                        type="image/jpeg"
                        :data-srcset="'/images/posts/' + image.file_basename + '_md.jpg'">
                    <source 
                        :media="'(max-width:' + 380 + 'px)'"
                        type="image/jpeg"
                        :data-srcset="'/images/posts/' + image.file_basename + '_sm.jpg'">
                    <img 
                        class="lazy"
                        style="width:100%;height:300px;"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mOc+R8AAjcBmvywMWoAAAAASUVORK5CYII="  
                        data-style="" 
                        data-src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mOc+R8AAjcBmvywMWoAAAAASUVORK5CYII="
                        :alt="image.alt_text">
                </picture>
                <div class="small" v-html="image.alt_text"></div>
            </div>
            <div class="mt-3" style="width: 50%;">
                <textarea :data-id="'image_' + image.id" onclick="this.focus();this.select()" readonly="readonly" style="height: 100px !important;font-size: 12px !important; line-height: 1 !important;">
                    
                </textarea>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                images: postImages,
            }
        },
        watch: {
            images: function() {
                var $this = this;
                setTimeout(function() {
                    $this.showEmbedHTML();
                    window.yall();
                }, 1000)
            }
        },
        methods: {
            showEmbedHTML() {
                document.querySelectorAll('.post-image').forEach(element => {
                    document.querySelector('textarea[data-id="' + element.dataset.id + '"]').innerHTML = element.outerHTML;
                });
            }
        },
        mounted() {
            this.showEmbedHTML();
        }
    }
</script>
