<?php $this->view('messages'); ?> 
        <div class="row">
            <div class="col-lg-12">
                <div class="data-table-area">
                    <div class="data-table-list">  
                        <div class="col-lg-3"></div>
                        <div class="basic-tb-hd col-lg-6" style="padding-bottom : 10px; margin-bottom : 40px; border-bottom: 2px solid black;">
                            <h2><center>Rekapitulasi Pengelolaan Wakaf</center></h2>
                            <p><center><?=$this->fungsi->user_login()->nama_ranting?></center></p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-table-basic">
                                <thead style=" font-weight: bolder;text-align: center;">
                                    <tr>
                                        <th width="3%">#</th>
                                        <th>Instansi</th>
                                        <th>Barang</th>
                                        <th>Nilai Barang</th>
                                        <th>Tanah </th>
                                        <th>Nilai Tanah</th>
                                        <th>Uang</th>
                                        <th>Nilai Uang</th>
                                        <th>Nilai Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                            $no = 1;
                                            $total_wakaf_barang = 0;
                                            $total_nilai_barang = 0; 
                                            $total_wakaf_tanah = 0; 
                                            $total_nilai_tanah = 0;
                                            $total_wakaf_uang = 0; 
                                            $total_nilai_uang = 0;

                                            $total_nilai_all = 0;  

                                            foreach ($ranting->result() as $key => $data) { ?>
                                            <tr>
                                                    <td><?=$no++?></td>
                                                    <td><?=$data->nama_ranting?></td>
                                                    <td>
                                                        <?php 
                                                            foreach($wakaf_barang->result() as $key => $data1){
                                                                if($data1->id == $data->id_ranting){
                                                                    echo $data1->jumlah_barang." item" ;
                                                                    $total_wakaf_barang =  $total_wakaf_barang + $data1->jumlah_barang;
                                                                } 
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $total_n_barang =  0;
                                                            foreach ($n_barang->result() as $key => $data_b) {
                                                                if($data_b->id == $data->id_ranting){
                                                                    $total_n_barang += $data_b->n_barang;
                                                                }
                                                            }
                                                            echo $this->money->rupiah($total_n_barang) ;
                                                            $total_nilai_barang += $total_n_barang;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            foreach($wakaf_tanah->result() as $key => $data2){
                                                                if($data2->id == $data->id_ranting){
                                                                    echo $data2->jumlah_tanah." item" ;
                                                                    $total_wakaf_tanah =  $total_wakaf_tanah + $data2->jumlah_tanah;
                                                                }    
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $total_n_tanah =  0;
                                                            foreach ($n_tanah->result() as $key => $data_t) {
                                                                if($data_t->id == $data->id_ranting){
                                                                    $total_n_tanah += $data_t->n_tanah;
                                                                }
                                                            }
                                                            echo $this->money->rupiah($total_n_tanah) ;
                                                            $total_nilai_tanah += $total_n_tanah;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            foreach($wakaf_uang->result() as $key => $data3){
                                                                if($data3->id == $data->id_ranting){
                                                                    echo $data3->jumlah_uang." item" ;
                                                                    $total_wakaf_uang += $data3->jumlah_uang;
                                                                }    
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $total_n_uang =  0;
                                                            foreach ($n_uang->result() as $key => $data_u) {
                                                                if($data_u->id == $data->id_ranting){
                                                                    $total_n_uang += $data_u->n_uang;
                                                                }
                                                            }
                                                            echo $this->money->rupiah($total_n_uang) ;
                                                            $total_nilai_uang += $total_n_uang;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?=$this->money->rupiah($total_n_barang + $total_n_tanah + $total_n_uang)?>
                                                        <?php $total_nilai_all =  $total_nilai_all + ($total_n_barang + $total_n_tanah+ $total_n_uang)?>
                                                    </td>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"><strong> Total Keseluruhan </strong></td>
                                        <td><strong><?=$total_wakaf_barang." item"?></strong></td>
                                        <td><strong><?=$this->money->rupiah($total_nilai_barang)?></strong></td>
                                        <td><strong><?=$total_wakaf_tanah." lahan"?></strong></td>
                                        <td><strong><?=$this->money->rupiah($total_nilai_tanah)?></strong></td>
                                        <td><strong><?=$total_wakaf_uang." item"?></strong></td>
                                        <td><strong><?=$this->money->rupiah($total_nilai_uang)?></strong></td>
                                        <td><strong><?=$this->money->rupiah($total_nilai_all)?></strong></td>
                                    </tr>
                                </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
            
           

                 