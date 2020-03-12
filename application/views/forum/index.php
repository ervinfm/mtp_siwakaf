<div class="inbox-text-list ">
    <?php $this->view('messages'); ?>
    <h3>Forum Diskusi Administrator</h3>
    <div class="form-group" style="margin-top: 50px">
        <form action="<?= site_url('forum/add') ?>" method="POST">
            <div class="nk-int-st search-input search-overt">
                <input type="hidden" name="id" value="<?= $this->session->userdata('userid') ?>">
                <div class="form-group ic-cmp-int float-lb floating-lb">
                    <div class="form-ic-cmp">
                        <i class="notika-icon notika-mail"></i>
                    </div>
                    <div class="nk-int-st">
                        <textarea type="text" name="pesan" class="form-control" required></textarea>
                        <label class="nk-label">Tulis Pesan disini ... </label>
                    </div>
                </div>
                <button type="submit" name="send" class="btn search-ib waves-effect"><i class="fa fa-send"></i> Kirim </button>
            </div>
        </form>
    </div>

    <div class="table-responsive" style="margin-top: 10px">
        <table class="table table-hover">
            <tbody class="auto">
                <?php foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td width="15%"><?= $data->nama_admin ?></td>
                        <td width="70%"><?= $data->pesan_forum ?></td>
                        <td class="text-right mail-date" width="15%"><i><?= $data->created_forum ?></i></td>
                        <td>
                            <?php if ($this->session->userdata('userid') == $data->id_admin) { ?>
                                <a href="<?= site_url('forum/del/' . $data->id_forum) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php if ($this->session->userdata('level') == 1) { ?>
        <a href="<?= site_url('forum/reset') ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Reset Forum </a>
    <?php } ?>
</div>

<script>
    function loadMassage() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>forum/index',
            success: function(html) {
                $("#chat").html(html);
            }
        })
    }
</script>