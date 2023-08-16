<template>
    <div class="content-widget">
        <div class="add-three-section p-3 py-0 pt-4">
            <div>
                <h4 class="mb-0">مساحة إعلانية</h4>
                <p class="">
                    لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. 
                </p>
                <AppButton buttonClass="yellow-btn" buttonText="إبدأ الأن"/>
            </div>
            <AppImage :imageSrc="addThree" imageClass="mt-5"/>
        </div>
    </div>
</template>
<script>

import AppImage from '../Image.vue'
import AppButton from '../Button.vue'

export default{
    data(){
        return{
            addThree:'templates/banner/add-three.png'
        }
    },
    components:{
        AppImage,
        AppButton
    }
}


</script>