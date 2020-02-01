<?php $this->view('messages'); ?> 
          <div class="row">
              <div class="col-lg-12">
                <div class="data-table-area">
                      <div class="data-table-list"> 
                          <div class="basic-tb-hd" style="padding-bottom : 5px">
                              <h2>Rincian Ranting</h2>
                              <a href="<?=site_url('ranting/add')?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-pencil"></i> Tambah</a>
                          </div>
                      </div>
                 </div>
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-striped" id="data-table-basic">
                      <thead><tr>
                          <th>#</th>
                          <th>Kode Ranting</th>
                          <th>Nama Ranting</th>
                          <th>Pimpinan Ranting</th>
                          <th>Telepon Ranting </th>
                          <th>Alamat Ranting</th>
                          <th width="150px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          $no = 1;
                          foreach ($row->result() as $key => $data) { ?>
                              <tr>
                                  <td><?=$no++?></td>
                                  <td><?=$data->kode_ranting?></td>
                                  <td><?=$data->nama_ranting?></td>
                                  <td><?=$data->pimpinan?></td>
                                  <td><?=$data->telp_ranting?></td>
                                  <td><?=$data->alamat_ranting?></td>
                                  <td class="text-center" width="160px">
                                      <form action="<?=site_url('ranting/del')?>" method="post">
                                        <input type="hidden" name="id" value="<?=$data->id_ranting?>">  
                                        <a href="<?=site_url('ranting/edit/'.$data->id_ranting)?>" class="btn btn-warning btn-sm">
                                          <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <button onclick="return confirm('Yakin akan menghapus [<?=$data->nama_ranting?>] ?');" class="btn btn-danger btn-sm">
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