<template>
    <div class="content-widget">
        <div class="row">
            <div class="col-lg-12 p-4">
                <h4 class="text-theme mb-0 rtl fw-700">أحدث قوائم التشغيل</h4>
            </div>
            <div class="col-lg-12">
                <div class="row gap-3 pb-4 playlist-row">
                    <div class="col-lg-12 d-flex gap-4">
                        <div class="playlist-box">
                            <div>
                                <AppImage :imageSrc="playlistImg" />
                            </div>
                            <div>
                                <h5>قائمة تشغيل قرأن جديدة</h5>
                                <span>ماهر المعيقلي</span>
                            </div>
                        </div>
                        <div class="playlist-box">
                            <div>
                                <AppImage :imageSrc="playlistImg" />
                            </div>
                            <div>
                                <h5>قائمة تشغيل قرأن جديدة</h5>
                                <span>ماهر المعيقلي</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex gap-4">
                        <div class="playlist-box">
                            <div>
                                <AppImage :imageSrc="playlistImg" />
                            </div>
                            <div>
                                <h5>قائمة تشغيل قرأن جديدة</h5>
                                <span>ماهر المعيقلي</span>
                            </div>
                        </div>
                        <div class="playlist-box">
                            <div>
                                <AppImage :imageSrc="playlistImg" />
                            </div>
                            <div>
                                <h5>قائمة تشغيل قرأن جديدة</h5>
                                <span>ماهر المعيقلي</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex gap-4">
                        <div class="playlist-box">
                            <div>
                                <AppImage :imageSrc="playlistImg" />
                            </div>
                            <div>
                                <h5>قائمة تشغيل قرأن جديدة</h5>
                                <span>ماهر المعيقلي</span>
                            </div>
                        </div>
                        <div class="playlist-box">
                            <div>
                                <AppImage :imageSrc="playlistImg" />
                            </div>
                            <div>
                                <h5>قائمة تشغيل قرأن جديدة</h5>
                                <span>ماهر المعيقلي</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import AppImage from './Image.vue';
export default {
    data() {
        return {
            playlistImg: '/templates/playlists/playlist.png'
        }
    },
    components: {
        AppImage
    }
}
</script>