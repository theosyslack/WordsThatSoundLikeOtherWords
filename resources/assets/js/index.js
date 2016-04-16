var Vue = require('vue');
Vue.use(require('vue-resource'));
var PhraseBanner = require('./vue/PhraseBanner.vue');
var NewRhymeForm = require('./vue/NewRhymeForm.vue');
var Modal = require('./vue/Modal.vue');

document.addEventListener("DOMContentLoaded", function(event) {
  var phraseDataNode = document.querySelector('[data-phrase-data]');
  var phraseData = JSON.parse( phraseDataNode.text );

  var $vm = new Vue({
    el: 'body',
    data: function(){
      return {
        phrase: phraseData
      }
    },
    components: {
      'phrase-banner' : PhraseBanner,
      'rhyme-form' : NewRhymeForm,
      'modal': Modal
    }
  });
});
