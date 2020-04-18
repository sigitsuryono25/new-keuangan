<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $page_title ?></h1>
        </div>
        <div class="col-md-6 text-right">

        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($perusahaan->result() as $key => $p) { ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $p->nama_perusahaan ?></td>
                        <td><?php echo $p->alamat ?></td>
                        <td><?php echo $p->email ?></td>
                        <td><?php echo $p->nomor_telepon ?></td>
                        <td>
                            <a href="javascript:void(0)" 
                               data-target="#tambah-client" 
                               data-toggle="modal" 
                               onclick="return document.getElementById('id-perusahaan').value = `<?php echo $p->id_perusahaan ?>`"
                               class="btn btn-block btn-success text-white">Tambah Klien</a>
                            <a href="<?php echo site_url('client/form_edit_perusahaan/' . $p->id_perusahaan) ?>" class="btn btn-block btn-warning text-dark">Edit</a>
                            <a href="<?php echo site_url('client/delete_perusahaan/' . $p->id_perusahaan) ?>" onclick="return confirm('Hapus Data ini?')" class="btn btn-block btn-danger text-white">Hapus</a>
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
                <h5 class="modal-title">Tambah klien Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-add-client" action="<?php echo site_url('client/add_klien_proc') ?>" method="POST" onsubmit="return confirm('Apakah data sudah benar?')">
                <div class="modal-body">
                    <input type="hidden" name="id-perusahaan" id="id-perusahaan" />
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
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-block">Proses...</button>
                </div>
            </form>
        </div>
    </div>
</div>

