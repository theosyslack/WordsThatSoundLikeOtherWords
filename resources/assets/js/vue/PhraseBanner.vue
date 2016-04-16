<template>
  <div class="phrase-banner">
    <div class="phrase">{{phrase.text}}</div>
    <div class="subtitle">SOUNDS LIKE</div>
    <div class="phrase" v-for="rhyme in phrase.rhymes">{{rhyme.text}}</div>

    <div v-if="timestamp">
      <audio preload="auto" src="http://upload.wikimedia.org/wikipedia/commons/a/a9/Tromboon-sample.ogg" >
    </div>
    
  </div>
</template>
<script>
  export default {
    props: ['phrase'],
  }
</script>
