<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Halaman Kelola Pemeliharaan</h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('pemeliharaan') ?>" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" name="kode" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Total Sarana</label>
                                        <input type="number" name="sarana" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Total Prasarana</label>
                                        <input type="number" name="prasarana" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" onclick="berhasil()">Save
                                            changes</button>
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
                                <th>Petugas</th>
                                <th>Total Sarana</th>
                                <th>Total Prasarana</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class=""><i class='bx bxs-edit' data-bs-toggle="modal" data-bs-target="#editModal<?= $repair['id_pemeliharaan'] ?>"></i></a>
                                            <a href="<?= base_url('pemeliharaan/hapus/' . $repair['id_pemeliharaan']) ?>" class="tombol-hapus"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editModal<?= $repair['id_pemeliharaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('pemeliharaan/update/' . $repair['id_pemeliharaan']) ?>" method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode</label>
                                                        <input type="text" name="kode" value="<?= $repair['kode']; ?>" class="form-control" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Total Sarana</label>
                                                        <input type="number" name="sarana" value="<?= $repair['total_sarana']; ?>" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Total Prasarana</label>
                                                        <input type="number" name="prasarana" value="<?= $repair['total_prasarana']; ?>" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="3"><?= $repair['keterangan']; ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" name="tanggal" value="<?= $repair['tanggal']; ?>" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" onclick="berhasil()">Save
                                                            changes</button>
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