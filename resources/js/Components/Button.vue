<template>
  <button :class="buttonClass+' theme__button'">{{ buttonText }}</button>
</template>
  
<script>
export default {
  props: {
    buttonText: {
      type: String,
      default: "Button",
    },
    buttonClass: {
      type: [String, Number],
      default: "",
    },
  },
};
</script>
  