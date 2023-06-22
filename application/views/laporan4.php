<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Halaman Laporan</h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('laporan/pemeliharaan/') ?>" method="post">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="tanggal1" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tgl1" id="tanggal1">
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal1" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tgl2" id="tanggal1">
                        </div>
                        <div class="col-md-3 mt-4">
                            <button type="submit" class="btn btn-info">Generate</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Petugas</th>
                                <th>Total Sarana</th>
                                <th>Total Prasarana</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($pemeliharaan !== null) {
                                $no = 1;
                                foreach ($pemeliharaan as $repair) :
                                    $ptgs = $this->M_proses->get_user($repair['id_user']);
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $repair['kode']; ?></td>
                                        <td><?= $ptgs['nama']; ?></td>
                                        <td><?= $repair['total_sarana']; ?></td>
                                        <td><?= $repair['total_prasarana']; ?></td>
                                        <td><?= $repair['keterangan']; ?></td>
                                        <td><?= $repair['tanggal']; ?></td>
                                <?php
                                endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>