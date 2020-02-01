<?php $this->view('messages'); ?> 
          <div class="row">
                <div class="col-lg-12">
                <div class="data-table-area">
                    <div class="data-table-list">  
                        <div class="basic-tb-hd" style="padding-bottom : 20px">
                            <h2>Rincian admin</h2>
                            <a href="<?=site_url('admin/add')?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-pencil"></i> Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Admin </th>
                                        <th>Instansi</th>
                                        <th>Alamat Instansi</th>
                                        <th>Status Akun</th>
                                        <th>Detail</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($row->result() as $key => $data) { ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$data->nama_admin?></td>
                                                <td><?=$data->nama_ranting?></td>
                                                <td><?=$data->nama_ranting?></td>
                                                <td>
                                                    <?php if($data->status == 1 ){ ?>
                                                        <a href="<?=site_url('admin/status/'.$data->id_admin)?>" class="btn btn-success btn-sm">Aktif</a>
                                                    <?php }else{?>
                                                        <a href="<?=site_url('admin/status/'.$data->id_admin)?>" class="btn btn-danger btn-sm">Non-Aktif</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-teal teal-icon-notika btn-reco-mg btn-button-mg waves-effect" data-toggle="modal" data-target="#rincian<?=$no?>"> 
                                                        <i class="notika-icon notika-refresh"></i>
                                                    </button>
                                                    <div class="modals-single">
                                                        <div class="modals-default-cl">
                                                            <div class="modal fade" id="rincian<?=$no?>" role="dialog" style="display: none;">
                                                                <div class="modal-dialog modals-default">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h2>Rincian Admin </h2>
                                                                                <table class="table table-bordered">
                                                                                <tr>
                                                                                    <td width="30%">Username</td>
                                                                                    <td width="3%"> : </td>
                                                                                    <td><?=$data->username?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Alamat</td>
                                                                                    <td> : </td>
                                                                                    <td><?=$data->alamat?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Telepon</td>
                                                                                    <td> : </td>
                                                                                    <td><?=$data->telp?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Level</td>
                                                                                    <td> : </td>
                                                                                    <td><?=$data->level == 1 ? 'Admin Cabang' : 'Admin Ranting' ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Pendaftaran</td>
                                                                                    <td> : </td>
                                                                                    <td><?=$this->fungsi->tgl_indo($data->created)?></td>
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
                                                </td>
                                                <td class="text-center" width="160px">
                                                    <form action="<?=site_url('admin/del')?>" method="post">
                                                    <input type="hidden" name="id" value="<?=$data->id_admin?>">  
                                                    <a href="<?=site_url('admin/edit/'.$data->id_admin)?>" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <button onclick="return confirm('Yakin akan menghapus [<?=$data->nama_admin?>] ?');" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o"></i> Hapus
                                                    </button >
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <th></th><th><th></th></th><th></th><th></th><th></th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
          </div>
            <!-- Start Part Modals -->
            <div class="modals-list mg-t-30">
                <div class="modals-single">
                    <div class="modals-default-cl">
                        <div class="modal fade" id="rincian" role="dialog" style="display: none;">
                            <div class="modal-dialog modals-default">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Rincian Admin </h2>
                                            <table class="table table-bordered">
                                            <tr>
                                                <td width="30%">Id Admin</td>
                                                <td width="3%"> : </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td> : </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td> : </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td> : </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Terdaftar Pada</td>
                                                <td> : </td>
                                                <td></td>
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
            </div>
            <!-- End part Modals -->           