<template>
    <div class="content-widget">
        <div class="row p-4">
            <div class="col-lg-12">
                <h4 class="text-theme mb-0 fw-700 rtl">مواضيع رائجة</h4>
            </div>
        </div>
        <div class="row p-4 mb-2 px-3 pt-0 gap-lg-0 gap-3 article-row">
            <div class="col-4">
                <div class="article-box">
                    <div class="article-img">
                        <AppImage :imageSrc="Artcile_img" ImageClass="w-100" />
                    </div>
                    <div class="article-body">
                        <h4 class="text-black rtl">المحافظة على أخوة الدين</h4>
                        <p>
                            فما أصاب المسلمين اليوم من التأخر وقد كانوا فيما مضى سادة العام نتيجة للتفرق والاختلاف وركونهم
                            إلى الدنيا وزخارفها والاشتغال
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="article-box">
                    <div class="article-img">
                        <AppImage :imageSrc="Artcile_img" ImageClass="w-100" />
                    </div>
                    <div class="article-body">
                        <h4 class="text-black rtl">المحافظة على أخوة الدين</h4>
                        <p>
                            فما أصاب المسلمين اليوم من التأخر وقد كانوا فيما مضى سادة العام نتيجة للتفرق والاختلاف وركونهم
                            إلى الدنيا وزخارفها والاشتغال
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="article-box">
                    <div class="article-img">
                        <AppImage :imageSrc="Artcile_img" ImageClass="w-100" />
                    </div>
                    <div class="article-body">
                        <h4 class="text-black rtl">المحافظة على أخوة الدين</h4>
                        <p>
                            فما أصاب المسلمين اليوم من التأخر وقد كانوا فيما مضى سادة العام نتيجة للتفرق والاختلاف وركونهم
                            إلى الدنيا وزخارفها والاشتغال
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import AppImage from './Image.vue'

export default {
    data() {
        return {
            Artcile_img: 'templates/articles/article1.jpg'
        }
    },
    components: {
        AppImage
    }
}
</script>