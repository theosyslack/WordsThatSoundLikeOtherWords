<template>
  <div class="new-rhyme">
    <button class="button" @click="modalVisible = true"> Hey, I'd like to submit a dumb rhyme. </button>
    <modal :visible.sync="modalVisible">
      <form class="phrase-form">
        <fieldset class="rhyme">
          <legend>Rhyme Time for 300, Alex</legend>
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
                    <select v-model="form.timestamp.episode">
                      <option v-for="episode in episodes" :value="episode.url" >{{episode.title}} </option>
                    </select>
                  </div>
                </label>
              </div>
              <div>
                <label>
                  Timestamp? <input type="number" v-model="form.timestamp.timestamp" placeholder="00:00:00">
                </label>
              </div>
              <div>
                <label>
                  Who said it? <input type="text"  v-model="form.timestamp.host" placeholder="Elliott, Stuart, or that other guy">
                </label>
              </div>
            </div>
        </fieldset>
        <div class="errors" v-if="errors" v-for="error in errors" >
           <div class="error">{{error}}</div>
        </div>
        <div class="button" @click="submit"> {{buttonMessage}} </div>
      </form>
    </modal>
  </div>
</template>
<script>
  var Modal = require('./Modal.vue');
  var XML = require('xml2js');
  export default {
    data: function(){
      return {
        modalVisible: false,
        timestamp: false,
        errors: '',
        episodes: [],
        buttonMessage: 'Raa-roooowww!',
        form: {
          phrase: '',
          rhyme: '',
          timestamp: {
            host: '',
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
    components: {
      modal: Modal
    },
    methods: {
      submit: function(){
        var form = this.form;
        var timestamp = form.timestamp;
        var submitter = form.submitter;

        var data = {
          'phrase': form.phrase,
          'rhyme': form.rhyme
        }

        if( timestamp.host && timestamp.timestamp && timestamp.episode ){
          data.timestamp = timestamp;
        }


        if( submitter.first && submitter.last ){
          data.submitter = submitter;
        }


        this.$http({url: '/', method: 'POST', data: data}).then(function (response) {
           this.errors = {};
        }, function (response) {
           this.errors = response.data;
        });

      },
      withholdLastName: function(){
        this.form.submitter.last = 'Withheld'
      }
    },
    ready: function(){
      this.$http({url:'http://theflophouse.libsyn.com/rss', method:'GET'}).then(function (response) {
        var data = XML.parseString(response.data, (err, data)=>{
          data.rss.channel[0].item.forEach((episode, index, array)=>{
            if(episode.enclosure){
              this.episodes.push({
                url: episode.enclosure[0].$.url,
                title: episode.title[0]
              });
            }
          });
        });
      });
    }
  }
</script>
