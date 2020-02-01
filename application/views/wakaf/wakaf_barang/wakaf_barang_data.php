    <?php $this->view('messages'); ?> 
          <div class="row">
              <div class="col-lg-12">
                  <div class="basic-tb-hd" style="padding-bottom : 20px">
                      <h2>Daftar Seluruh Wakaf Benda </h2>
                      <a href="<?=site_url('wakaf/wakaf_barang/add')?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-pencil"></i> Tambah</a>
                  </div>
              </div>
          </div>
          <div class="box-body table-responsive no-padding">
              <table id="data-table-basic" class="table table-striped">
                <thead><tr>
                    <th>#</th>
                    <th>Instansi</th>
                    <th>Nama Wakif</th>
                    <th>Nama Barang Wakaf</th>
                    <th width="15%">Nilai Barang</th>
                    <th>Tanggal Wakaf </th>
                    <th width="5%">Rincian</th>
                    <th width="150px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $no = 1;
                    $total = 0;
                    foreach ($row->result() as $key => $data) {?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data->nama_ranting?></td>
                            <td><?=$data->wakif?></td>
                            <td><?=$data->nama_barang?></td>
                            <td><?=$this->money->rupiah($data->nilai_barang)?></td>
                            <td><?=$this->fungsi->TanggalIndonesia($data->tgl_wakaf)?></td>
                            <td>
                                <button type="button" class="btn btn-teal teal-icon-notika btn-reco-mg btn-button-mg waves-effect" data-toggle="modal" data-target="#rincian<?=$no?>"> 
                                    <i class="notika-icon notika-refresh"></i>
                                </button>
                                <!-- Start Part Modals -->
                                <div class="modals-single">
                                    <div class="modals-default-cl">
                                        <div class="modal fade" id="rincian<?=$no?>" role="dialog" style="display: none;">
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
                                                                <td><?=$data->nama_barang?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Mauquf</td>
                                                                <td> : </td>
                                                                <td><?=$data->mauquf?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Barang</td>
                                                                <td> : </td>
                                                                <td><?=$data->jenis_barang?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>nilai barang</td>
                                                                <td> : </td>
                                                                <td><?=$this->money->rupiah($data->nilai_barang)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jumlah barang</td>
                                                                <td> : </td>
                                                                <td><?=$data->jumlah_barang." Unit"?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Nilai barang</td>
                                                                <td> : </td>
                                                                <td><?=$this->money->rupiah($data->nilai_barang * $data->jumlah_barang)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Keterangan</td>
                                                                <td> : </td>
                                                                <td><?=$data->keterangan?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Terdaftar</td>
                                                                <td> : </td>
                                                                <td><?=$this->fungsi->tgl_indo($data->created_wakaf_barang)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Pembaharuan</td>
                                                                <td> : </td>
                                                                <td><?=$this->fungsi->tgl_indo($data->updated_wakaf_barang ==null ? '-' : $data->updated_wakaf_barang)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dokumentasi Barang </td>
                                                                <td> : </td>
                                                                <td>
                                                                    <?php if($data->doc_wakaf_barang == null){ ?>
                                                                       <img src="<?=site_url('uploads/wakaf_barang/')?>default.jpg" width="90px">
                                                                    <?php }else{ ?>
                                                                        <a href="<?=site_url('uploads/wakaf_barang/'.$data->doc_wakaf_barang)?>" target="_blank"><img src="<?=site_url('uploads/wakaf_barang/')?><?=$data->doc_wakaf_barang?>" width="90px"></a>
                                                                    <?php } ?>
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
                                <a href="<?=site_url('wakaf/wakaf_barang/edit/'.$data->id_wakaf_barang)?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?=site_url('wakaf/wakaf_barang/del/'.$data->id_wakaf_barang)?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash-o"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php 
                        $total = $total + ($data->jumlah_barang * $data->nilai_barang);
                        }?>
              </tbody>
              <tfoot>
                    <td colspan="3"><b> Total Nilai Wakaf </b></td>
                    <td><b><?=$this->money->rupiah($total)?></b></td>
                    <td colspan="3"><b><?=$this->money->terbilang($total)." Rupiah"?></b></td>
              </tfoot>
              </table>
            </div>
            
           

                 