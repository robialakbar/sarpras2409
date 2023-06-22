<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
<div class="page-wrapper">
    <div class="page-content pt-1">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                </div>
                <div class="col-lg-8 h-100 row">
                    <div class="col-12 p-0">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                Edit Profile
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('profile/update/') ?>" method="post">
                                    <div class="mb-3">
                                        <label for="">Username</label>
                                        <input type="text" value="<?= $user['username'] ?>" name="username" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" value="<?= $user['nama'] ?>" name="nama" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                Ganti Password
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                <form action="<?= base_url('profile/changepassword') ?>" method="post">
                                    <div class="mb-3">
                                        <label for="">Password Lama</label>
                                        <input type="text" name="current_password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Password Baru</label>
                                        <input type="text" name="new_password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div><!-- /.container-fluid -->
</div>


<div class="modal fade" id="modalEditProfile" tabindex="-1" aria-labelledby="modalEditProfile" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Photo Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label for="">Photo Profile</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="old_image" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</section>


</div>
</div>