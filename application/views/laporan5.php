<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Halaman Laporan</h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('laporan/peminjaman/') ?>" method="post">
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
                                <th>Tanggal</th>
                                <th>Nama Peminjam</th>
                                <th>Jenis yang di pinjam</th>
                                <th>Jumlah</th>
                                <th>Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($peminjaman !== null) {
                                $no = 1;
                                foreach ($peminjaman as $pinjam) :
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pinjam['kode']; ?></td>
                                        <td><?= $pinjam['tanggal']; ?></td>
                                        <td><?= $pinjam['nama_peminjam']; ?></td>
                                        <td><?= $pinjam['jenis_yang_dipinjam']; ?></td>
                                        <td><?= $pinjam['jumlah']; ?></td>
                                        <td><?= $pinjam['tanggal_kembali']; ?></td>

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