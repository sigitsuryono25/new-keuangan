<div class="modal fade" id="modal-kategori">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kategori</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($kategori as $key => $p) { ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $p->nama_kategori ?></td>
                                <td>
                                    <a href="javascript:void(0)" onclick="openModal(`<?php echo $p->id_kategori ?>`)" class="btn btn-warning text-dark">Edit</a>
                                    <a href="<?php echo site_url('kategori/delete_kategori?id-kategori=' . $p->id_kategori) ?>" onclick="return confirm('Hapus Data ini?')" class="btn btn-danger text-white">Hapus</a>
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
    var idKategori = "";
    mode = 'edit';
    function openModal(idKategori) {
        this.idKategori= idKategori;
        window.history.pushState('Edit', 'Edit', '?mode=edit&id-kategori=' + idKategori);
        var url = "<?php echo site_url('kategori/get_kategori_by_id/') ?>" + idKategori;
        $.get(url, null, function (data, status, jqXHR) {
            $('[name="nama-kategori"]').val(data.nama_kategori);
            $("#form-add-kategori").modal('show');
        }, 'json');
    }
</script>