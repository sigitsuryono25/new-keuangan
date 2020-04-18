<div class="modal fade" id="select-client" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mulai Session Baru </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form onsubmit="return confirm('Mulai Session dengan perusahaan ini?')" action="<?php echo site_url('anggaran/start_session_anggaran')?>" method="POST">
                <div class="modal-body">
                    <h5 class="text-dark">Pilih Perusahaan dibawah ini</h5>
                    <div class="client-container ">
                        <?php if ($perusahaan->num_rows() > 0) { ?>
                            <div class="list-group radio-list-group">
                                <?php foreach ($perusahaan->result() as $p) { ?>
                                    <div class="list-group-item mb-2">&nbsp;
                                        <label>
                                            <input type="radio" name="perusahaan" value="<?php echo $p->id_perusahaan ?>">
                                            <span class="list-group-item-text">
                                                <?php echo $p->nama_perusahaan ?>
                                            </span>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <h4 class="mt-3 mb-3 text-danger text-center">Belum ada data</h4>
                        <?php } ?>
                    </div>
                    <div class="container-fluid p-0">
                        <span>Belum ada klien? Tambah satu <a class="text-primary" href="<?php echo site_url('client/add') ?>">disini</a></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary btn-block" type="submit" >Proses...</button>
                </div>
            </form>
        </div>
    </div>
</div>