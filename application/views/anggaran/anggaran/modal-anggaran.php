<div class="modal fade" id="modal-anggaran">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
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
                                    <a href="javascript:void(0)" onclick="openModalAnggaran(`<?php echo $p->id_anggaran ?>`)" class="btn btn-warning text-dark">Lihat Detail</a>
                                    <a href="<?php echo site_url('project/delete_project?id-anggaran=' . $p->id_anggaran) ?>" onclick="return confirm('Hapus Data ini?')" class="btn btn-danger text-white">Hapus</a>
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
    var idProject = "";
    mode = 'edit';
    function openModalProject(idProject) {
        this.idProject = idProject;
        window.history.pushState('Edit', 'Edit', '?mode=edit&id-project=' + idProject);
        var url = "<?php echo site_url('project/get_project_by_id/') ?>" + idProject;
        $.get(url, null, function (data, status, jqXHR) {
            $('[name="nama-project"]').val(data.nama_project);
            $('[name="anggaran"]').val(data.anggaran);
            $('[name="id-klien"]').val(data.id_klien);
            $("#form-add-project").modal('show');
        }, 'json');
    }
</script>