    <?php $this->view('messages'); ?> 
          <div class="row">
              <div class="col-lg-12">
                  <div class="basic-tb-hd" style="padding-bottom : 20px">
                      <h2>Daftar Seluruh Wakaf Uang </h2>
                      <a href="<?=site_url('wakaf/wakaf_uang/add')?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-pencil"></i>Tambah</a>
                  </div>
              </div>
          </div>
          <div class="box-body table-responsive no-padding">
              <table id="data-table-basic" class="table table-striped">
                <thead><tr>
                    <th>#</th>
                    <th>Instansi</th>
                    <th>Nama Wakif</th>
                    <th>Nama Mauquf</th>
                    <th width="15%">Nilai Wakaf</th>
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
                            <td><?=$data->nama_wakif?></td>
                            <td><?=$data->nama_mauquf?></td>
                            <td><?=$this->money->rupiah($data->nilai_wakaf)?></td>
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
                                                        <h2>Rincian Wakaf uang </h2>
                                                            <table class="table table-bordered">
                                                            <tr>
                                                                <td width="40%">Tanggal Pewakafan</td>
                                                                <td width="5%"> : </td>
                                                                <td><?=$this->fungsi->TanggalIndonesia($data->tgl_wakaf)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Keterangan Wakaf</td>
                                                                <td> : </td>
                                                                <td><?=$data->keterangan?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Besaran Wakaf</td>
                                                                <td> : </td>
                                                                <td><?=$this->money->rupiah($data->nilai_wakaf)?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dokumentasi uang </td>
                                                                <td> : </td>
                                                                <td>
                                                                    <?php if($data->doc_wakaf_uang == null){ ?>
                                                                       <img src="<?=site_url('uploads/wakaf_uang/')?>default.jpg" width="90px">
                                                                    <?php }else{ ?>
                                                                        <a href="<?=site_url('uploads/wakaf_uang/'.$data->doc_wakaf_uang)?>" target="_blank"><img src="<?=site_url('uploads/wakaf_uang/')?><?=$data->doc_wakaf_uang?>" width="90px"></a>
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
                                <a href="<?=site_url('wakaf/wakaf_uang/edit/'.$data->id_wakaf_uang)?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?=site_url('wakaf/wakaf_uang/del/'.$data->id_wakaf_uang)?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash-o"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php 
                        $total = $total + $data->nilai_wakaf ;
                        }?>
              </tbody>
              <tfoot>
                    <td colspan="3"><b> Total Nilai Wakaf </b></td>
                    <td><b><?=$this->money->rupiah($total)?></b></td>
                    <td colspan="3"><b><?=$this->money->terbilang($total)." Rupiah"?></b></td>
              </tfoot>
              </table>
            </div>
            
           

                 