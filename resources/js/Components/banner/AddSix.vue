<template>
    <div class="content-widget overflow-hidden">
        <AppImage :imageSrc="AppAdd" ImageClass="w-100" />
    </div>
</template>
<script>
import AppImage from '../Image.vue'

export default {
    data() {
        return {
            AppAdd: '/templates/banner/banner3.png'
        }
    },
    components: {
        AppImage
    }
}

</script>