    <?php $this->view('messages'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="basic-tb-hd" style="padding-bottom : 20px">
                <h2>Daftar Seluruh Kehartabendaan </h2>
                <a href="<?= site_url('asset/aset_barang/add_aset') ?>" class="btn btn-success success-icon-notika waves-effect btn-sm pull-right"><i class="fa fa-pencil"></i> Tambah</a>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Instansi</th>
                    <th>Nama Barang</th>
                    <th width="20%">Harga Barang</th>
                    <th>Rician Barang</th>
                    <th>Berita Acara</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($row->result() as $key => $data) {
                    $id_barang = $data->id_aset_barang ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->nama_ranting ?></td>
                        <td><?= $data->nama_aset ?></td>
                        <td><?= $this->money->rupiah($data->harga_aset) ?></td>
                        <td>
                            <button type="button" class="btn btn-teal teal-icon-notika btn-reco-mg btn-button-mg waves-effect" data-toggle="modal" data-target="#rincian<?= $no ?>">
                                <i class="notika-icon notika-refresh"></i> Detail
                            </button>
                            <!-- Start Part Modals -->
                            <div class="modals-single">
                                <div class="modals-default-cl">
                                    <div class="modal fade" id="rincian<?= $no ?>" role="dialog" style="display: none;">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Rincian Kehartabendaan </h2>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td width="40%">Nama Aset</td>
                                                            <td width="5%"> : </td>
                                                            <td><?= $data->nama_aset ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Aset</td>
                                                            <td> : </td>
                                                            <td><?= $data->jenis_aset ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kondisi Aset</td>
                                                            <td> : </td>
                                                            <td><?= $data->kondisi_aset == 'A' ? 'Baik' : ($data->kondisi_aset == 'B' ? 'Rusak Ringan' : 'Rusak Berat') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga Aset</td>
                                                            <td> : </td>
                                                            <td><?= $this->money->rupiah($data->harga_aset) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah Aset</td>
                                                            <td> : </td>
                                                            <td><?= $data->jumlah_aset . " Unit" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Nilai Aset</td>
                                                            <td> : </td>
                                                            <td><?= $this->money->rupiah($data->harga_aset * $data->jumlah_aset) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keterangan</td>
                                                            <td> : </td>
                                                            <td><?= $data->keterangan ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Terdaftar</td>
                                                            <td> : </td>
                                                            <td><?= $this->fungsi->tgl_indo($data->created_aset_barang) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Pembaharuan</td>
                                                            <td> : </td>
                                                            <td><?= $this->fungsi->tgl_indo($data->updated_aset_barang == null ? '-' : $data->updated_aset_barang) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Qr Code Barang <br><small><b> (Silahkan generate jika Qr-Code tidak ada)</b></small></td>
                                                            <td> : </td>
                                                            <td>
                                                                <?php $dir = base_url() . 'uploads/aset_barang/qrCode/' . $data->id_aset_barang . '.png'; ?>
                                                                <form action="<?= site_url('asset/aset_barang/generate_qrCode/') ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $data->id_aset_barang ?>">
                                                                    <input type="hidden" name="nama" value="<?= $data->nama_aset ?>">
                                                                    <input type="hidden" name="instansi" value="<?= $data->nama_ranting ?>">
                                                                    <button type="submit" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-qrcode"></i> Generate </button>
                                                                </form>
                                                                <?php
                                                                if (!$dir) {
                                                                    echo "Silahkan Generate Terlebih Dahulu";
                                                                } else {
                                                                    echo '<a href="'.$dir.'" target="_blank"><img src="' . $dir . '" style="width:100px; margin-top: 10px"></a>';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr></tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End part Modals -->
                        </td>
                        <td>
                            <?php if ($data->gambar_aset != null) { ?>
                                <a href="<?= site_url('uploads/aset_barang/' . $data->gambar_aset) ?>" target="_blank">
                                    <button class="btn btn-deeporange deeporange-icon-notika waves-effect"><i class="notika-icon notika-down-arrow"></i> Unduh </button>
                                </a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?= site_url('asset/aset_barang/edit_aset/' . $data->id_aset_barang) ?>" class="btn btn-amber amber-icon-notika waves-effect btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="#" onclick="return confirm_delete()" class="btn btn-danger danger-icon-notika waves-effect btn-sm">
                                <i class="fa fa-trash-o"></i> Hapus
                            </a>
                            <a href="#" onclick="return confirm_riwayat()" data-toggle="tooltip" title="" data-original-title="Periwayatan Data" class="btn btn-lime lime-icon-notika waves-effect btn-sm"><i class="fa fa-history"></i></a>
                            <!-- JS Confirm Hapus Data -->
                            <script>
                                function confirm_delete() {
                                    Swal.fire({
                                        title: 'Yakin Menghapus data ?',
                                        text: "data yang dihapus tidak akan diriwayatkan!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Hapus'
                                    }).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= site_url('asset/aset_barang/del/' . $data->id_aset_barang) ?>";
                                        } else {
                                            Swal.fire(
                                                'Batal Hapus',
                                                'Penghapusan data dibatalkan',
                                                'success'
                                            )
                                        }
                                    });
                                }
                            </script>
                            <!-- Js Confirm Periwayatan Data -->
                            <script>
                                function confirm_riwayat() {
                                    Swal.fire({
                                        title: 'Yakin Meriwayatkan data ?',
                                        text: "data yang diriwayatkan akan dipindahkan ke daftar riwayat Aset !",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, riwayatkan'
                                    }).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= site_url('asset/aset_barang/riwayat/' . $data->id_aset_barang) ?>";
                                        } else {
                                            Swal.fire(
                                                'Batal ',
                                                'Periwayatan data dibatalkan',
                                                'success'
                                            )
                                        }
                                    });
                                }
                            </script>
                        </td>
                    </tr>
                <?php
                    $total = $total + ($data->jumlah_aset * $data->harga_aset);
                } ?>
            </tbody>
            <tfoot>
                <td colspan="3"><b> Total Nilai Kehartabendaan </b></td>
                <td><b><?= $this->money->rupiah($total) ?></b></td>
                <td colspan="3"><b><?= $this->money->terbilang($total) . " Rupiah" ?></b></td>
            </tfoot>
        </table>
    </div>