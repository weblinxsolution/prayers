<template>
    <div class="wrapper">
        <div class="row mx-0">
            <div class="col-lg-2 d-lg-block d-none">
                <AddFive />
                <AddTow />
            </div>
            <div class="col-lg-8 p-mb-0">
                <AddFour />
                <SurratPlay />
                <SurratBox />
                <MorePlayList/>
                <BannerOne />
                <BannerThree />
                <Advantage />
                <MobileBanner />
            </div>
            <div class="col-lg-2 d-lg-block d-none">
                <Sidebar />
                <AddThree />
                <AddSix/>
            </div>
        </div>
    </div>
    <ShareModal />
</template>
<script>

import Sidebar from '../Components/Sidebar.vue'
import BannerOne from '../Components/banner/BannerOne.vue'
import BannerThree from '../Components/banner/BannerThree.vue'
import AddTow from '../Components/banner/AddTow.vue'
import AddThree from '../Components/banner/AddThree.vue'
import AddFour from '../Components/banner/AddFour.vue'
import AddFive from '../Components/banner/AddFive.vue'
import AllCountry from '../Components/AllCountry.vue'
import CountryCapital from '../Components/CountryCapital.vue'
import LatestPlaylist from '../Components/LatestPlaylist.vue'
import TradingTopics from '../Components/TradingTopics.vue'
import Advantage from '../Components/Advantage.vue'
import MobileBanner from '../Components/banner/MobileBanner.vue'
import ShareModal from '../Components/ShareModal.vue';
import SurratPlay from '../Components/SurratPlay.vue'
import SurratBox from '../Components/SurratBox.vue'
import MorePlayList from "../Components/MorePlayList.vue";
import AddSix from '../Components/banner/AddSix.vue'

export default {
    name: 'PrayerNowPlaylist',
    components: {
        BannerOne,
        Sidebar,
        AddTow,
        AddThree,
        AddFour,
        AddFive,
        CountryCapital,
        AllCountry,
        BannerThree,
        Advantage,
        MobileBanner,
        LatestPlaylist,
        TradingTopics,
        ShareModal,
        SurratPlay,
        SurratBox,
        MorePlayList,
        AddSix

    }
}
</script>
