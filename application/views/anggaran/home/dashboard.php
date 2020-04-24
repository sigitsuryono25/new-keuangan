<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 text-gray-800"><?php echo $page_title ?></h1>
            <h5 class="text-gray-800"><?php
                echo (!empty($this->session->userdata('final_anggaran'))) ? "Pendapatan setelah barang dan pajak: " .
                        $this->etc->rps($this->session->userdata('final_anggaran')) : ""
                ?>
            </h5>
        </div>
        <div class="col-md-6 text-right">
            <h5 class="text-primary"><i class="fas fa-industry"></i> 
                <?php echo $this->session->userdata('perusahaan') ?>
                <br>
            </h5>
            <span class="text-success"><i class="fas fa-users"></i>&nbsp;<?php echo (!empty($this->session->userdata('nama_project')) ? $this->session->userdata('nama_project') . " (" . $this->session->userdata('nama_klien') . ")" : "Belum ada Klien terpilih") ?></span><br>
            <a href="<?php echo site_url('anggaran/end_session_anggaran') ?>" onclick="return confirm('Akhiri sessi input data?')" class="text-danger text-decoration-none font-weight-bold">Akhiri Sesi <i class="fas fa-power-off"></i></a>
        </div>
    </div>
    <?php if (empty($this->session->userdata('nama_project'))) { ?>
        <div class="row p-3 border ml-1 mr-1 mt-1 mb-3">
            <div class="col-md-12 col-lg-12 mb-2">
                <h5 class="text-dark">Buat Project</h5>
                <div id="accordion-project" title="Tambah, Edit dan Generate Laporan Project">
                    <div class="card">
                        <div class="card-header bg-danger shadow-sm d-flex justify-content-between" id="project">
                            <a href="javaascript:void(0)" class="h4 text-white text-center text-decoration-none mt-1" data-toggle="collapse" data-target="#projectCollapse" aria-expanded="true" aria-controls="projectCollapse">
                                <i class="fas fa-plus"></i>&nbsp;&nbsp;
                                <span class="text-center">Project</span>
                            </a>
                            <i class="fas fa-caret-down mt-2 text-white"></i>
                        </div>

                        <div id="projectCollapse" class="collapse" aria-labelledby="project" data-parent="#accordion-project">
                            <div class="card-body p-0">
                                <ul class="list-group border-0">
                                    <a href="javascript:void(0)" onclick="mode = 'add'" data-target="#form-add-project" data-toggle="modal" 
                                       class="text-decoration-none list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-plus mt-1  "></i>
                                        Tambah Project
                                    </a>
                                    <a href="javascript:void(0)" data-target="#modal-project" data-toggle="modal" 
                                       class="text-decoration-none list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-list mt-1  "></i>
                                        Daftar Project
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h5 class="text-dark">atau</h5>
            </div>
            <div class="col-md-12 text-center  mt-2">
                <form action="<?php echo site_url('anggaran/start_session_client') ?>" method="POST" onsubmit="return confirm('Lanjutkan dengan klien ini?')">
                    <h5 class="font-weight-bold text-gray-800  text-left">Pilih Project/Klien</h5>
                    <select class="form-control" name="id-klien" required>
                        <option value="">--Silahkan Pilih Satu--</option>
                        <?php foreach ($client as $c) { ?>
                            <option value="<?php echo $c->id_project ?>"><?php echo $c->nama_project ?> (<?php echo $c->nama_klien ?>)</option>
                        <?php } ?>
                    </select>
                    <div class="text-right">
                        <button type="submit" class="btn btn-outline-primary mt-2 text-right">Mulai Input Anggaran</button>
                    </div>
                </form>
                <span>Perusahaan Ini Belum Punya Klien? <br>
                    <label class="">Tambahkan melalui menu <a  href="javascript:void(0)"  onclick="mode = 'add'" data-toggle="modal" data-target="#form-add-client"  class="text-info font-weight-bold">Klien</a></label>
                </span>
            </div>
        </div>
    <?php } ?>

    <!--DASHBOARD-->
    <?php if (!empty($this->session->userdata('nama_project'))) { ?>

        <div class="row">
            <div class="col-md-4 col-lg-4 mb-4">
                <div id="accordion-anggaran" title="Tambah, Edit dan Lihat Summary, Lihat Detail Anggaran">
                    <div class="card">
                        <div class="card-header bg-primary shadow-sm d-flex justify-content-between" id="anggaran">
                            <a href="javaascript:void(0)" class="h4 text-white text-decoration-none mt-1" data-toggle="collapse" data-target="#anggaranCollapse" aria-expanded="true" aria-controls="anggaranCollapse">
                                <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;
                                Anggaran
                            </a>
                            <i class="fas fa-caret-down mt-2 text-white"></i>
                        </div>

                        <div id="anggaranCollapse" class="collapse show" aria-labelledby="anggaran" data-parent="#accordion-anggaran">
                            <div class="card-body p-0">
                                <ul class="list-group border-0">
                                    <a href="javascript:void(0)" onclick="mode = 'add'" data-target="#form-add-anggaran" data-toggle="modal"
                                       class="text-decoration-none list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-plus mt-1"></i>
                                        Tambah Anggaran
                                    </a>
                                    <a href="javascript:void(0)" data-target="#modal-anggaran" data-toggle="modal"
                                       class="list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-paperclip mt-1"></i>
                                        Summary Anggaran
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-4">
                <div id="accordion-kategori">
                    <div class="card">
                        <div class="card-header bg-success shadow-sm d-flex justify-content-between" id="kategori"  title="Tambah, Edit dan Lihat Kategori">
                            <a href="javaascript:void(0)" class="h4 text-white text-decoration-none mt-1" data-toggle="collapse" data-target="#kategoriCollapse" aria-expanded="true" aria-controls="kategoriCollapse">
                                <i class="fas fa-th"></i>&nbsp;&nbsp;
                                Kategori
                            </a>
                            <i class="fas fa-caret-down mt-2 text-white"></i>
                        </div>

                        <div id="kategoriCollapse" class="collapse show" aria-labelledby="kategori" data-parent="#accordion-kategori">
                            <div class="card-body p-0">
                                <ul class="list-group border-0">
                                    <a href="javascript:void(0)" onclick="mode = 'add'" data-target="#form-add-kategori" data-toggle="modal"
                                       class="text-decoration-none list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-plus mt-1"></i>
                                        Tambah Kategori
                                    </a>
                                    <a href="javascript:void(0)" data-target="#modal-kategori" data-toggle="modal" 
                                       class="text-decoration-none list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-list-ul mt-1"></i>
                                        Daftar Kategori
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-4">
                <div id="accordion-pos">
                    <div class="card">
                        <div class="card-header bg-warning shadow-sm d-flex justify-content-between" id="pos"  title="Tambah, Edit dan Lihat Pos">
                            <a href="javaascript:void(0)" class="h4 text-white text-decoration-none mt-1" data-toggle="collapse" data-target="#posCollapse" aria-expanded="true" aria-controls="posCollapse">
                                <i class="fas fa-list-alt"></i>&nbsp;&nbsp;
                                Pos
                            </a>
                            <i class="fas fa-caret-down mt-2 text-white"></i>
                        </div>

                        <div id="posCollapse" class="collapse show" aria-labelledby="pos" data-parent="#accordion-pos">
                            <div class="card-body p-0">
                                <ul class="list-group border-0">
                                    <a href="javascript:void(0)" onclick="mode = 'add'" data-target="#form-add-pos" data-toggle="modal" 
                                       class="text-decoration-none list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-plus mt-1"></i>
                                        Tambah Pos
                                    </a>
                                    <a href="javascript:void(0)" data-target="#modal-pos" data-toggle="modal" class="list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-list-ul mt-1"></i>
                                        Daftar Pos
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 mb-4 d-none d-md-none">
                <div id="accordion-klien" >
                    <div class="card">
                        <div class="card-header bg-info shadow-sm d-flex justify-content-between" id="klien" title="Tambah, Edit dan Lihat Klien">
                            <a href="javaascript:void(0)" class="h4 text-white text-decoration-none mt-1" data-toggle="collapse" data-target="#klienCollapse" aria-expanded="true" aria-controls="klienCollapse">
                                <i class="fas fa-grin"></i>&nbsp;&nbsp;
                                Klien
                            </a>
                            <i class="fas fa-caret-down mt-2 text-white"></i>
                        </div>

                        <div id="klienCollapse" class="collapse show" aria-labelledby="klien" data-parent="#accordion-klien">
                            <div class="card-body p-0">
                                <ul class="list-group border-0">
                                    <a href="javascript:void(0)"  onclick="mode = 'add'" data-toggle="modal" data-target="#form-add-client" 
                                       class="text-decoration-none list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-plus mt-1"></i>
                                        Tambah Klien
                                    </a>
                                    <a href="javascript:void(0)" data-target="#modal-klien" data-toggle="modal"
                                       class="text-decoration-none list-group-item d-flex justify-content-between  border-0">
                                        <i class="fas fa-list-ul mt-1"></i>
                                        Daftar Klien
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-2">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pengeluaran Biaya Project Perbulan tahun <?php echo date('Y') ?></h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="myAreaChart" style="display: block; width: 510px; height: 160px;" width="510" height="160" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('anggaran/kategori/modal-kategori') ?>
    <?php $this->load->view('anggaran/kategori/modal-form-kategori') ?>
    <?php $this->load->view('anggaran/pos/modal-pos') ?>
    <?php $this->load->view('anggaran/pos/modal-form-pos') ?>
    <?php $this->load->view('anggaran/anggaran/modal-anggaran') ?>
    <?php $this->load->view('anggaran/anggaran/modal-form-anggaran') ?>
    <?php $this->load->view('anggaran/anggaran/modal-select-detail') ?>
<?php } ?>
<?php $this->load->view('anggaran/client/modal-klien') ?>
<?php $this->load->view('anggaran/client/modal-form-klien') ?>
<?php $this->load->view('anggaran/project/modal-project') ?>
<?php $this->load->view('anggaran/project/modal-form-project') ?>
<script>
    $(document).ready(function () {
        var idKlien = "<?php echo (!empty($this->session->userdata('nama_klien')) ? $this->session->userdata('id_klien') : '') ?>";
        $('[name="id-klien"]').val(idKlien);
        console.log(idKlien);
    });
</script>
