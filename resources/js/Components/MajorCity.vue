<template>
    <div class="content-widget mx-sm-0 rounded-sm-0">
        <div class=" row all-major-city-section">
            <div class="col-lg-12">
                <div class="country-heading">
                    <h2 class="text-theme fw-700">مدن إسلامية كبرى</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="w-100">
                <div class="all-major-city">
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                    <div class="selected-major-city">
                        <AppImage :imageSrc="country_image" />
                        <span>السودان</span>
                    </div>
                </div>
                <div class="city-pagination">
                    <div class="city-pagination-arrow-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.97652 3.57576C6.21083 3.34145 6.59073 3.34145 6.82505 3.57576L11.2493 8.00002L6.82505 12.4243C6.59073 12.6586 6.21083 12.6586 5.97652 12.4243C5.7422 12.19 5.7422 11.8101 5.97652 11.5758L9.55225 8.00002L5.97652 4.42429C5.7422 4.18997 5.7422 3.81007 5.97652 3.57576Z" fill="#8A9099"/>
                        </svg>
                    </div>
                    <ul>
                        <li><a href="#" class="active">5</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">1</a></li>
                    </ul>
                    <div class="city-pagination-arrow-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0235 12.4242C9.78917 12.6586 9.40927 12.6586 9.17495 12.4242L4.75069 7.99998L9.17495 3.57571C9.40927 3.3414 9.78917 3.3414 10.0235 3.57571C10.2578 3.81003 10.2578 4.18992 10.0235 4.42424L6.44775 7.99998L10.0235 11.5757C10.2578 11.81 10.2578 12.1899 10.0235 12.4242Z" fill="#1E4D45"/>
                        </svg>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
<script>

    import AppImage from '../Components/Image.vue'

    export default{
        data(){
            return{
                country_image:'/templates/countries/uae.png'
            }
        },
        components:{
            AppImage
        }
    }

</script>