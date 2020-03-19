<div class="inbox-text-list ">
    <?php $this->view('messages'); ?>
    <h3>Forum Diskusi Administrator <br> <small style="font-size: 10px"><i>( <?=$profil->nama_admin?> - <?=$profil->nama_ranting?> )</i></small></h3>
    <div class="form-group" style="margin-top: 50px">
        <form action="<?= site_url('forum/add') ?>" method="POST">
            <div class="nk-int-st search-input search-overt">
                <input type="hidden" name="id" value="<?= $this->session->userdata('userid') ?>">
                <div class="form-group ic-cmp-int float-lb floating-lb">
                    <div class="form-ic-cmp">
                        <i class="notika-icon notika-mail"></i>
                    </div>
                    <div class="nk-int-st">
                        <input type="text" name="pesan" class="form-control" required>
                        <label class="nk-label">Tulis Pesan disini ... </label>
                    </div>
                    
                </div>
                <button type="submit" name="send" class="btn search-ib waves-effect"><i class="fa fa-send"></i> Kirim </button>
            </div>
        </form>
    </div>
    <div class="inbox-btn-st-ls btn-toolbar">
        <div class="btn-group ib-btn-gp active-hook nk-email-inbox">
            <a href="" class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-refresh"></i> Refresh</a>
            <!-- <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-next"></i></button>
            <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-down-arrow"></i></button>
            <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-trash"></i></button>
            <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-checked"></i></button>
            <button class="btn btn-default btn-sm waves-effect"><i class="notika-icon notika-promos"></i></button> -->
        </div>
    </div>

    <div class="table-responsive" style="margin-top: 10px">
        <table class="table table-hover">
            <tbody class="auto" id="show_data">
               
            </tbody>
        </table>
    </div>
    <?php if ($this->session->userdata('level') == 1) { ?>
        <a href="<?= site_url('forum/reset') ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Reset Forum </a>
    <?php } ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        load_chat();   //pemanggilan fungsi tampil barang.
         
        $('#mydata').dataTable();
          
        //fungsi tampil barang
        function load_chat(){
            $.ajax({
                type  : 'ajax',
                url   : '<?=site_url('forum/get_forum')?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td width="15%">'+data[i].nama_admin+'</td>'+
                                '<td width="70%">'+data[i].pesan_forum+'</td>'+
                                '<td class="text-right mail-date" width="15%"><i>'+data[i].created_forum+'</i></td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            }), 1000;
        }
 
    });
 
</script>