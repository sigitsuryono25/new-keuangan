<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="summary <?php echo $this->session->userdata('nama_project') ?>">
        <meta name="author" content="">

        <title>Summary <?php echo $this->session->userdata('nama_project') ?></title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/') ?>vendor/bootstrap-radio-checkbox-list-group-item/bootstrap-checkbox-radio-list-group-item.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/') ?>js/demo/keuangan.js"></script>

    </head>
    <style>
        @media print {
            /* style sheet for print goes here */
            .print-container {
                visibility: hidden;
            }
        }
    </style>
    <body>
        <?php $total = 0; ?>
        <div class="container p-5">
            <h6 class="font-weight-bold text-uppercase text-dark text-center">rencana anggaran dan belanja</h6>
            <h6 class="font-weight-bold text-uppercase text-dark text-center">pengadaan <?php echo $this->session->userdata('nama_project') ?></h6>
            <h6 class="font-weight-bold text-uppercase text-dark text-center">tahun <?php echo $this->input->get('tahun') ?></h6>
            <div class="row my-4 print-container">
                <div class="col-md-12 text-right">
                    <button class="btn btn-outline-info" onclick="window.print()"><i class="fa fa-print"></i>&nbsp; Cetak</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover text-dark">
                    <thead>
                        <tr>
                            <th>Uraian</th>
                            <th>%</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="font-weight-bold">Nilai Anggaran</span></td>
                            <td></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class=""><?php echo $this->etc->rps($anggaran->row()->anggaran) ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="">PPN</span></td>
                            <td></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class=""><?php echo $this->etc->rps($anggaran->row()->ppn) ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="">PPH</span></td>
                            <td></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class=""><?php echo $this->etc->rps($anggaran->row()->pph) ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr style="background-color: #FFFF00">
                            <td><span class="font-weight-bold">Pendapatan setelah pajak dan barang</span></td>
                            <td></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class="font-weight-bold"><?php
                                        $akhir = $anggaran->row()->anggaran - $anggaran->row()->ppn - $anggaran->row()->pph;
                                        echo $this->etc->rps($akhir);
                                        ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td><span class="font-weight-bold">Rincian Biaya</span></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Biaya Administrasi</td>
                            <td><?php echo floor(($administrasi->total_harga_satuan / $akhir) * 100) ?> %</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class="font-weight-bold"><?php
                                        $total += $administrasi->total_harga_satuan;
                                        echo $this->etc->rps($administrasi->total_harga_satuan)
                                        ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Biaya Produksi dan Operasional</td>
                            <td><?php echo floor(($produksi->total_harga_satuan / $akhir) * 100) ?> %</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class="font-weight-bold"><?php
                                        $total += $produksi->total_harga_satuan;
                                        echo $this->etc->rps($produksi->total_harga_satuan)
                                        ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Biaya Hardware & Infrastruktur</td>
                            <td><?php echo floor(($peralatan->total_harga_satuan / $akhir) * 100) ?> %</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class="font-weight-bold"><?php
                                        $total += $peralatan->total_harga_satuan;
                                        echo $this->etc->rps($peralatan->total_harga_satuan)
                                        ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Biaya Perawatan / Garansi</td>
                            <td><?php echo floor(($perawatan->total_harga_satuan / $akhir) * 100) ?> %</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class="font-weight-bold"><?php
                                        $total += $perawatan->total_harga_satuan;
                                        echo $this->etc->rps($perawatan->total_harga_satuan)
                                        ?></span>
                                </div>
                            </td>
                        </tr>
                        <!--NEW ROW WILL ADDED IN HERE-->
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                        <tr style="background-color: #FFFF00">
                            <td><span class="font-weight-bold">Total Biaya Produksi yang dibutuhkan</span></td>
                            <td><?php echo floor(($total / $akhir) * 100) ?> %</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class="font-weight-bold"><?php echo $this->etc->rps($total) ?></span>
                                </div>
                            </td>
                        </tr>

                        <tr style="background-color: #FFFF00">
                            <td><span class="font-weight-bold">Perkiraan Rugi Laba</span></td>
                            <td><?php echo floor(($total / $akhir) * 100) ?> %</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    Rp.
                                    <span class="font-weight-bold"><?php echo $this->etc->rps($akhir - $total) ?></span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 text-center">
                    <h6>&nbsp;</h6>
                    <h6>Yang menyetujui</h6>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <h6>(..........................................................................)</h6>
                    <h6>............................................................................</h6>
                </div>
                <div class="col-md-4 offset-4  text-center">
                    <h6>........................, .................................................</h6>
                    <h6>Yang Membuat</h6>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <h6>(..........................................................................)</h6>
                    <h6>............................................................................</h6>
                </div>
            </div>
        </div>
    </body>
</html>
