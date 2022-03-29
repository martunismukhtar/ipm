<template> 
<transition name="modal">
 <div class="modal modal-mask" style="display: block">
  <div class="modal-dialog" :class="modalSize" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <slot name="header"></slot>
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click='clicked'>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <slot name="body">body</slot>
      </div>
      
      
    </div>
  </div>
</div>
</transition> 
</template>

<script>
//https://v3.vuejs.org/examples/modal.html
// https://github.com/hultberg/vue-bootstrap-modal
export default {
    name:'SimpleModal',
    props: {
      onClicked: Function,
      modalSize:String
    },
    methods: {
      clicked() {
        this.onClicked();
      }
    }
}
</script>
<style>
.btn-close {
    border: none;
    font-size: 30px !important;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #ffffff !important;
    background: transparent;
}
.modal-body {
    max-height: 800px;
    overflow-y: auto;
}
.modal-mask {
  position: fixed !important;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    /* border-bottom: 1px solid #be2126;
    color: #be2126; */
    justify-content: space-between;

    background-color: #5fa2dd;
    color: #f0f0f0;
    font-size: 16px;
    font-weight: 400;

    line-height: 20px;
  }
.close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #f0f0f0;
    /* color: #f04f54; */
    /* text-shadow: 0 1px 0 #fff; */
    opacity: 1;
}
  .modal-footer {
    border-top: 1px solid #eeeeee;
    justify-content: flex-end;
  }

  .modal-body {
    position: relative;
    /* padding: 20px 10px; */
  }

  .btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }  
  .modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;  
    /* max-width: 500px;
    max-height: 500px; */
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 6px;
    outline: 0;
}
</style>