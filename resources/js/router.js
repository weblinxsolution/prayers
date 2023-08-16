import {createWebHistory,createRouter} from 'vue-router';
import home from "./pages/home.vue";
import countryprayer from "./pages/country-prayer.vue";
import prayerquran from "./pages/prayer-quran.vue";
import prayernowplaylist from "./pages/prayer-now-playlist.vue";
import prayernowtrack from "./pages/prayer-now-track.vue";

const routes =[
    {
        path:'/',
        name:'Home',
        component:home
    },
    {
        path:'/country-prayer',
        name:'CountryPrayer',
        component:countryprayer
    },
    {
        path:'/prayer-quran',
        name:'PrayerQuran',
        component:prayerquran
    },
    {
        path:'/prayer-now-playlist',
        name:'PrayerNowPlaylist',
        component:prayernowplaylist
    },
    {
        path:'/prayer-now-track',
        name:'PrayerNowTrack',
        component:prayernowtrack
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;