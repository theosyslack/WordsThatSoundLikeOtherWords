<style>
 .new-rhyme{
   background: black;
 }
</style>
<template>
  <div class="new-rhyme">
    <form v-on:submit.prevent="submit">
      <input type="text" name="name" value="">
      <input type="submit" name="name" value="Submit">
    </form>
  </div>
</template>
<script>
  export default {
    props: ['phrase'],
    methods: {
      submit: function(){

      }
    }
  }
</script>
