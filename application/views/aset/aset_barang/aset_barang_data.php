    <?php $this->view('messages'); ?> 
          <div class="row">
              <div class="col-lg-12">
                  <div class="basic-tb-hd" style="padding-bottom : 20px">
                      <h2>Daftar Seluruh Kehartabendaan </h2>
                      <a href="<?=site_url('asset/aset_barang/add_aset')?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-pencil"></i> Tambah</a>
                  </div>
              </div>
          </div>
          <div class="box-body table-responsive no-padding">
              <table id="data-table-basic" class="table table-striped">
                <thead><tr>
                    <th>#</th>
                    <th>Instansi</th>
                    <th>Nama Barang</th>
                    <th width="20%">Harga Barang</th>
                    <th>Kondisi Barang </th>
                    <th>Rician Barang</th>
                    <th width="150px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $no = 1;
                    $total = 0;
                    foreach ($row->result() as $key => $data) { 
                         $id_barang = $data->id_aset_barang ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data->nama_ranting?></td>
                            <td><?=$data->nama_aset?></td>
                            <td><?=$this->money->rupiah($data->harga_aset)?></td>
                            <td><?=$data->kondisi_aset == 'A' ? 'Baik' : ($data->kondisi_aset == 'B' ? 'Rusak Ringan' : 'Rusak Berat')?></td>
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
                                                        <h2>Rincian Kehartabendaan </h2>
                                                            <table class="table table-bordered">
                                                            <tr>
                                                                <td width="40%">Nama Aset</td>
                                                                <td width="5%"> : </td>
                                                                <td><?=$data->nama_aset?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Aset</td>
                                                                <td> : </td>
                                                                <td><?=$data->jenis_aset?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kondisi Aset</td>
                                                                <td> : </td>
                                                                <td><?=$data->kondisi_aset == 'A' ? 'Baik' : ($data->kondisi_aset == 'B' ? 'Rusak Ringan' : 'Rusak Berat')?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Harga Aset</td>
                                                                <td> : </td>
                                                                <td><?=$this->money->rupiah($data->harga_aset)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jumlah Aset</td>
                                                                <td> : </td>
                                                                <td><?=$data->jumlah_aset." Unit"?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Nilai Aset</td>
                                                                <td> : </td>
                                                                <td><?=$this->money->rupiah($data->harga_aset * $data->jumlah_aset)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Keterangan</td>
                                                                <td> : </td>
                                                                <td><?=$data->keterangan?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Terdaftar</td>
                                                                <td> : </td>
                                                                <td><?=$this->fungsi->tgl_indo($data->created_aset_barang)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Pembaharuan</td>
                                                                <td> : </td>
                                                                <td><?=$this->fungsi->tgl_indo($data->updated_aset_barang ==null ? '-' : $data->updated_aset_barang)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dokumentasi Barang </td>
                                                                <td> : </td>
                                                                <td>
                                                                    <?php if($data->gambar_aset == null){ ?>
                                                                       <img src="<?=site_url('uploads/aset_barang/')?>default.jpg" width="90px">
                                                                    <?php }else{ ?>
                                                                        <a href="<?=site_url('uploads/aset_barang/'.$data->gambar_aset)?>" target="_blank"><img src="<?=site_url('uploads/aset_barang/')?><?=$data->gambar_aset?>" width="90px"></a>
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
                                <a href="<?=site_url('asset/aset_barang/edit_aset/'.$data->id_aset_barang)?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?=site_url('asset/aset_barang/del/'.$data->id_aset_barang)?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash-o"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php 
                        $total = $total + ($data->jumlah_aset * $data->harga_aset);
                        }?>
              </tbody>
              <tfoot>
                    <td colspan="3"><b> Total Nilai Kehartabendaan </b></td>
                    <td><b><?=$this->money->rupiah($total)?></b></td>
                    <td colspan="3"><b><?=$this->money->terbilang($total)." Rupiah"?></b></td>
              </tfoot>
              </table>
            </div>
            
           

                 