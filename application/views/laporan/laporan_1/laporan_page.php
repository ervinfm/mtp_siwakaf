<?php $this->view('messages'); ?> 
          <div class="row">
                <div class="col-lg-12">
                <div class="data-table-area">
                    <div class="data-table-list">  
                        <div class="basic-tb-hd" style="padding-bottom : 20px">
                            <h2>Laporan <?=$page?></h2>
                            <a href="<?=site_url('laporan/laporan/'.$link)?>" target="_blank" class="btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg waves-effect pull-right"> 
                                <i class="notika-icon notika-refresh"></i>  Cetak Semua Laporan
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Instansi </th>
                                        <th>Nama Pimpinan</th>
                                        <th>Alamat Instansi</th>
                                        <th colspan="2"><center>Laporan</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($row->result() as $key => $data) { ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$data->nama_ranting?></td>
                                                <td><?=$data->pimpinan?></td>
                                                <td><?=$data->alamat_ranting?></td>
                                                <td class="text-center" width="160px">
                                                    <a href="<?=site_url('laporan/laporan/'.$link.'/?id='.$data->id_ranting.'&cat=view')?>" target="_blank" class="btn btn-cyan cyan-icon-notika btn-reco-mg btn-button-mg waves-effect"> 
                                                        <i class="notika-icon notika-refresh"></i>   Lihat Laporan
                                                    </a>
                                                </td>
                                                <td class="text-center" width="160px">
                                                    <a href="<?=site_url('laporan/laporan/'.$link.'/?id='.$data->id_ranting.'&cat=print')?>" target="_blank" class="btn btn-teal teal-icon-notika btn-reco-mg btn-button-mg waves-effect"> 
                                                        <i class="notika-icon notika-refresh"></i>   Cetak Laporan
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <th></th><th></th><th></th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
          </div>
           