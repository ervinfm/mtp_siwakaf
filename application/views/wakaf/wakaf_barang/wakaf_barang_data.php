    <?php $this->view('messages'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="basic-tb-hd" style="padding-bottom : 20px">
                <h2>Daftar Seluruh Wakaf Benda </h2>
                <a href="<?= site_url('wakaf/wakaf_barang/add') ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-pencil"></i> Tambah</a>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Instansi</th>
                    <th>Nama Barang Wakaf</th>
                    <th width="15%">Nilai Barang</th>
                    <th>Tanggal Wakaf </th>
                    <th>Rincian</th>
                    <th> Berita Acara</th>
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
                        <td><?= $data->nama_barang ?></td>
                        <td><?= $this->money->rupiah($data->nilai_barang) ?></td>
                        <td><?= $this->fungsi->TanggalIndonesia($data->tgl_wakaf) ?></td>
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
                                                    <h2>Rincian Wakaf Barang </h2>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td width="40%">Nama Barang</td>
                                                            <td width="5%"> : </td>
                                                            <td><?= $data->nama_barang ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Wakif</td>
                                                            <td> : </td>
                                                            <td><?= $data->wakif ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Mauquf</td>
                                                            <td> : </td>
                                                            <td><?= $data->mauquf ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Barang</td>
                                                            <td> : </td>
                                                            <td><?= $data->jenis_barang ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>nilai barang</td>
                                                            <td> : </td>
                                                            <td><?= $this->money->rupiah($data->nilai_barang) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah barang</td>
                                                            <td> : </td>
                                                            <td><?= $data->jumlah_barang . " Unit" ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Nilai barang</td>
                                                            <td> : </td>
                                                            <td><?= $this->money->rupiah($data->nilai_barang * $data->jumlah_barang) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keterangan</td>
                                                            <td> : </td>
                                                            <td><?= $data->keterangan ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Terdaftar</td>
                                                            <td> : </td>
                                                            <td><?= $this->fungsi->tgl_indo($data->created_wakaf_barang) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Pembaharuan</td>
                                                            <td> : </td>
                                                            <td><?= $this->fungsi->tgl_indo($data->updated_wakaf_barang == null ? '-' : $data->updated_wakaf_barang) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Qr Code Barang <br><small><b> (Silahkan generate jika Qr-Code tidak ada)</b></small></td>
                                                            <td> : </td>
                                                            <td>
                                                                <form action="<?= site_url('wakaf/wakaf_barang/generate_qrCode/') ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $data->id_wakaf_barang ?>">
                                                                    <input type="hidden" name="nama" value="<?= $data->nama_barang ?>">
                                                                    <input type="hidden" name="instansi" value="<?= $data->nama_ranting ?>">
                                                                    <button type="submit" target="_blank" class="btn btn-info btn-sm"> Generate </button>
                                                                </form>
                                                                <?php
                                                                $dir = base_url() . 'uploads/wakaf_barang/qrCode/' . $data->id_wakaf_barang . '.png';
                                                                if (!$dir) {
                                                                    echo "Silahkan Generate Terlebih Dahulu";
                                                                } else {
                                                                    echo '<img src="' . $dir . '" style="width:100px; margin-top: 10px">';
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
                            <?php if ($data->doc_wakaf_barang != null) { ?>
                                <a href="<?= site_url('uploads/wakaf_barang/' . $data->doc_wakaf_barang) ?>" target="_blank">
                                    <button class="btn btn-deeporange deeporange-icon-notika waves-effect"><i class="notika-icon notika-down-arrow"></i> Unduh </button>
                                </a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?= site_url('wakaf/wakaf_barang/edit/' . $data->id_wakaf_barang) ?>" class="btn btn-amber amber-icon-notika waves-effect btn-sm">
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
                                            window.location = "<?= site_url('wakaf/wakaf_barang/del/' . $data->id_wakaf_barang) ?>";
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
                                            window.location = "<?= site_url('wakaf/wakaf_barang/riwayat/' . $data->id_wakaf_barang) ?>";
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
                    $total = $total + ($data->jumlah_barang * $data->nilai_barang);
                } ?>
            </tbody>
            <tfoot>
                <td colspan="3"><b> Total Nilai Wakaf </b></td>
                <td><b><?= $this->money->rupiah($total) ?></b></td>
                <td colspan="3"><b><?= $this->money->terbilang($total) . " Rupiah" ?></b></td>
            </tfoot>
        </table>
    </div>