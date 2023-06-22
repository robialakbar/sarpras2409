<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<!--end header -->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Kelola Inventaris Barang Keluar</h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Barang</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('inventaris/barang_keluar/') ?>" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" name="kode" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3 select2-sm">
                                            <label class="form-label">Jenis Barang</label>
                                            <select class="single-select form-control" name="barang">
                                                <?php
                                                $barang = $this->M_proses->get_all_barang();
                                                foreach ($barang as $brg) :
                                                ?>
                                                    <option value="<?= $brg['id_barang_masuk'] ?>"><?= $brg['kode']; ?> - <?= $brg['jenis_barang']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Barang</label>
                                        <input type="number" class="form-control" name="jumlah">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Jenis Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($barangkeluar as $brgk) :
                                $dkate = $this->M_proses->get_kategori($brgk['id_kategori']);
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $brgk['kode']; ?></td>
                                    <td><?= $brgk['tanggal']; ?></td>
                                    <td><?= $brgk['jenis_barang']; ?></td>
                                    <td><?= $brgk['jumlah_barang']; ?></td>
                                    <td><?= $dkate['nama_kategori']; ?></td>
                                    <td><?= $brgk['keterangan']; ?></td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class="" data-bs-toggle="modal" data-bs-target="#editModal<?= $brgk['id_barang_keluar'] ?>"><i class='bx bxs-edit'></i></a>
                                            <a href="<?= base_url('inventaris/hapus_barang_keluar/' . $brgk['id_barang_keluar']) ?>" class="tombol-hapus"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editModal<?= $brgk['id_barang_keluar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('inventaris/update_barang_keluar/' . $brgk['id_barang_keluar']) ?>" method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode</label>
                                                        <input type="text" name="kode" value="<?= $brgk['kode']; ?>" class="form-control" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Barang</label>
                                                        <input type="text" name="jenis" value="<?= $brgk['jenis_barang']; ?>" class="form-control" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah Barang</label>
                                                        <input type="number" class="form-control" value="<?= $brgk['jumlah_barang']; ?>" name="jumlah">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan"> <?= $brgk['keterangan']; ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" value="<?= $brgk['tanggal']; ?>" class="form-control" name="tanggal">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<!--start overlay-->