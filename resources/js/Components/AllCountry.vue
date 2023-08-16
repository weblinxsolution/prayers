<template>
    <div class="content-widget d-flex gap-3 p-3 search-widget">
        <div class="position-relative w-100 d-flex align-items-center gap-3">
            <div class="location__icon w-mxc" data-bs-toggle="modal" data-bs-target="#locationModel">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_96_3994)">
                        <path
                            d="M12 8C9.79 8 8 9.79 8 12C8 14.21 9.79 16 12 16C14.21 16 16 14.21 16 12C16 9.79 14.21 8 12 8ZM20.94 11C20.7135 8.97212 19.8042 7.08154 18.3613 5.63869C16.9185 4.19585 15.0279 3.28651 13 3.06V2C13 1.45 12.55 1 12 1C11.45 1 11 1.45 11 2V3.06C8.97212 3.28651 7.08154 4.19585 5.63869 5.63869C4.19585 7.08154 3.28651 8.97212 3.06 11H2C1.45 11 1 11.45 1 12C1 12.55 1.45 13 2 13H3.06C3.28651 15.0279 4.19585 16.9185 5.63869 18.3613C7.08154 19.8042 8.97212 20.7135 11 20.94V22C11 22.55 11.45 23 12 23C12.55 23 13 22.55 13 22V20.94C15.0279 20.7135 16.9185 19.8042 18.3613 18.3613C19.8042 16.9185 20.7135 15.0279 20.94 13H22C22.55 13 23 12.55 23 12C23 11.45 22.55 11 22 11H20.94ZM12 19C8.13 19 5 15.87 5 12C5 8.13 8.13 5 12 5C15.87 5 19 8.13 19 12C19 15.87 15.87 19 12 19Z"
                            fill="white" />
                    </g>
                    <defs>
                        <clipPath id="clip0_96_3994">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="search__bar">
                <span>
                    <AppImage :imageSrc="search_icon" alt="Search" />
                </span>
                <AppInput InputType="text" @keyup="handleKeypress" placeholder="ابحث عن مواعيد الصلاة ، القراء،..." />
            </div>
            <div v-if="showDiv" class="search-country-div">
                <div class="search-province">
                    <span><i class="fa fa-close"></i></span>
                    <div>
                        <AppInput InputType="text" placeholder="بحث عن مح  افظة القاهرة" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.75 9C3.75 6.1005 6.1005 3.75 9 3.75C11.8995 3.75 14.25 6.1005 14.25 9C14.25 11.8995 11.8995 14.25 9 14.25C6.1005 14.25 3.75 11.8995 3.75 9ZM9 2.25C5.27208 2.25 2.25 5.27208 2.25 9C2.25 12.7279 5.27208 15.75 9 15.75C10.5938 15.75 12.0585 15.1976 13.2133 14.2739L16.7192 17.7799C17.0121 18.0728 17.487 18.0728 17.7799 17.7799C18.0728 17.487 18.0728 17.0121 17.7799 16.7192L14.2739 13.2133C15.1976 12.0585 15.75 10.5938 15.75 9C15.75 5.27208 12.7279 2.25 9 2.25Z"
                                fill="#8A9099" />
                        </svg>
                    </div>
                </div>
                <ul class="country-province-result">
                    <li> <a href="#">
                            <AppImage :imageSrc="country_image" /> محافظة القاهرة - مصر
                        </a></li>
                    <li> <a href="#">
                            <AppImage :imageSrc="country_image" /> محافظة القاهرة - مصر
                        </a></li>
                    <li> <a href="#">
                            <AppImage :imageSrc="country_image" /> محافظة القاهرة - مصر
                        </a></li>
                    <li> <a href="#">
                            <AppImage :imageSrc="country_image" /> محافظة القاهرة - مصر
                        </a></li>
                    <li> <a href="#">
                            <AppImage :imageSrc="country_image" /> محافظة القاهرة - مصر
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-widget mx-sm-0 rounded-sm-0">
        <div class=" row all-country-section">
            <div class="col-lg-12 flex-wrap">
                <div class="country-heading">
                    <h2 class="text-theme fw-700">كل الدول</h2>
                </div>
                <div class="all-country-list">
                    <ul class="flex-wrap">
                        <li @click="updateCountry(9)" :class="{ 'active-region': get_country_by_region === 9 }">الدول
                            العربية
                        </li>
                        <li @click="updateCountry(8)" :class="{ 'active-region': get_country_by_region === 8 }">أوروبا</li>
                        <li @click="updateCountry(10)" :class="{ 'active-region': get_country_by_region === 10 }">أمريكا
                            الشماليه</li>
                        <li @click="updateCountry(11)" :class="{ 'active-region': get_country_by_region === 11 }">أمريكا
                            الجنوبيه</li>
                        <li @click="updateCountry(7)" :class="{ 'active-region': get_country_by_region === 7 }">أسيا</li>
                        <li @click="updateCountry(12)" :class="{ 'active-region': get_country_by_region === 12 }">أفريقيا
                        </li>
                        <li @click="updateCountry(0)" :class="{ 'active-region': get_country_by_region === 0 }">أخرى</li>
                    </ul>
                    <!-- get_country_by_region -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="w-100">
                    <div class="all-countries">
                        <!-- <div class="selected-region-country" v-for="item in countrylist" :key="item">
                            <AppImage :imageSrc="country_image + item.flag_image" />
                            <span>{{ item.name }}</span>
                        </div> -->
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>

                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                         <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div> <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                        <div class="selected-region-country">
                            <AppImage :imageSrc="country_Flag" />
                            <span>السودان</span>
                        </div>
                    </div>
                    <div class="countries-pagination">
                        <div class="country-pagination-arrow-left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.0235 12.4242C9.78917 12.6586 9.40927 12.6586 9.17495 12.4242L4.75069 7.99998L9.17495 3.57571C9.40927 3.3414 9.78917 3.3414 10.0235 3.57571C10.2578 3.81003 10.2578 4.18992 10.0235 4.42424L6.44775 7.99998L10.0235 11.5757C10.2578 11.81 10.2578 12.1899 10.0235 12.4242Z"
                                    fill="#1E4D45" />
                            </svg>
                        </div>
                        <ul>
                            <li><a href="#" class="active">5</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">1</a></li>
                        </ul>
                        <div class="country-pagination-arrow-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.97652 3.57576C6.21083 3.34145 6.59073 3.34145 6.82505 3.57576L11.2493 8.00002L6.82505 12.4243C6.59073 12.6586 6.21083 12.6586 5.97652 12.4243C5.7422 12.19 5.7422 11.8101 5.97652 11.5758L9.55225 8.00002L5.97652 4.42429C5.7422 4.18997 5.7422 3.81007 5.97652 3.57576Z"
                                    fill="#8A9099" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="locationModel" tabindex="-1" aria-labelledby="locationModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex location-content justify-content-center">
                        <div class="w-mxc">
                            <AppImage :imageSrc="mobileImg" />
                        </div>
                        <div class="w-mxc d-flex align-items-center text-lg-end text-center mt-lg-0 mt-3">
                            <div class="px-lg-5">
                                <h3 class="fw-700">للحصول علي التوقيت بشكل صحيح يرجي تحديد موقعك.</h3>
                                <div class="location-button mt-4 pt-3">
                                    <AppButton buttonText="تحديد الموقع" buttonClass="fw-700" />
                                    <div data-bs-dismiss="modal">
                                        <AppButton buttonText="لا أوافق" buttonClass="location-btn1 fw-700" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import AppImage from '../Components/Image.vue'
import AppInput from './Input.vue'
import AppButton from './Button.vue'
import axios from 'axios';

export default {
    data() {
        return {
            search_icon: 'templates/images/Search.svg',
            country_image: 'countryFlags/',
            country_Flag: 'templates/countries/uae.png',
            mobileImg: 'templates/images/modal-mobile.jpg',
            showDiv: false,
            countrylist: [],
            get_country_by_region: 9
        }
    },
    components: {
        AppInput,
        AppImage,
        AppButton
    },

    methods: {
        handleKeypress(e) {
            var searchValue = e.target.value;
            if (searchValue !== '') {
                this.showDiv = true;
            } else {
                this.showDiv = false;
            }
        },
        async updateCountry(regionId) {
            this.get_country_by_region = regionId;
            await this.fetchData(); // Fetch new data when the regionId is updated
        },
        async fetchData() {
            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/countries/${this.get_country_by_region}`);
                this.countrylist = response.data.countries;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        watch: {
            get_country_by_region() {
                // Watch for changes in get_country_by_region and fetch new data when it changes
                this.fetchData();
            },
        },
    },
    async mounted() {
        this.fetchData(); // Initial data fetch when component is mounted
    },


}

</script>