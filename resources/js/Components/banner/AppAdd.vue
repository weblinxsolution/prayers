<template>
        <AppImage :imageSrc="AppAdd" ImageClass="w-100" />
</template>
<script>
    import AppImage from '../Image.vue'

    export default{
        data(){
            return{
                AppAdd:'/templates/banner/app-add.svg'
            }
        },
        components:{
            AppImage
        }
    }

</script>