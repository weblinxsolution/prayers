<template>
    <div class="content-widget">
        <div class="add-five-section p-3">
            <div>
                <h4 class="mb-0 text-orange">حديث اليوم</h4>
                <p class="mb-0">
                    عن علقمة بن وقاص الليثي، يقول: سمعت عمر بن الخطاب رضي الله عنه على المنبر قال: سمعت رسول الله صلى الله عليه وسلم يقول: «إنما الأعمال بالنيات، وإنما لكل امرئ ما نوى، فمن كانت هجرته إلى دنيا يصيبها، أو إلى امرأة ينكحها، فهجرته إلى ما هاجر إليه»
                </p>
            </div>
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