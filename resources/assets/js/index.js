var Vue = require('vue');
Vue.use(require('vue-resource'));
Vue.config.debug = true;
var RhymeBanner = require('./vue/rhymeBanner.vue');
var NewRhymeForm = require('./vue/NewRhymeForm.vue');
var Modal = require('./vue/Modal.vue');

document.addEventListener("DOMContentLoaded", function(event) {
  var rhymeDataNode = document.querySelector('[data-rhyme-data]');
  var rhymeData = JSON.parse( rhymeDataNode.text );

  var $vm = new Vue({
    el: 'body',
    data: function(){
      return rhymeData
    },
    components: {
      'rhyme-banner' : RhymeBanner,
      'rhyme-form' : NewRhymeForm,
      'modal': Modal
    }
  });
});
