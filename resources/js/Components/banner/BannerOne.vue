<template>
    <div class="content-widget d-lg-block d-none">
        <div class="row position-relative banner-one" :style="{ backgroundImage: 'url(' + bannerOne + ')' }">
            <div class="col-lg-4 col-md-6">
                <AppImage :imageSrc="banner__prayer" alt="banner" />
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="banner-one-content">
                    <p class="fs-6">احصل على تنبيه مواقيت الصلاة على هاتفك مجانًا.</p>
                    <h2>فاتتك صلاتك مرة أخرى؟ يمكن <br class="d-lg-none d-block"> أن يساعدك   <br class="d-xxl-block d-none">   تطبيق براير ناو.</h2>
                    <div class="mt-3">
                        <AppButton buttonText="تحميل براير ناو" />
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="content-widget d-lg-none d-block">
        <div class="row position-relative banner-one" :style="{ backgroundImage: 'url(' + bannerOne2 + ')' }">
            <div class="col-lg-4 col-md-6">
                <AppImage :imageSrc="banner__prayer" alt="banner" />
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="banner-one-content">
                    <p class="fs-6">احصل على تنبيه مواقيت الصلاة على هاتفك مجانًا.</p>
                    <h2>فاتتك صلاتك مرة أخرى؟ يمكن <br class="d-lg-none d-block"> أن يساعدك   <br class="d-xxl-block d-none">   تطبيق براير ناو.</h2>
                    <div class="mt-3">
                        <AppButton buttonText="تحميل براير ناو" />
                    </div>
                </div>
            </div>  
        </div>
    </div>
</template>
<script>
import AppImage from '../Image.vue'
import AppButton from '../Button.vue'
export default {
    data() {
        return {
            banner__prayer: 'templates/banner/prayer.svg',
            bannerOne: 'templates/banner/banner-one.png',
            bannerOne2: 'templates/banner/banner-one2.png'
        }
    },
    components: {
        AppImage,
        AppButton
    }
}
</script>