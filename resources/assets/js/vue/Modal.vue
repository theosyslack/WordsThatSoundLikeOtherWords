<template>
  <div class="modal-container" v-if="visible" transition="scalein" @click.stop="hide">
    <div class="modal" @click.stop="">
      <div class="close" @click.stop="hide">X</div>
      <slot>
        
      </slot>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      visible: {
        type: Boolean,
        required: true,
        twoWay: true
      }
    },
    methods: {
      hide: function(){
        this.visible = false
      }
    }
  }
</script>
