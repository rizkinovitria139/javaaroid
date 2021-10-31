        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">User Data Tabels</h1>

            </div>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#tambahuserModal">New User</button>
                            <br>
                            <br>
                            <button class="btn btn-success" href="<?= base_url('admin/get_user_admin') ?>">Admin</button>
                            <button class="btn btn-info" href="<?= base_url('admin/get_user_user') ?>">User</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Telp</th>
                                            <th>Email</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Telp</th>
                                            <th>Email</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($user as $u) : ?>

                                            <!-- perulangan buat data new -->
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $u['nama']; ?></td>
                                                <td><?= $u['alamat']; ?></td>
                                                <td><?= $u['no_telp']; ?></td>
                                                <td><?= $u['email']; ?></td>
                                                <td><?= $u['is_active']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-icon" href="" data-toggle="modal" data-target="#detailsuserModal<?= $u['id_user']; ?>">
                                                        <i class="fas fa-info"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#edituserModal<?= $u['id_user']; ?>">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    <a class="btn btn-danger" href="<?= base_url('admin/delete_user/') . $u['id_user']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
        </div>
        <!-- /.container-fluid -->

        <!-- Details User Modal -->

        <!-- End Details User Modal -->
        <?php foreach ($user as $u) : ?>
            <div class="modal fade" id="detailsuserModal<?= $u['id_user'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="detailsuserModal<?= $u['id_user']; ?>Label" aria-hidden="true">
                <div class="modal-dialog" kelas="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailsMenuModal<?= $u['id_user'] ?>">User Details</h5>
                            <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </buttond>
                        </div>
                        <form action="<?= base_url('admin/edit_user/' . $u['id_user']); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <span>User ID</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['id_user']; ?>" id="id_plants" name="id_plants">
                                </div>
                                <div class="form-group">
                                    <span>Name</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['nama']; ?>" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <span>Address</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['alamat']; ?>" id="alamat" name="alamat">
                                </div>
                                <div class="form-group">
                                    <span>Telp</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['no_telp']; ?>" id="no_telp" name="no_telp">
                                </div>
                                <div class="form-group">
                                    <span>Email</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['email']; ?>" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <span>Username</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['username']; ?>" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <span>Password</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['password']; ?>" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <span>Role</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['role']; ?>" id="role" name="role">
                                </div>
                                <div class="form-group">
                                    <span>Active</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['is_active']; ?>" id="is_active" name="is_active">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Tambah User Modal -->
        <div class="modal fade" id="tambahuserModal" tabindex="-1" aria-labelledby="tambahuserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <?php
                        if (validation_errors() != false) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php
                        }
                        ?>
                        <h5 class="modal-title" id="tambahkelasModalLabel">New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url(); ?>admin/add_user" method="post">
                        <div class="modal-body">
                            <!-- <span>ID Kelas</span>
							<div class="form-group">
								<input type="text" class="form-control" id="id_kelas" name="id_kelas" placeholder="Masukkan ID Kelas">
							</div> -->
                            <span>Name</span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Name of user">
                            </div>
                            <span>Address</span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Address of user">
                            </div>
                            <span>Telp</span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Telp number">
                            </div>
                            <span>Email</span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email of user">
                            </div>
                            <span>Username</span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username">
                            </div>
                            <span>is_active</span>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                            </div>
                            <span>Active</span>
                            <div class="form-group">
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <span>Role</span>
                            <div class="form-group">
                                <select class="form-control" name="role" id="role">
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Tambah Kelas Modal -->

        <!-- User Edit Modal -->
        <?php foreach ($user as $u) : ?>
            <div class="modal fade" id="edituserModal<?= $u['id_user'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="edituserModal<?= $u['id_user']; ?>Label" aria-hidden="true">
                <div class="modal-dialog" kelas="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editMenuModal<?= $u['id_user'] ?>">User Edit</h5>
                            <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </buttond>
                        </div>
                        <form action="<?= base_url('admin/edit_user/' . $u['id_user']); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <span>User ID</span>
                                    <input type="text" class="form-control" readonly value="<?= $u['id_user']; ?>" id="id_plants" name="id_plants">
                                </div>
                                <div class="form-group">
                                    <span>Name</span>
                                    <input type="text" class="form-control" value="<?= $u['nama']; ?>" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <span>Address</span>
                                    <input type="text" class="form-control" value="<?= $u['alamat']; ?>" id="alamat" name="alamat">
                                </div>
                                <div class="form-group">
                                    <span>Telp</span>
                                    <input type="text" class="form-control" value="<?= $u['no_telp']; ?>" id="no_telp" name="no_telp">
                                </div>
                                <div class="form-group">
                                    <span>Email</span>
                                    <input type="text" class="form-control" value="<?= $u['email']; ?>" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <span>Username</span>
                                    <input type="text" class="form-control" value="<?= $u['username']; ?>" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <span>Password</span>
                                    <input type="text" class="form-control" value="<?= $u['password']; ?>" id="password" name="password">
                                </div>

                                <span>Role</span>
                                <div class="form-group">
                                    <select class="form-control" name="role" id="role">
                                        <option value="<?= $u['role']; ?>" selected><?php echo $u['role']; ?></option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                                <span>Active</span>
                                <div class="form-group">
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="<?= $u['is_active']; ?>" selected><?php echo $u['is_active']; ?></option>
                                        <option value="1">1</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Edit Modal -->

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>