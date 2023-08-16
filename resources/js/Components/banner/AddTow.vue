<template>
    <div class="content-widget">
        <div class="add-tow-section p-3 pt-4">
            <div>
                <h4 class="mb-0">مساحة إعلانية</h4>
                <p>
                    لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. 
                </p>
            </div>
            <AppImage :imageSrc="addTow" imageClass="mt-5"/>
        </div>
    </div>
</template>
<script>

import AppImage from '../Image.vue'

export default{
    data(){
        return{
            addTow:'templates/banner/add-tow.png'
        }
    },
    components:{
        AppImage
    }
}


</script>