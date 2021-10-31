        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Member of user</h1>

            </div>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#tambahmemberModal">New Member</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>User</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($member as $m) : ?>

                                            <!-- perulangan buat data new -->
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $m['nama_member']; ?></td>
                                                <td><?php echo $m['user_id'] . ' - ' . $m['nama']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editmemberModal<?= $m['id_member']; ?>">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    <a class="btn btn-danger" href="<?= base_url('admin/delete_member/') . $m['id_member']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- /.container-fluid -->

        <!-- Tambah Member Modal -->
        <div class="modal fade" id="tambahmemberModal" tabindex="-1" aria-labelledby="tambahmemberModalLabel" aria-hidden="true">
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
                        <h5 class="modal-title" id="tambahkelasModalLabel">New Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url(); ?>admin/add_member" method="post">
                        <div class="modal-body">
                            <span>Name</span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_member" name="nama_member" placeholder="Name of member">
                            </div>
                            <span>User</span>
                            <div class="form-group">
                                <select class="form-control" name="user_id" id="user_id">
                                    <option value="" selected>--Choose user to join--</option>
                                    <?php foreach ($user as $u) { ?>
                                        <option value="<?= $u['id_user'] ?>">
                                            <?php echo $u['id_user'] . ' - ' . $u['nama']; ?></option>
                                    <?php }; ?>
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
        <!-- End Tambah Member Modal -->

        <!-- Member Edit Modal -->
        <?php foreach ($member as $m) : ?>
            <div class="modal fade" id="editmemberModal<?= $m['id_member'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editmemberModal<?= $m['id_member']; ?>Label" aria-hidden="true">
                <div class="modal-dialog" kelas="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editMenuModal<?= $m['id_member'] ?>">Member Edit</h5>
                            <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </buttond>
                        </div>
                        <form action="<?= base_url('admin/edit_member/' . $m['id_member']); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <span>Member ID</span>
                                    <input type="text" class="form-control" readonly value="<?= $m['id_member']; ?>" id="id_member" name="id_member">
                                </div>
                                <div class="form-group">
                                    <span>Nama</span>
                                    <input type="text" class="form-control" value="<?= $m['nama_member']; ?>" id="_membernama_member" name="nama_member" placeholder="Name of member">
                                </div>

                                <span>User</span>
                                <div class="form-group">
                                    <select class="form-control" name="user_id" id="user_id">
                                        <option value="<?= $m['user_id'] ?>" selected><?php echo $m['id_user'] . ' - ' . $m['nama']; ?></option>
                                        <?php foreach ($user as $u) { ?>
                                            <option value="<?= $u['id_user'] ?>">
                                                <?php echo $u['id_user'] . ' - ' . $u['nama']; ?></option>
                                        <?php }; ?>
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