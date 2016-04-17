<template>
  <div class="phrase-banner">
    <div class="phrase">{{phrases.first}}</div>
    <div class="subtitle">SOUNDS LIKE</div>
    <div class="phrase">{{phrases.second}}</div>
    <div class="credit" v-if="submitter">
        Submited by {{submitter}} Last Name Witheld
    </div>
    <div v-if="timestamp">
      <audio class="audio" :src="timestamp.episode" controls v-el:audio preload="auto" @play.capture="setTimestamp">
        Your browser does not support the <code>audio</code> element.
      </audio>
      <div>
        <button class="button -small" @click="resetTimestamp" v-if="audioHasBeenPlayed">Reset Timestamp</button>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['rhyme'],
    data: function(){
      return {
        audioHasBeenPlayed: false
      };
    },
    computed: {
      phrases: function(){
        return {
          first: this.rhyme.phrases[0].text,
          second: this.rhyme.phrases[1].text
        }
      },
      submitter: function(){
        if(this.rhyme.submitter){
          return this.rhyme.submitter.first;
        } else {
          return false;
        }
      },
      timestamp: function(){
        if(this.rhyme.timestamp){
          return this.rhyme.timestamp;
        } else {
          return false;
        }
      }
    },
    methods: {
      setTimestamp: function(){
        if(this.audioHasBeenPlayed === false){
          this.$els.audio.currentTime = this.timestamp.timestamp;
        }
        this.audioHasBeenPlayed = true;
      },
      resetTimestamp: function(){
        this.$els.audio.currentTime = this.timestamp.timestamp;
        this.audioHasBeenPlayed = false;
      }
    },
  }
</script>
