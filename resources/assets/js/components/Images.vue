<template>
    <div>
        <div v-for="image in images" :key="image.id" class="mt-3" style="display: flex;">
            <div class="mt-3 mb-3">
                <picture>
                    <source 
                    :data-srcset="image.sm + ' 320w, ' + image.md + ' 480w, ' + image.lg + ' 640w'"
                    type="image/jpeg">
                <img class="lazy mb-1" 
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mOc+R8AAjcBmvywMWoAAAAASUVORK5CYII=" 
                    :data-srcset="image.sm + ' 320w, ' + image.md + ' 480w, ' + image.lg + ' 640w'" 
                        :data-src="image.lg" :alt="image.alt_text">
                </picture>
                <div class="small" v-html="image.alt_text"></div>
            </div>
            <div class="mt-3" style="width: 50%;">
                <textarea  onclick="this.focus();this.select()" readonly="readonly" style="height: 100px !important;font-size: 12px !important; line-height: 1 !important;">
                <div class="mt-3 mb-3">
                        <picture>
                            <source :data-srcset="image.sm + ' 320w, ' + image.md + ' 480w, ' + image.lg + ' 640w'" type="image/jpeg">
                        <img class="lazy mb-1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mOc+R8AAjcBmvywMWoAAAAASUVORK5CYII=" data-srcset=" image.sm 320w, image.md 480w, image.lg 640w" data-src=" image.lg" alt=" image.alt_text">
                        </picture>
                        <div class="small" v-html="image.alt_text"></div>
                        </div>
                </textarea>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                images: post.images,
            }
        },
        mounted() {
            console.log('Images component mounted.')
        }
    }
</script>
