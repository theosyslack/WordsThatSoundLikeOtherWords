var Vue = require('vue');
Vue.use(require('vue-resource'));
Vue.config.debug = true;
var RhymeBanner = require('./vue/rhymeBanner.vue');
var NewRhymeForm = require('./vue/NewRhymeForm.vue');
var Modal = require('./vue/Modal.vue');
var moment = require('moment');

document.addEventListener("DOMContentLoaded", function(event) {
  var rhymeDataNode = document.querySelector('[data-rhyme-data]');
  var rhymeData = JSON.parse( rhymeDataNode.text );

  Vue.filter('momentify', function(value){
    var _ = moment.duration(value, 'seconds');
    var hours = _.hours();
    var minutes = _.minutes();
    var seconds = _.seconds();

     return `${hours} hour(s), ${minutes} minute(s), ${seconds} second(s)`;

  });

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
