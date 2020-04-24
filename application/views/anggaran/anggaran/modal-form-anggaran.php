<div class="modal fade " id="form-add-anggaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah/Edit Anggaran</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="form-add-anggaran">
                <div class="modal-body">
                    <h5 class="text-gray-800 text-center border p-3"><?php
                        echo (!empty($this->session->userdata('final_anggaran'))) ? "Pendapatan setelah barang dan pajak: " .
                                $this->etc->rps($this->session->userdata('final_anggaran')) : ""
                        ?>
                    </h5>
                    <div class="form-group mt-3">
                        <label for="id-klien">Nama Klien</label>
                        <h5><?php echo $this->session->userdata('nama_klien') ?> (<?php echo $this->session->userdata('perusahaan') ?>, <?php echo $this->session->userdata('nama_project') ?>)</h5>
                        <input type="hidden" id="id-klien" value="<?php echo $this->session->userdata('id_klien') ?>" name="id-klien" class="form-control" required autofocus/>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control" name="tahun"  required>
                                    <option>--Silahkan pilih--</option>
                                    <?php
                                    $year = 2016;
                                    for ($year; $year <= date('Y'); $year++) {
                                        ?>
                                        <option value="<?php echo $year ?>"><?php echo $year ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select class="form-control" name="bulan"  required>
                                    <option value="">--Silahkan pilih--</option>
                                    <?php
                                    $res = $this->bulan->getBulan();
                                    foreach ($res->result() as $r) {
                                        ?>
                                        <option value="<?php echo $r->id_bulan ?>"><?php echo $r->nama_bulan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" required>
                                    <option value="">--Silahkan pilih--</option>
                                    <?php
                                    foreach ($kategori as $p) {
                                        ?>
                                        <option value="<?php echo $p->id_kategori ?>"><?php echo $p->nama_kategori ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pos">Pos</label>
                                <select class="form-control" name="pos-anggaran">
                                    <option value="">--Silahkan pilih--</option>
                                    <?php
                                    $pos = $this->pos->getPos()->result();
                                    foreach ($pos as $p) {
                                        ?>
                                        <option value="<?php echo $p->id_pos ?>"><?php echo $p->nama_pos ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="height: 200px; overflow-y: auto">
                        <label>
                            Detail Anggaran
                        </label>
                        <div class="table-responsive">
                            <table class="table table-borderless" id="detail-anggaran">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Uraian</th>
                                        <th>Volume</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <!--<th>Pengeluaran</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <input type="text" name="uraian[]" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="number" name="volume[]" class="form-control " />
                                        </td>
                                        <td>
                                            <select class="form-control" name="satuan[]">
                                                <option value="paket">Paket</option>
                                                <option value="personel">Personel</option>
                                                <option value="buku">Buku</option>
                                                <option value="bulan">Bulan</option>
                                                <option value="tahun">Tahun</option>
                                        </td>
                                        <td>
                                            <input type="text" name="harga-satuan[]" class="form-control currency" />
                                        </td>
<!--                                        <td>
                                            <input type="number" name="pengeluaran[]" class="form-control" />
                                        </td>-->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <a class="btn btn-primary" href="javascript:void(0)" onclick="return addRows()">Tambah Inputan</a>
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
    var urut = 1;

    function addRows() {
        var prm = prompt("Mau tambah berapa baris ?", 1);
        for (var i = 1; i <= prm; i++) {
            var table = document.getElementById('detail-anggaran');
            var lengthRow = document.getElementById('detail-anggaran').rows.length;
            var row = table.insertRow(lengthRow);
            var nomorUrut = row.insertCell(0);
            nomorUrut.innerHTML = ++urut;
            var uraian = row.insertCell(1);
            uraian.innerHTML = '<input type="text" name="uraian[]" class="form-control" required/>';
            var volume = row.insertCell(2);
            volume.innerHTML = '<input type="number" name="volume[]" class="form-control" required/>';
            var satuan = row.insertCell(3);
            satuan.innerHTML = '<select class="form-control" name="satuan[]" required>' +
                    '<option value="paket">Paket</option>' +
                    '<option value="personel">Personel</option>' +
                    '<option value="buku">Buku</option>' +
                    '<option value="bulan">Bulan</option>' +
                    '<option value="tahun">Tahun</option>' +
                    '</select>';

            var hrgSatuan = row.insertCell(4);
            hrgSatuan.innerHTML = '<input type="text" name="harga-satuan[]" required class="form-control currency" />';
//            var pengeluaran = row.insertCell(5);
//            pengeluaran.innerHTML = '<input type="number" name="pengeluaran[]" required class="form-control" />';
        }
        $('.currency').maskMoney({thousands: '.', precision: '0'});
    }

    $(".form-add-anggaran").submit(function (e) {
        e.preventDefault();
        var url = "<?php echo site_url('anggaran/add_anggaran_proc') ?>";
        var data = $(this).serialize();

        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                if (data === '0') {
                    alert(textStatus);
                    location.assign('anggaran');
                } else {
                    alert('tambah anggaran gagal');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus);
                console.log(JSON.stringify(jqXHR));
            }
        });
    });

    $('[name="kategori"]').change(function () {
        var data = $(this).val();
        var url = "<?php echo site_url('anggaran/get_pos_by_id_kategori/') ?>" + data;
        $.get(url, null, function (data, status, jqXHR) {
            $('[name="pos-anggaran"]').html(data);
        });
    });
</script>