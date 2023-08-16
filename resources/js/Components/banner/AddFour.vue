<template>
    <div class="content-widget overflow-hidden">
        <div style="width: 100%;" class="add-four-div">
            <AppImage :imageSrc="AppAdd" ImageClass="w-100 add-four" />
        </div>
    </div>
</template>
<script>
import AppImage from '../Image.vue'

export default {
    data() {
        return {
            AppAdd: '/templates/banner/sss.svg'
        }
    },
    components: {
        AppImage
    }
}

</script>