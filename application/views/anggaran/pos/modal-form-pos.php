<div class="modal fade" id="form-add-pos">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah/Edit Pos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-pos">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pos</label>
                        <input type="text" name="nama-pos" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="id-kategori" required="">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($kategori as $p) { ?>
                                <option value="<?php echo $p->id_kategori ?>"><?php echo $p->nama_kategori ?></option>
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
    $(".form-pos").submit(function (e) {
        e.preventDefault();
        var url = "";
        var message = "";
        if (mode === 'add') {
            url = "<?php echo site_url('pos/add_pos_proc/') ?>"
            message = "Ditambahkan";
        } else {
            url = "<?php echo site_url('pos/edit_pos_proc?id-pos=') ?>" + idPos;
            message = "Diubah";
        }
        var data = $(this).serialize();
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                if (data == '0') {
                    alert("Pos Berhasil " + message + ". Silahkan Lihat pada Daftar Pos");
                    location.assign('anggaran');
                } else {
                    alert("Terjadi Kesalahan");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                consoloe.log(JSON.stringify(jqXHR));
                alert(textStatus);
            }
        });
    });
</script>