<template>
    <div>
        <div class="content-widget mx-sm-0 rounded-sm-0 bg-sm-transparent d-lg-block d-none">
            <div class="row mobile-banner-section">
                <div class="col-lg-7 d-flex align-items-end">
                    <AppImage :imageSrc="mobile_banner_Img" />
                </div>
                <div class="col-lg-5">
                    <p class="fs-6 fw-400">احصل على تنبيه مواقيت الصلاة على هاتفك مجانًا.</p>
                    <h3 class="fw-700">فاتتك صلاتك مرة أخرى؟ يمكن أن يساعدك تطبيق براير ناو.</h3>
                    <div class="d-flex gap-4  mt-lg-5 mt-3">
                        <AppImage :imageSrc="googlePlay" />
                        <AppImage :imageSrc="appStore" />
                    </div>
                </div>
            </div>
        </div>
        <div class="content-widget mx-sm-0 rounded-sm-0 bg-sm-transparent d-lg-none d-block">
            <div class="row mobile-banner-section">
                <div class="col-lg-7 d-flex align-items-end">
                    <AppImage :imageSrc="mobile_banner_Img2" />
                </div>
                <div class="col-lg-5">
                    <p class="fs-6 fw-400">احصل على تنبيه مواقيت الصلاة على هاتفك مجانًا.</p>
                    <h3 class="fw-700">فاتتك صلاتك مرة أخرى؟ يمكن أن يساعدك تطبيق براير ناو.</h3>
                    <div class="d-flex gap-4  mt-lg-5 mt-3">
                        <AppImage :imageSrc="googlePlay" />
                        <AppImage :imageSrc="appStore" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import AppImage from '../Image.vue'
export default {
    data() {
        return {
            mobile_banner_Img: 'templates/banner/mobile-banner.png',
            appStore: 'templates/images/app-store.png',
            googlePlay: 'templates/images/google-play.png',
            mobile_banner_Img2: 'templates/banner/mobile-banner2.png'
        }
    },
    components: {
        AppImage
    }

}
</script>