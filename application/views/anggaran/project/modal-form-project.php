<div class="modal fade" id="form-add-project">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah/Edit Project</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-project">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Project</label>
                        <input type="text" name="nama-project" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Anggaran</label>
                        <input type="text" name="anggaran" class="form-control currency" required/>
                    </div>
                    <div class="form-group">
                        <label>Klien</label>
                        <select class="form-control" name="id-klien" required="">
                            <option value="">--Silahkan Pilih Satu--</option>
                            <?php foreach ($klien->result() as $key => $p) { ?>
                                <option value="<?php echo $p->id_klien ?>"><?php echo $p->nama_klien ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary btn-block" value="Simpan" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(".form-project").submit(function (e) {
        e.preventDefault();
        var url = "";
        var message = "";
        if (mode === 'add') {
            url = "<?php echo site_url('project/add_project_proc/') ?>"
            message = "Ditambahkan";
        } else {
            url = "<?php echo site_url('project/edit_project_proc?id-project=') ?>" + idProject;
            message = "Diubah";
        }
        var data = $(this).serialize();
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                if (data == '0') {
                    alert("Project Berhasil " + message + ". Silahkan Lihat pada Daftar Project");
                    location.assign('anggaran');
                } else {
                    alert("Terjadi Kesalahan");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                alert(textStatus);
            }
        });
    });
</script>