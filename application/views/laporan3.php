<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Halaman Laporan</h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('laporan/perencanaan/') ?>" method="post">
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
                                <th>Tanggal Perencanaan</th>
                                <th>Jenis Barang</th>
                                <th>Merk</th>
                                <th>Harga</th>
                                <th>Jumlah Barang</th>
                                <th>Total</th>
                                <th>Kategori</th>
                                <th>Tanggapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($barang !== null) {
                                $no = 1;
                                foreach ($barang as $brg) :
                                    $dkate = $this->M_proses->get_kategori($brg['id_kategori']);
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $brg['kode']; ?></td>
                                        <td><?= $brg['tanggal_perencanaan']; ?></td>
                                        <td><?= $brg['jenis_barang']; ?></td>
                                        <td><?= $brg['merk']; ?></td>
                                        <td><?= $brg['harga']; ?></td>
                                        <td><?= $brg['jumlah_barang']; ?></td>
                                        <td><?= $brg['total']; ?></td>
                                        <td><?= $dkate['nama_kategori']; ?></td>
                                        <td><?= $brg['status']; ?></td>
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