<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $page_title ?></h1>
        </div>
        <div class="col-md-6 text-right">

        </div>
    </div>
    <?php if (empty($this->uri->segment(3))) { ?>
        <form method="POST" action="<?php echo site_url('client/add_perusahaan_proc') ?>">
        <?php } else { ?>
            <form method="POST" action="<?php echo site_url('client/edit_perusahaan_proc') ?>">

            <?php } ?>
            <input type="hidden" name="id-perusahaan" value="<?php echo (empty($perusahaan->id_perusahaan)) ? $this->etc->gen_uuid() : $perusahaan->id_perusahaan ?>" />
            <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama-perusahaan" required value="<?php echo (empty($perusahaan->nama_perusahaan)) ? '' : $perusahaan->nama_perusahaan ?>"/>
            </div>
            <div class="form-group">
                <label>Alamat Perusahaan</label>
                <textarea class="form-control" name="alamat-perusahaan" required><?php echo (empty($perusahaan->alamat)) ? '' : $perusahaan->alamat ?></textarea>
            </div>
            <div class="form-group">
                <label>Nomor Telepon Perusahaan</label>
                <input type="tel" class="form-control" name="telepon-perusahaan" required value="<?php echo (empty($perusahaan->nomor_telepon)) ? '' : $perusahaan->nomor_telepon ?>"/>
            </div>
            <div class="form-group">
                <label>Email Perusahaan</label>
                <input type="email" class="form-control"  name="email-perusahaan" value="<?php echo (empty($perusahaan->email)) ? '' : $perusahaan->email ?>"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Proses..."/>
            </div>
        </form>
</div>
