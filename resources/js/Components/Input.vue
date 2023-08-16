<template>
  <input :type="InputType" :class="inputClass" :placeholder="placeholder">
</template>
  
<script>
export default {
  props: {
    placeholder: {
      type: [String, Number],
      default: "",
    },
    inputClass: {
      type: [String, Number],
      default: "",
    },
    InputType: {
      type: Text,
      default: () => 'text'
    },
    keypresFunc: {
      type: Function,  // Use 'Function' instead of 'Text' for type
      default: () => { }
    }
  },
};
</script>
  