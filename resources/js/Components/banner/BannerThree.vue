<template>
    <div class="content-widget bg-transparent border-0">
        <div class="w-100 d-lg-block d-none">
            <div class="row justify-content-between">
                <div class="banner-col">
                    <AppImage :imageSrc="banner1" ImageClass="p-0" />
                </div>
                <div class="banner-col">
                    <AppImage :imageSrc="banner2" ImageClass="p-0" />
                </div>
                <div class="banner-col">
                    <AppImage :imageSrc="banner3" ImageClass="p-0" />
                </div>
            </div>
        </div>
        <div class="d-lg-none d-block">
            <div id="carouselExampleControls" class="carousel slide three-banner-slider" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <AppImage :imageSrc="banner1" ImageClass="w-100" />
                    </div>
                    <div class="carousel-item">
                        <AppImage :imageSrc="banner2" ImageClass="w-100" />
                    </div>
                    <div class="carousel-item">
                        <AppImage :imageSrc="banner3" ImageClass="w-100" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</template>
<script>

import AppImage from '../Image.vue'

export default {
    data() {
        return {
            banner1: '/templates/banner/banner1.png',
            banner2: '/templates/banner/banner2.png',
            banner3: '/templates/banner/banner3.png'

        }
    },
    components: {
        AppImage
    }
}
</script>