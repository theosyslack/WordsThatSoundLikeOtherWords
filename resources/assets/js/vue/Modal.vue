<style lang="scss" scoped>
.modal-container {

  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: space-around;
  align-items: center;
  transition: all .2s ease-in-out;
  background: rgba(0,0,0,.5);

  .modal {
    background: white;
    color: black;
    width: 70vw;
    min-height: 70vh;
    position: relative;
    padding: 10vh 10vw;

  }

  .close {
    position: absolute;
    top: .5em;
    right: .5em;
    height: 2em;
    width: 2em;
    font-weight: bold;

    text-align: center;
    line-height: 2em;
    background: gray;
    color: white;
    cursor: pointer;

      &:hover{ background: darken(gray, 20%) }
  }
}
</style>
<template>
  <div class="modal-container" v-if="visible" @click.stop="hide">
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
