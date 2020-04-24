<div class="modal fade " id="modal-select-detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark">Pilih Detail Anggaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="d-none d-md-none d-sm-none d-lg-none d-xl-none"  action="<?php echo site_url('anggaran/summary') ?>" method="GET" target="_blank">
                <div class="card mx-4 mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <input type="hidden" name="tahun" value=""/>
                        <h4 class='lead font-weight-bold mt-2'>Summary Report</h4>
                        <button type="submit" class="btn btn-sm btn-primary">Lihat Summary</button>
                    </div>
                </div>
            </form>
            <form class="d-none d-md-none d-sm-none d-lg-none d-xl-none" action="<?php echo site_url('dashboard/detail_data_admin') ?>" method="GET">
                <div class="card mx-4 mt-4">
                    <div class="card-header">
                        <h4 class='lead font-weight-bold'>Lihat Detail Perbulan</h4>
                    </div>
                    <div class=" card-body modal-body">
                        <div class="form-group">
                            <label>Pilih Bulan</label>
                            <select class="form-control" name="select-bulan" required>
                                <option value=''>--Silahkan Pilih--</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Show Detail</button>
                    </div>
                </div>
            </form>
            <form action="<?php echo site_url('dashboard/edit_admin') ?>" method="GET" target="_blank">
                <div class="card mx-4 mb-4 mt-4 ">
                    <div class="card-header">
                        <h4 class='lead font-weight-bold'>Edit Detail Perbulan</h4>
                    </div>
                    <div class=" card-body modal-body">
                        <div class="form-group">
                            <label>Pilih Bulan untuk diedit</label>
                            <select class="form-control" name="select-bulan" required>
                                <option value=''>--Silahkan Pilih--</option>
                                <?php foreach ($bulan as $b) { ?>
                                    <option value="<?php echo $b->id_bulan ?>"><?php echo $b->nama_bulan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Pos</label>
                            <select class="form-control" name="select-pos" required>
                                <option value=''>--Silahkan Pilih--</option>
                                <?php foreach ($pos as $value) { ?>
                                    <option value="<?php echo $value->id_pos ?>"><?php echo $value->nama_pos ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Show Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>