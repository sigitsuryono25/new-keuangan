<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $page_title ?></h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo site_url('client/daftar_perusahaan')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-industry fa-sm text-white-50"></i> Daftar Perusahaan</a>
        </div>
    </div>
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
                            <a href="javascript:void(0)" onclick="openModal(`<?php echo $p->id_klien ?>`)" class="btn btn-block btn-warning text-dark">Edit</a>
                            <a href="<?php echo site_url('client/delete_klien/' . $p->id_klien) ?>" onclick="return confirm('Hapus Data ini?')" class="btn btn-block btn-danger text-white">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="tambah-client" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Klien</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-add-client" action="<?php echo site_url('client/edit_klien_proc') ?>" method="POST" onsubmit="return confirm('Apakah data sudah benar?')">
                <div class="modal-body">
                    <input type="hidden" name="id-klien" id="id-klien" />
                    <div class="form-group">
                        <label for="nama">Nama Klien</label>
                        <input type="text" id="nama" name="nama-klien" class="form-control" required autofocus/>
                    </div>
                    <div class="form-group">
                        <label for="telepon-klien">Telepon Klien</label>
                        <input type="tel" id="telepon-klien" name="telepon-klien" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="email-klien">Email</label>
                        <input type="email" id="email-klien" name="email-klien" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="asal-perusahaan">Asal Perusahaan</label>
                        <select class="form-control" required name="id-perusahaan">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($perusahaan->result() as $p) { ?>
                                <option value="<?php echo $p->id_perusahaan ?>"><?php echo $p->nama_perusahaan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-block">Proses...</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openModal(idKlien) {
        var url = "<?php echo site_url('client/get_klien_detail/') ?>" + idKlien;
        $.get(url, null, function (data, status, jqXHR) {
            if (data !== '0') {
                $('[name="id-klien"]').val(data.id_klien);
                $('[name="id-perusahaan"]').val(data.id_perusahaan);
                $('[name="nama-klien"]').val(data.nama_klien);
                $('[name="telepon-klien"]').val(data.telepon);
                $('[name="email-klien"]').val(data.email_klien);

                $("#tambah-client").modal('show');
            } else {
                alert('Tidak ada Data');
            }
        }, 'json');
    }
</script>
