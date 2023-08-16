<template>
  <img :src="imageSrc" :class="ImageClass" :alt="alt">
</template>
    
<script>
export default {
  props: {
    imageSrc: {
      type: [String, Number],
      default: "",
    },
    ImageClass:{
      type: [String, Number],
      default: "",
    },
    alt: {
      type: [String, Number],
      default: ()=> "Image",
    },
  },
};
</script>
    