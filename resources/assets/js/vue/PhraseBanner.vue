<style>
.phrase {

}
.subtitle {
  line-height: 1em;
  font-size: .25em;
  font-weight: bold;

}
</style>
<template>
  <div class="phrase-banner">
    <div class="phrase">{{phrase.text}}</div>
    <div class="subtitle">SOUNDS LIKE</div>

    <div class="phrase" v-for="rhyme in phrase.rhymes">{{rhyme.text}}</div>
  </div>
</template>
<script>
  export default {
    props: ['phrase'],
  }
</script>
