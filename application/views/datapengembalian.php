<!--start page wrapper -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Data Pengembalian</h6>
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
                                <form action="<?= base_url('peminjaman/pengembalian/') ?>" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" class="form-control" name="kode">
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3 select2-sm">
                                            <label class="form-label">Barang yang di kembalikan</label>
                                            <select class="single-select form-control" name="peminjaman">
                                                <?php
                                                $peminjaman = $this->M_proses->get_all_peminjaman('');
                                                foreach ($peminjaman as $pinjam) :
                                                ?>
                                                    <option value="<?= $pinjam['id_peminjaman']; ?>"><?= $pinjam['kode']; ?> - <?= $pinjam['nama_peminjam']; ?> - <?= $pinjam['jenis_yang_dipinjam']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kondisi</label>
                                        <input type="text" class="form-control" name="kondisi">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <input type="text" class="form-control" name="status">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Pengembalian</label>
                                        <input type="date" class="form-control" name="tanggal">
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
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Nama Peminjam</th>
                                <th>Jenis yang di pinjam</th>
                                <th>Jumlah</th>
                                <th>Kondisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengembalian as $kembali) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $kembali['kode']; ?></td>
                                    <td><?= $kembali['tanggal_pengembalian']; ?></td>
                                    <td><?= $kembali['nama_peminjam']; ?></td>
                                    <td><?= $kembali['jenis_yang_dipinjam']; ?></td>
                                    <td><?= $kembali['jumlah']; ?></td>
                                    <td><?= $kembali['kondisi']; ?></td>
                                    <td><?= $kembali['status']; ?></td>
                                    <!-- <td>20/05/2021</td> -->
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class=""><i class='bx bxs-edit' data-bs-toggle="modal" data-bs-target="#editModal<?= $kembali['id_pengembalian'] ?>"></i></a>
                                            <!-- <a href="javascript:;" class=""><i class='bx bxs-calendar-week' data-bs-toggle="modal" data-bs-target="#detail"></i></a> -->
                                            <a href="<?= base_url('peminjaman/hapus_pengembalian/' . $kembali['id_pengembalian']) ?>" class="tombol-hapus"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editModal<?= $kembali['id_pengembalian'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('peminjaman/update_pengembalian/' . $kembali['id_pengembalian']) ?>" method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode</label>
                                                        <input type="text" class="form-control" value="<?= $kembali['kode']; ?>" name="kode" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Peminjam</label>
                                                        <input type="text" class="form-control" value="<?= $kembali['nama_peminjam']; ?>" name="nama_peminjam" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Yang Dipinjam</label>
                                                        <input type="text" class="form-control" value="<?= $kembali['jenis_yang_dipinjam']; ?>" name="jenis_yang_dipinjam" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah</label>
                                                        <input type="number" class="form-control" value="<?= $kembali['jumlah']; ?>" name="jumlah">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Kondisi</label>
                                                        <input type="text" class="form-control" value="<?= $kembali['kondisi']; ?>" name="kondisi">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Status</label>
                                                        <input type="text" class="form-control" value="<?= $kembali['status']; ?>" name="status">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Pengembalian</label>
                                                        <input type="date" class="form-control" value="<?= $kembali['tanggal_pengembalian']; ?>" name="tanggal">
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