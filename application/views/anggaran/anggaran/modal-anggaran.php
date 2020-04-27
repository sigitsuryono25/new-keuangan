<div class="modal fade" id="modal-anggaran">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Project</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tahun Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tahun Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($anggaran->result() as $key => $p) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $p->tahun ?></td>
                                <td>
                                    <a href="<?php echo site_url('anggaran/summary?tahun='. $p->tahun)?>" class="btn btn-block btn-success" target="_blank">Lihat Summary</a>
                                    <a href="javascript:void(0)" onclick="openModalAnggaran(`<?php echo $p->tahun ?>`)" class="btn btn-block btn-warning text-dark">Edit </a>
                                    <a href="<?php echo site_url('project/delete_project?tahun=' . $p->tahun) ?>" onclick="return confirm('Hapus Data ini?')" class="btn btn-block btn-danger text-white">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function openModalAnggaran(tahun) {
        $('[name="tahun"]').val(tahun);
        $("#modal-select-detail").modal('show');
    }
</script>