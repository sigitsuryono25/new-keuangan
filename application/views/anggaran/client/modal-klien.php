<div class="modal" id="modal-klien">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Klien</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Klien</th>
                                    <th>Asal Perusahaan</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Klien</th>
                                    <th>Asal Perusahaan</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($klien->result() as $key => $p) { ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $p->nama_klien ?></td>
                                        <td><?php echo $p->nama_perusahaan ?></td>
                                        <td><?php echo $p->email_klien ?></td>
                                        <td><?php echo $p->telepon ?></td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="openModalKlien(`<?php echo $p->id_klien ?>`)" class="btn btn-block btn-warning text-dark">Edit</a>
                                            <a href="<?php echo site_url('client/delete_klien?id-klien=' . $p->id_klien) ?>" onclick="return confirm('Hapus Data ini?')" class="btn btn-block btn-danger text-white">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var idKlien = "";
    mode = 'edit';
    function openModalKlien(idKlien) {
        this.idKlien = idKlien;
        var url = "<?php echo site_url('client/get_klien_detail/') ?>" + idKlien;
        $.get(url, null, function (data, status, jqXHR) {
            $('[name="id-klien"]').val(data.id_klien);
            $('[name="id-perusahaan"]').val(data.id_perusahaan);
            $('[name="nama-klien"]').val(data.nama_klien);
            $('[name="telepon-klien"]').val(data.telepon);
            $('[name="email-klien"]').val(data.email_klien);

            $("#form-add-client").modal('show');
        }, 'json');
    }
</script>