    <?php $this->view('messages'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="basic-tb-hd" style="padding-bottom : 20px">
                <h2>Daftar Seluruh Wakaf Tanah </h2>
                <a href="<?= site_url('wakaf/wakaf_tanah/add') ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-pencil"></i>Tambah</a>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Instansi</th>
                    <th>No Akta</th>
                    <th>Lokasi</th>
                    <th>Rincian</th>
                    <th>Berita Acara</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->nama_ranting ?></td>
                        <td><?= $data->no_akta_wakaf ?></td>
                        <td><?= $data->lokasi_tanah ?></td>
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
                                                    <h2>Rincian Wakaf Tanah </h2>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td width="40%">Akta Tanah</td>
                                                            <td width="5%"> : </td>
                                                            <td><?= $data->no_akta_wakaf ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Wakif</td>
                                                            <td> : </td>
                                                            <td><?= $data->nama_wakif ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Mauquf</td>
                                                            <td> : </td>
                                                            <td><?= $data->nama_mauquf ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Luas Tanah</td>
                                                            <td> : </td>
                                                            <td><?= $data->luas_tanah . ' M<sup>2</sup>' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status Tanah</td>
                                                            <td> : </td>
                                                            <td><?= $data->status_tanah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nilai Tanah</td>
                                                            <td> : </td>
                                                            <td><?= $this->money->rupiah($data->harga_tanah) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Luas Bangunan</td>
                                                            <td> : </td>
                                                            <td><?= $data->luas_bangunan  . ' M<sup>2</sup>' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lokasi Tanah</td>
                                                            <td> : </td>
                                                            <td><?= $data->lokasi_tanah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tempat Arsip</td>
                                                            <td> : </td>
                                                            <td><?= $data->tempat_arsip ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keterangan</td>
                                                            <td> : </td>
                                                            <td><?= $data->keterangan_tanah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Wakaf</td>
                                                            <td> : </td>
                                                            <td><?= $this->fungsi->tgl_indo($data->tgl_wakaf) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Terdaftar</td>
                                                            <td> : </td>
                                                            <td><?= $this->fungsi->tgl_indo($data->created_wakaf_tanah) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Pembaharuan</td>
                                                            <td> : </td>
                                                            <td><?= $this->fungsi->tgl_indo($data->updated_wakaf_tanah == null ? '-' : $data->updated_wakaf_tanah) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Qr Code tanah <br><small><b> (Silahkan generate jika Qr-Code tidak ada)</b></small></td>
                                                            <td> : </td>
                                                            <td>
                                                                <form action="<?= site_url('wakaf/wakaf_tanah/generate_qrCode/') ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $data->id_wakaf_tanah ?>">
                                                                    <input type="hidden" name="nama" value="<?= $data->lokasi_tanah ?>">
                                                                    <input type="hidden" name="instansi" value="<?= $data->nama_ranting ?>">
                                                                    <button type="submit" target="_blank" class="btn btn-info btn-sm"> Generate </button>
                                                                </form>
                                                                <?php
                                                                $dir = base_url() . 'uploads/wakaf_tanah/qrCode/' . $data->id_wakaf_tanah . '.png';
                                                                if (!$dir) {
                                                                    echo "Silahkan Generate Terlebih Dahulu";
                                                                } else {
                                                                    echo '<a href="'.$dir.'" target="_blank"><img src="' . $dir . '" style="width:100px; margin-top: 10px"></a>';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
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
                            <?php if ($data->doc_wakaf_tanah != null) { ?>
                                <a href="<?= site_url('uploads/wakaf_tanah/' . $data->doc_wakaf_tanah) ?>" target="_blank">
                                    <button class="btn btn-deeporange deeporange-icon-notika waves-effect"><i class="notika-icon notika-down-arrow"></i> Unduh </button>
                                </a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?= site_url('wakaf/wakaf_tanah/edit/' . $data->id_wakaf_tanah) ?>" class="btn btn-amber amber-icon-notika waves-effect btn-sm">
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
                                            window.location = "<?= site_url('wakaf/wakaf_tanah/del/' . $data->id_wakaf_tanah) ?>";
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
                                        text: "data yang diriwayatkan akan dipindahkan ke daftar riwayat Wakaf !",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, riwayatkan'
                                    }).then((result) => {
                                        if (result.value) {
                                            window.location = "<?= site_url('wakaf/wakaf_tanah/riwayat/' . $data->id_wakaf_tanah) ?>";
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
                    $total = $total + $data->harga_tanah;
                } ?>
            </tbody>
            <tfoot>
                <td colspan="3"><b> Total Nilai Wakaf </b></td>
                <td><b><?= $this->money->rupiah($total) ?></b></td>
                <td colspan="3"><b><?= $this->money->terbilang($total) . " Rupiah" ?></b></td>
            </tfoot>
        </table>
    </div>