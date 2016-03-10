var Vue = require('vue');
var PhraseBanner = require('./vue/PhraseBanner.vue');
var NewRhymeForm = require('./vue/NewRhymeForm.vue');

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
      'rhyme-form' : NewRhymeForm
    }
  });
});
