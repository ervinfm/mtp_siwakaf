<?php if(!empty($this->session->has_userdata('succes'))) {?>
      <div class="alert-list">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">
                      <i class="notika-icon notika-close"></i>
                  </span>
            </button>
            <i class="fa fa-check-square-o"></i><?=$this->session->flashdata('succes');?>
        </div>
      </div>
<?php } ?>

<?php if(!empty($this->session->has_userdata('error'))) {?>
        <div class="alert-list">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">
                      <i class="notika-icon notika-close"></i>
                  </span>
            </button>
            <i class="fa fa-close"></i><?=$this->session->flashdata('error');?>
        </div>
      </div>
<?php } ?>

<?php if(!empty($this->session->has_userdata('warning'))) {?>
        <div class="alert-list">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">
                      <i class="notika-icon notika-close"></i>
                  </span>
            </button>
            <i class="fa fa-warning"></i><?=$this->session->flashdata('warning');?>
        </div>
      </div>
<?php } ?>