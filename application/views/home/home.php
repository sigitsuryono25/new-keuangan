<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12">
            <form class="form-search-client" onsubmit="return confirm('Mulai input data?')">
                <div class="form-group">
                    <label>Cari Klien/Perusahaan</label>
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" autocomplete name="data-search" placeholder="ketik nama klien/perusahaan" />
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-primary" value="cari"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $page_title ?></h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="javascript:void(0)" class="text-decoration-none" data-target="#select-client" data-toggle="modal">
                <span class="font-weight-bold text-dark">Mulai Input Data</span>&nbsp;
                <span class="btn btn-circle btn-danger"><i class="fas fa-arrow-right text-white"></i></span>
            </a>
        </div>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Klien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->client->getClient()->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-grin fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Perusahaan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->client->getPerusahaan()->num_rows() ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-industry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Anggaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
