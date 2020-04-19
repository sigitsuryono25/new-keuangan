<div class="modal fade" id="form-add-client" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah/Edit Klien</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!--<form class="form-add-client" action="<?php echo site_url('client/edit_klien_proc') ?>" method="POST" onsubmit="return confirm('Apakah data sudah benar?')">-->
            <form class="form-add-client">
                <div class="modal-body">
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
                        <input type="hidden" name="id-perusahaan" value="<?php echo $this->session->userdata('id_perusahaan') ?>"/>
                        <h5><?php echo $this->session->userdata('perusahaan') ?></h5>
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
    $(".form-add-client").submit(function (e) {
        e.preventDefault();
        var url = "";
        var message = "";
        if (mode === 'add') {
            url = "<?php echo site_url('client/add_klien_proc/') ?>"
            message = "Ditambahkan";
        } else {
            url = "<?php echo site_url('client/edit_klien_proc?id-klien=') ?>" + idKlien;
            message = "Diubah";
        }
        console.log(url);
        var data = $(this).serialize();
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                if (data == '0') {
                    alert("Klien Berhasil " + message + ". Silahkan Lihat pada Daftar Klien");
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