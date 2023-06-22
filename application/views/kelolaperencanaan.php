<!--end header -->
<!--start page wrapper -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Kelola Perencanaan</h6>
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
                                <form action="<?= base_url('perencanaan/') ?>" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" class="form-control" name="kode">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Barang</label>
                                        <input type="text" class="form-control" name="jenis">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Merk</label>
                                        <input type="text" class="form-control" name="merk">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga</label>
                                        <input type="number" class="form-control" name="harga">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Barang</label>
                                        <input type="number" class="form-control" name="jumlah">
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3 select2-sm">
                                            <label class="form-label">Kategori</label>
                                            <select class="single-select form-control" name="kategori">
                                                <?php
                                                $kategori = $this->M_proses->get_all_kategori('');
                                                foreach ($kategori as $kat) :
                                                ?>
                                                    <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Perencanaan</label>
                                        <input type="date" class="form-control" name="tanggal">
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
                                <th>Tanggal Perencanaan</th>
                                <th>Jenis Barang</th>
                                <th>Merk</th>
                                <th>Harga</th>
                                <th>Jumlah Barang</th>
                                <th>Total</th>
                                <th>Kategori</th>
                                <?php if ($this->session->userdata('role') == 'kepala sekolah') { ?>
                                    <th>Tanggapan</th>
                                <?php } ?>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($perencanaan as $kelola) :
                                $dkate = $this->M_proses->get_kategori($kelola['id_kategori']);
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $kelola['kode']; ?></td>
                                    <td><?= $kelola['tanggal_perencanaan']; ?></td>
                                    <td><?= $kelola['jenis_barang']; ?></td>
                                    <td><?= $kelola['merk']; ?></td>
                                    <td><?= number_format($kelola['harga']) ?></td>
                                    <td><?= $kelola['jumlah_barang']; ?></td>
                                    <td><?= number_format($kelola['total']) ?></td>
                                    <td><?= $dkate['nama_kategori']; ?></td>
                                    <?php if ($this->session->userdata('role') == 'kepala sekolah') { ?>

                                        <td>
                                            <?php if ($kelola['status'] == 'menunggu') { ?>
                                                <a href="<?= base_url('perencanaan/acc/' . $kelola['id_kelola_perencanaan']) ?>" class="btn btn-success btn-sm">Acc</a>
                                                <a href="<?= base_url('perencanaan/tolak/' . $kelola['id_kelola_perencanaan']) ?>" class="btn btn-danger btn-sm">Tolak</a>
                                            <?php } elseif ($kelola['status'] == 'diterima') { ?>
                                                <span class="text-success">Di Setujui</span>
                                            <?php } elseif ($kelola['status'] == 'ditolak') { ?>
                                                <span class="text-danger">Di Tolak</span>
                                            <?php } ?>
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class=""><i class='bx bxs-edit' data-bs-toggle="modal" data-bs-target="#editModal<?= $kelola['id_kelola_perencanaan'] ?>"></i></a>
                                            <a href="javascript:;" class=""><i class='bx bxs-calendar-week' data-bs-toggle="modal" data-bs-target="#detail<?= $kelola['id_kelola_perencanaan'] ?>"></i></a>
                                            <a href="<?= base_url('perencanaan/hapus/' . $kelola['id_kelola_perencanaan']) ?>" class="tombol-hapus"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal<?= $kelola['id_kelola_perencanaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('perencanaan/update/' . $kelola['id_kelola_perencanaan']) ?>" method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode</label>
                                                        <input type="text" class="form-control" value="<?= $kelola['kode']; ?>" name="kode" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Barang</label>
                                                        <input type="text" class="form-control" name="jenis" value=" <?= $kelola['jenis_barang']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Merk</label>
                                                        <input type="text" class="form-control" name="merk" value="<?= $kelola['merk']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Harga</label>
                                                        <input type="number" class="form-control" name="harga" value="<?= $kelola['harga']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah Barang</label>
                                                        <input type="number" class="form-control" value="<?= $kelola['jumlah_barang']; ?>" name="jumlah">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="mb-3 select2-sm">
                                                            <label class="form-label">Kategori</label>
                                                            <select class="single-select form-control" name="kategori">
                                                                <option value="<?= $kelola['id_kategori'] ?>"><?= $dkate['nama_kategori']; ?></option>
                                                                <?php
                                                                $kategori = $this->M_proses->get_where_kategori($kelola['id_kategori']);
                                                                foreach ($kategori as $kat) :
                                                                ?>
                                                                    <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal Perencanaan</label>
                                                        <input type="date" class="form-control" value="<?= $kelola['tanggal_perencanaan']; ?>" name="tanggal">
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
                                <div class="modal fade" id="detail<?= $kelola['id_kelola_perencanaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group font-11">
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <b>Kode</b>
                                                        <p><?= $kelola['kode']; ?></p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <b>Tanggal Perencanaan</b>
                                                        <p><?= $kelola['tanggal_perencanaan']; ?></p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <b>Jenis Barang</b>
                                                        <p><?= $kelola['jenis_barang']; ?></p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <b>Merk</b>
                                                        <p><?= $kelola['merk']; ?></p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <b>Harga</b>
                                                        <p><?= number_format($kelola['harga']) ?></p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <b>Jumlah</b>
                                                        <p><?= $kelola['jumlah_barang']; ?></p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <b>Total</b>
                                                        <p><?= number_format($kelola['total']) ?></p>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <b>Kategori</b>
                                                        <p><?= $dkate['nama_kategori']; ?></p>
                                                    </li>
                                                </ul>
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