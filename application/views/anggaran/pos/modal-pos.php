<div class="modal" id="modal-pos">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pos</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Pos</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($pos as $key => $p) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $p->nama_pos ?></td>
                                <td>
                                    <a href="javascript:void(0)" onclick="openModalPos(`<?php echo $p->id_pos ?>`)" class="btn btn-warning text-dark">Edit</a>
                                    <a href="<?php echo site_url('pos/delete_pos?id-pos=' . $p->id_pos) ?>" onclick="return confirm('Hapus Data ini?')" class="btn btn-danger text-white">Hapus</a>
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
    var idPos = "";
    mode = 'edit';
    function openModalPos(idPos) {
        this.idPos = idPos;
        var url = "<?php echo site_url('pos/get_pos_by_id/') ?>" + idPos;
        $.get(url, null, function (data, status, jqXHR) {
            $('[name="nama-pos"]').val(data.nama_pos);
            $('[name="id-kategori"]').val(data.id_kategori);
            $("#form-add-pos").modal('show');
        }, 'json');
    }
</script>