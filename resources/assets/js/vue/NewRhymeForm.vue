<template>
  <div class="new-rhyme">
    <button class="button" @click="modalVisible = true"> Hey, I'd like to submit a dumb rhyme. </button>
    <modal :visible.sync="modalVisible">
      <form class="phrase-form">
        <fieldset class="rhyme">
          <legend>Rhyme Time for 1000, Alex</legend>
          <input type="text" name="name"  placeholder="Batman" v-model="form.phrase">
          <span class="soundslike">Sounds Like</span>
          <input type="text" name="name"  placeholder="Shatman" v-model="form.rhyme">
          <div>
        </fieldset>
        <fieldset class="name">
          <legend>Name, if you please.</legend>
              <input type="text" placeholder="First Name" v-model="form.submitter.first">
              <input type="text" placeholder="Last Name" @focus="withholdLastName" @blur="withholdLastName" v-model="form.submitter.last">
        </fieldset>
        <fieldset class="timestamp">
          <legend> Timestamp </legend>
          <label>
            <input type="checkbox" v-model="timestamp"> </input> I'd like to tag this with a timestamp because I am a good samaritan
          </label>
            <div v-if="timestamp">
              <div>
                <label>
                  Which Episode?
                  <div>
                    <select v-model="form.timestamp.episode" @change="setSelectedEpisode">
                      <option v-for="episode in episodes" :value="episode.url" :episode="episode">{{episode.title}} </option>
                    </select>
                  </div>
                </label>
              </div>
              <div>
                
                <label>
                  Timestamp?
                  <input type="range" class="range"  min="0" :max="selectedEpisode.durationInSeconds" step="1" v-model="form.timestamp.timestamp">
                  {{form.timestamp.timestamp | momentify}}
                </label>
              </div>
            </div>
        </fieldset>
        <div :class="buttonClass" @click="submit"> {{buttonMessage}} </div>
        <div class="errors" v-if="errors"  >
           <div class="error" v-for="error in errors">{{error}}</div>
        </div>
      </form>
    </modal>
  </div>
</template>
<script>
  var Modal = require('./Modal.vue');
  var XML = require('xml2js');
  var moment = require('moment');
  export default {
    data: function(){
      return {
        modalVisible: false,
        timestamp: false,
        errors: '',
        successOnForm: false,
        episodes: [],
        selectedEpisode: {
          duration: 0
        },
        buttonMessage: 'Raa-roooowww!',
        form: {
          phrase: '',
          rhyme: '',
          timestamp: {
            episode: '',
            timestamp: '',
          },
          submitter: {
            first: '',
            last: ''
          }
        }
      }
    },
    computed: {
      buttonClass: function(){
          return {
            'button': true,
            '-green': this.successOnForm
          }
      }
    },
    components: {
      modal: Modal
    },
    methods: {
      submit: function(){
        this.updateButtonMessage('Processing...');
        var data = this.prepareFormData();

        this.$http({url: '/', method: 'POST', data: data}).then(function (response) {
           this.errors = {};
           this.successOnForm = true;
           this.updateButtonMessage('You did it! Daddy so proud.', '-green');

           setTimeout(()=>{
             this.modalVisible = false;
             this.successOnForm = false;
           }, 1500);

        }, function (response) {
           this.errors = response.data;
           this.updateButtonMessage('Try Again?');
        });

      },
      setSelectedEpisode: function(e){
        var select = e.target;
        var optionIndex = select.selectedIndex;
        var episode = this.episodes[optionIndex];
        episode.durationInSeconds = moment.duration(episode.duration).asSeconds();
        this.selectedEpisode = episode;
      },
      withholdLastName: function(){
        this.form.submitter.last = 'Withheld'
      },
      prepareFormData: function(){
        var form = this.form;
        var timestamp = form.timestamp;
        var submitter = form.submitter;

        var data = {
          'phrase': form.phrase,
          'rhyme': form.rhyme
        }

        if( timestamp.timestamp && timestamp.episode ){
          data.timestamp = timestamp;
        }


        if( submitter.first && submitter.last ){
          data.submitter = submitter;
        }


        return data;
      },
      updateButtonMessage: function(message){
        this.buttonMessage = message;
      }
    },
    ready: function(){
      this.$http({url:'http://theflophouse.libsyn.com/rss', method:'GET'}).then(function (response) {
        var data = XML.parseString(response.data, (err, data)=>{
          data.rss.channel[0].item.forEach((episode, index, array)=>{
            var hasEnclosure = episode.enclosure;
            var hasiTunesDuration = episode['itunes:duration'];
            if( hasEnclosure && hasiTunesDuration){
              var url = hasEnclosure[0].$.url;
              var title = episode.title[0];
              var duration = hasiTunesDuration[0];
              if (duration.length <= 5) {
                duration = "00:"+duration; // Makes short episodes properly formated
              }
              this.episodes.push({
                url: url,
                title: title,
                duration: duration
              });
            }
          });
        });
      });
    }
  }
</script>
