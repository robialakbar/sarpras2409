<!--start page wrapper -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Data Peminjaman</h6>
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
                                <form action="<?= base_url('peminjaman') ?>" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" name="kode" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Peminjam</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3 select2-sm">
                                            <label class="form-label">Jenis yang di pinjam</label>
                                            <select class="single-select form-control" name="barang">
                                                <?php
                                                $barang = $this->M_proses->get_all_barang();
                                                foreach ($barang as $brg) :
                                                ?>
                                                    <option value="<?= $brg['jenis_barang'] ?>"><?= $brg['jenis_barang'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Pinjam</label>
                                        <input type="date" name="tanggal" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Kembali</label>
                                        <input type="date" name="tanggal2" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save
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
                                <th>Tanggal</th>
                                <th>Nama Peminjam</th>
                                <th>Jenis yang di pinjam</th>
                                <th>Jumlah</th>
                                <th>Tanggal Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class=""><i class='bx bxs-edit' data-bs-toggle="modal" data-bs-target="#editModal"></i></a>
                                            <!-- <a href="javascript:;" class=""><i class='bx bxs-calendar-week' data-bs-toggle="modal" data-bs-target="#detail"></i></a> -->
                                            <a href="<?= base_url('peminjaman/hapus/' . $pinjam['id_peminjaman']) ?>" class="tombol-hapus"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <div class=" modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('peminjaman/update/' . $pinjam['id_peminjaman']) ?>" method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode</label>
                                                        <input type="text" name="kode" value="<?= $pinjam['kode']; ?>" class="form-control" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Peminjam</label>
                                                        <input type="text" name="nama" class="form-control" value="<?= $pinjam['nama_peminjam']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="mb-3 select2-sm">
                                                            <label class="form-label">Jenis yang di pinjam</label>
                                                            <select class="single-select form-control" name="barang">
                                                                <option value="<?= $pinjam['jenis_yang_dipinjam'] ?>"><?= $pinjam['jenis_yang_dipinjam'] ?></option>
                                                                <?php
                                                                $barang = $this->M_proses->get_all_barang();
                                                                foreach ($barang as $brg) :
                                                                ?>
                                                                    <option value="<?= $brg['jenis_barang'] ?>"><?= $brg['jenis_barang'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah</label>
                                                        <input type="number" name="jumlah" value="<?= $pinjam['jumlah']; ?>" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Pinjam</label>
                                                        <input type="date" name="tanggal" value="<?= $pinjam['tanggal']; ?>" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Kembali</label>
                                                        <input type="date" name="tanggal2" value="<?= $pinjam['tanggal_kembali']; ?>" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
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