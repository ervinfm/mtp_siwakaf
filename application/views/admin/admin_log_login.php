<?php $this->view('messages'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="data-table-area">
            <div class="data-table-list">
                <?php if ($row->num_rows() > 0) { ?>
                    <div class="basic-tb-hd" style="padding-bottom : 20px">
                        <h2>Rincian Login Admin (<?= @$row->row()->nama_admin ?>)</h2><small><i> (Data otomatis dihapus jika lebih dari 1000 data)</i></small>
                        <?php if ($row->row()->is_online == 1 && $row->row()->level == 2) { ?>
                            <a onclick="return confirm_logout()" class="btn btn-danger danger-icon-notika waves-effect pull-right mb-2"><i class="notika-icon notika-close"></i> Paksa Logout </a>
                        <?php } ?>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Admin </th>
                                    <th>Instansi</th>
                                    <th>Waktu Login</th>
                                    <th>Waktu Logout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->id_admin ?></td>
                                        <td><?= $data->nama_ranting ?></td>
                                        <td><?= $data->time_login ?></td>
                                        <td>
                                            <?php if ($data->time_logout != null) { ?>
                                                <?= $data->time_logout ?>
                                            <?php } else { ?>
                                                <i> Belum Logout </i>
                                            <?php } ?>
                                        </td>


                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr colspan="5"></tr>
                            </tfoot>
                        </table>
                    </div>
                <?php } else { ?>
                    <center>
                        <h2>Rekaman Login Tidak ada <a href="<?= site_url('dashboard') ?>" class="btn btn-info primary-icon-notika waves-effect pull-right mb-2"><i class="notika-icon notika-house"></i></a></h2>
                    </center>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Js Confirm Periwayatan Data -->
<script>
    setTimeout(function() {
        window.location.reload(1);
    }, 5000);

    function confirm_logout() {
        Swal.fire({
            title: 'Yakin logout <?= $row->row()->nama_admin; ?> ?',
            text: "User akan otomatis tidak dapat mengakses sistem sebelum login kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logoutkan'
        }).then((result) => {
            if (result.value) {
                window.location = '<?= site_url('admin/paksa_logout/' . $row->row()->id_admin) ?>';
            } else {
                Swal.fire(
                    'Batal ',
                    'Logout Paksa dibatalkan',
                    'success'
                )
            }
        });
    }
</script>