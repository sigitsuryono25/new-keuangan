<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="summary <?php echo $this->session->userdata('nama_project') ?>">
        <meta name="author" content="">

        <title>Detail Anggaran <?php echo $this->session->userdata('nama_project') ?></title>

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
    <body onload="window.print()">
        <div class="container p-5">
            <h6 class="font-weight-bold text-uppercase text-dark text-center">Detail Anggaran dan belanja</h6>
            <h6 class="font-weight-bold text-uppercase text-dark text-center"><?php echo $this->session->userdata('nama_project') ?></h6>
            <h6 class="font-weight-bold text-uppercase text-dark text-center">selama tahun <?php echo $this->input->get('tahun') ?></h6>
            <div class="row my-4 print-container">
                <div class="col-md-12 text-right">
                    <button class="btn btn-outline-info" onclick="window.print()"><i class="fa fa-print"></i>&nbsp; Cetak</button>
                </div>
            </div>
            <?php
            $tahun = $this->input->get('tahun');
            $bulan = $this->anggaran->getBulanByTahunAnggaran($tahun)->result();
            foreach ($bulan as $b) {
                ?>
                <div class="container-fluid border p-4 m-2">
                    <h4 class="text-dark font-weight-bold"><?php echo $b->nama_bulan ?></h4>
                    <?php foreach ($kategori as $key => $k) {
                        ?>
                        <div class="container-fluid p-4 m-2">
                            <h4 class="text-dark font-weight-bold"><?php echo $k->nama_kategori ?></h4>
                            <?php
                            $pos = $this->pos->getPosByIdKategori($k->id_kategori);
                            if ($pos->num_rows() > 0) {
                                foreach ($pos->result() as $urut => $p) {
                                    ?>
                                    <h6><?php echo $urut + 1 . ". " . $p->nama_pos ?></h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Uraian</th>
                                                    <th>Volume</th>
                                                    <th>Satuan</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                $idProject = $this->session->userdata('id_project');
                                                $detail = $this->anggaran->detail_anggaran($b->id_bulan, $p->id_pos, $idProject, $tahun);
                                                foreach ($detail->result() as $nomor => $d) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nomor + 1 ?></td>
                                                        <td><?php echo $d->uraian ?></td>
                                                        <td><?php echo $d->volume ?></td>
                                                        <td><?php echo $d->satuan ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between">
                                                                Rp.
                                                                <span>
                                                                    <?php echo $this->etc->rps($d->harga_satuan) ?>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-between">
                                                                Rp.
                                                                <span>
                                                                    <?php
                                                                    echo $this->etc->rps($d->harga_satuan * $d->volume);
                                                                    $total+=$d->harga_satuan * $d->volume
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr style="background-color: #FFFF00" class="font-weight-bold  text-dark">
                                                    <td colspan="5">Total</td>
                                                    <td >
                                                        <div class="d-flex justify-content-between">
                                                            Rp.
                                                            <span>
                                                                <?php echo $this->etc->rps($total) ?>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "Tidak ada pengeluaran";
                            }
                            ?>
                        </div>
                    <?php }
                    ?>

                </div>
            <?php }
            ?>
        </div>
    </body>
</html>
