<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Kelola Inventaris Barang Masuk</h6>
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
                                <form action="<?= base_url('inventaris/barang_masuk/') ?>" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" name="kode" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Barang</label>
                                        <input type="text" name="jenis" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Merk</label>
                                        <input type="text" name="merk" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Barang</label>
                                        <input type="number" name="jumlah" class="form-control">
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
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control">
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
                                <th>Merk</th>
                                <th>Jumlah Barang</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($barang as $brg) :
                                $dkate = $this->M_proses->get_kategori($brg['id_kategori']);
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $brg['kode']; ?></td>
                                    <td><?= $brg['tanggal']; ?></td>
                                    <td><?= $brg['jenis_barang']; ?></td>
                                    <td><?= $brg['merk']; ?></td>
                                    <td><?= $brg['jumlah_barang']; ?></td>
                                    <td><?= $dkate['nama_kategori']; ?></td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class="" data-bs-toggle="modal" data-bs-target="#editModal<?= $brg['id_barang_masuk'] ?>"><i class='bx bxs-edit'></i></a>
                                            <a href="<?= base_url('inventaris/hapus_barang_masuk/' . $brg['id_barang_masuk']) ?>" class="tombol-hapus"><i class='bx bxs-trash'></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editModal<?= $brg['id_barang_masuk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('inventaris/update_barang_masuk/' . $brg['id_barang_masuk']) ?>" method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label">Kode</label>
                                                        <input type="text" name="kode" value="<?= $brg['kode'] ?>" class="form-control" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Barang</label>
                                                        <input type="text" name="jenis" class="form-control" value="<?= $brg['jenis_barang']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Merk</label>
                                                        <input type="text" name="merk" class="form-control" value="<?= $brg['merk']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah Barang</label>
                                                        <input type="number" name="jumlah" class="form-control" value="<?= $brg['jumlah_barang']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="mb-3 select2-sm">
                                                            <label class="form-label">Kategori</label>
                                                            <select class="single-select form-control" name="kategori">
                                                                <option value="<?= $brg['id_kategori'] ?>"><?= $dkate['nama_kategori']; ?></option>
                                                                <?php
                                                                $kategori = $this->M_proses->get_where_kategori($brg['id_kategori']);
                                                                foreach ($kategori as $kat) :
                                                                ?>
                                                                    <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" name="tanggal" value="<?= $brg['tanggal']; ?>" class="form-control">
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
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>