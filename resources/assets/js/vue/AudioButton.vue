<template>
	<div class="audio-button">
		<div class="play" @click="toggleState">
			{{buttonText}}
		</div>
		<div class="reset" v-if="canBeReset && playing" @click="reset">
			Take it from the top.
		</div>
		<audio class="audio" :src="src" controls v-el:audio preload="auto">
        Your browser does not support the <code>audio</code> element.
      </audio>
	</div>
</template>
<script>
  export default {
    props: ['src', 'timestamp'],
    data: function(){
      return {
      	playing: false,
      	canBeReset: false
      }
    },
    computed: {
    	audio: function(){
    		return this.$els.audio;
    	},
    	buttonText: function(){
    		return this.playing ? "End this madness." : "Lemme hear it.";
    	}
    },
    methods: {
      toggleState: function(){
      	return this.playing ? this.pause() : this.play();
      },
      play: function(){
      	this.audio.play();
      	this.playing = true;
      	this.canBeReset = true;
      },
      pause: function(){
      	this.audio.pause();
      	this.playing = false;
      },
      reset: function(){
      	this.setTimestampToBeginning();
      },
      setTimestampToBeginning: function(){
      	this.audio.currentTime = this.timestamp.timestamp;
      }
    },
    ready: function(){
    	this.setTimestampToBeginning();
    }
  }
</script>
