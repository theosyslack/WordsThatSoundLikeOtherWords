<template>
  <div class="new-rhyme">
    <button class="button" @click="modalVisible = true"> Hey, I'd like to submit a dumb rhyme. </button>
    <modal :visible.sync="modalVisible">
      <form class="phrase-form">
        <fieldset class="rhyme">
          <legend>Rhyme Time for 300, Alex</legend>
          <input type="text" name="name"  placeholder="Batman" v-model="form.phrase">
          <div>Sounds Like</div>
          <input type="text" name="name"  placeholder="Shatman" v-model="form.rhyme">
          <div>
        </fieldset>
        <fieldset class="name">
          <legend>Name, if you please.</legend>
            <div>
              <input type="text" placeholder="First Name" v-model="form.submitter.first">
            </div>
            <div>
              <input type="text" placeholder="Last Name" @focus="withholdLastName" @blur="withholdLastName" v-model="form.submitter.last">
            </div>
        </fieldset>
        <fieldset class="timestamp">
          <legend> Timestamp </legend>
          <label>
            <input type="checkbox" v-model="timestamp"> </input> I'd like to tag this with a timestamp because I am a good samaritan
          </label>

            <div v-if="timestamp" class="timestamp">
              <div>
                <label>
                  Which Episode <input type="number" v-model="form.timestamp.episode" placeholder="199">
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

        <div class="button" @click="submit"> Send this stuff </div>
      </form>
    </modal>
  </div>
</template>
<script>
  var Modal = require('./Modal.vue');
  export default {
    data: function(){
      return {
        modalVisible: false,
        timestamp: false,
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
          console.log('asdfasdfas');
      },
      withholdLastName: function(){
        this.form.submitter.last = 'Withheld'
      }
    }
  }
</script>
