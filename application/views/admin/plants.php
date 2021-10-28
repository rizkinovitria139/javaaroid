        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Plants</h1>

            </div>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#tambahplantsModal">New Plants</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($plants as $p) : ?>

                                            <!-- perulangan buat data new -->
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $p['nama']; ?></td>
                                                <td><?= $p['jenis']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-icon" href="" data-toggle="modal" data-target="#editplantsModal<?= $p['id_plants']; ?>">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    <a class="btn btn-danger" href="<?= base_url('admin/delete_plants/') . $p['id_plants']; ?>" onclick="return confirm('Are you sure to delete this data ?');">
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

        <!-- Tambah Plants Modal -->
        <div class="modal fade" id="tambahplantsModal" tabindex="-1" aria-labelledby="tambahplantsModalLabel" aria-hidden="true">
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
                        <h5 class="modal-title" id="tambahkelasModalLabel">New Plants</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url(); ?>admin/add_plants" method="post">
                        <div class="modal-body">
                            <!-- <span>ID Kelas</span>
							<div class="form-group">
								<input type="text" class="form-control" id="id_kelas" name="id_kelas" placeholder="Masukkan ID Kelas">
							</div> -->
                            <span>Name</span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Name of plants">
                            </div>
                            <span>Type</span>
                            <div class="form-group">
                                <select class="form-control" name="jenis" id="jenis">
                                    <option value="Anthurium">Anthurium</option>
                                    <option value="Epipremnum">Epipremnum</option>
                                    <option value="Monsterra">Monsterra</option>
                                    <option value="Philodendron">Philodendron</option>
                                    <option value="Scindapsus">Scindapsus</option>
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

        <!-- Plants Edit Modal -->
        <?php foreach ($plants as $p) : ?>
            <div class="modal fade" id="editplantsModal<?= $p['id_plants'] ?>" tabindex="-1" kelas="dialog" aria-labelledby="editplantsModal<?= $p['id_plants']; ?>Label" aria-hidden="true">
                <div class="modal-dialog" kelas="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editMenuModal<?= $p['id_plants'] ?>">Plants Edit</h5>
                            <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </buttond>
                        </div>
                        <form action="<?= base_url('admin/edit_plants/' . $p['id_plants']); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <span>Plants ID</span>
                                    <input type="text" class="form-control" readonly value="<?= $p['id_plants']; ?>" id="id_plants" name="id_plants">
                                </div>
                                <div class="form-group">
                                    <span>Nama</span>
                                    <input type="text" class="form-control" value="<?= $p['nama']; ?>" id="nama" name="nama" placeholder="Name of plants">
                                </div>

                                <span>Type</span>
                                <div class="form-group">
                                    <select class="form-control" name="jenis" id="jenis">
                                        <option value="<?= $p['jenis']; ?>" selected><?php echo $p['jenis']; ?></option>
                                        <option value="Anthurium">Anthurium</option>
                                        <option value="Epipremnum">Epipremnum</option>
                                        <option value="Monsterra">Monsterra</option>
                                        <option value="Philodendron">Philodendron</option>
                                        <option value="Scindapsus">Scindapsus</option>
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