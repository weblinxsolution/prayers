<template>
    <div>
        <HeaderVue />
        <router-view></router-view>
        <FooterVue />
        <MobileSidebar />
    </div>
</template>
<script>
import HeaderVue from "../Components/layout/Header.vue";
import FooterVue from '../Components/layout/Footer.vue'
import Home from '../pages/home.vue'
import MobileSidebar from "../Components/MobileSidebar.vue";

export default {
    name: 'app',
    components: {
        HeaderVue,
        FooterVue,
        Home,
        MobileSidebar,
    }
}
</script>