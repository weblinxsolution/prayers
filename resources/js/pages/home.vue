<template>
    <div class="wrapper">
        <div class="row mx-0">
            <div class="col-lg-2 d-lg-block d-none">
              <AddTow/>  
            </div>
            <div class="col-lg-8 p-mb-0">
                <BannerOne/>
                <AllCountry/>
                <BannerThree/>
                <MajorCity/>
                <Advantage/>
                <MobileBanner/>
            </div>
            <div class="col-lg-2 d-lg-block d-none">
                <Sidebar/>       
                <AddThree/> 
            </div>
        </div>
    </div>
</template>
<script>
import Sidebar from '../Components/Sidebar.vue'
import BannerOne from '../Components/banner/BannerOne.vue'
import BannerThree from '../Components/banner/BannerThree.vue'
import AddTow from '../Components/banner/AddTow.vue'
import AddThree from '../Components/banner/AddThree.vue'
import AllCountry from '../Components/AllCountry.vue'
import MajorCity from '../Components/MajorCity.vue'
import Advantage from '../Components/Advantage.vue'
import MobileBanner from '../Components/banner/MobileBanner.vue'

export default {
    components: {
        BannerOne,
        Sidebar,
        AddTow,
        AddThree,
        AllCountry,
        BannerThree,
        MajorCity,
        Advantage,
        MobileBanner
    }
}
</script>