<div class="modal fade" id="form-add-kategori">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah/Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-category">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama-kategori" class="form-control" required/>
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
    $(".form-category").submit(function (e) {
        e.preventDefault();
        var url = "";
        var message = "";
        if (mode === 'add') {
            url = "<?php echo site_url('kategori/add_kategori_proc/') ?>"
            message = "Ditambahkan";
        } else {
            url = "<?php echo site_url('kategori/edit_kategori_proc?id-kategori=') ?>" + idKategori;
            message = "Diubah";
        }
        var data = $(this).serialize();
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                if (data == '0') {
                    alert("Kategori Berhasil " + message + ". Silahkan Lihat pada Daftar Kategori");
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