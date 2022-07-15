<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <h4 class="card-title">DATA PESERTA</h4>
            </ol>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h4 class="card-title">DATA PESERTA</h4> -->
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Tambah Peserta</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>NAME</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Date</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peserta as $row) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"><img src="assets/template/images/avatar/1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no"><?php echo $row->nama_lengkap; ?></span></div>
                                        </td>
                                        <td><?php echo $row->email; ?></td>
                                        <td><?php echo $row->tgl_lahir; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> <?php echo $row->status; ?></div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="<?php echo site_url('peserta/edit_peserta/' . $row->id); ?>" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".edit-modal"><i class="fas fa-pencil-alt"></i></a>
                                                <!-- <a href="<?php echo site_url('peserta/delete/' . $row->id); ?>" onclick="deleteFunction()" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> -->
                                                <a href="<?php echo site_url('peserta/delete/' . $row->id); ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Peserta</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?php echo site_url('peserta/save_peserta'); ?>" method="post">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">NIK</label>
                                                <input type="text" class="form-control" name="nik" placeholder="NIK KTP">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Tgl. Lahir</label>
                                                <input type="date" class="form-control" name="tgl_lahir" placeholder="Tgl Lahir">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Nomor HP</label>
                                                <input type="text" class="form-control" name="no_hp" placeholder="Nomor HP">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Kota</label>
                                                <input type="text" class="form-control" name="kota" placeholder="Kota">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label for="unit" class="form-label">Unit</label>
                                                <select id="unit" name="unit" class="default-select form-control wide">
                                                    <option selected="">Choose...</option>
                                                    <option value="Pusat">Pusat</option>
                                                    <option value="Kertasena">Kertasena</option>
                                                    <option value="PM. Sahid">PM. Sahid</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <select id="jabatan" name="jabatan" class="default-select form-control wide">
                                                    <option selected="">Choose...</option>
                                                    <option value="Anggota">Anggota</option>
                                                    <option value="Pengurus">Pengurus</option>
                                                    <option value="Anggota Kehormatan">Anggota Kehormatan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="photo">Photo</label>
                                                <div class="input-group">
                                                    <div class="form-file">
                                                        <input type="file" name="photo" class="form-file-input form-control">
                                                    </div>
                                                </div>
                                                <!-- <input type="file" name="berkas" /> -->
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Peserta</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?php echo site_url('peserta/update'); ?>" method="post">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_lengkap_edit" value="<?php echo $nama_lengkap_edit; ?>" placeholder="Nama Lengkap">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">NIK</label>
                                                <input type="text" class="form-control" name="nik_edit" value="<?php echo $nik_edit; ?>" placeholder="NIK KTP">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir_edit" value="<?php echo $tempat_lahir_edit; ?>" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Tgl. Lahir</label>
                                                <input type="date" class="form-control" name="tgl_lahir_edit" value="<?php echo $tgl_lahir_edit; ?>" placeholder="Tgl Lahir">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email_edit" value="<?php echo $email_edit; ?>" placeholder="Email">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Nomor HP</label>
                                                <input type="text" class="form-control" name="no_hp_edit" value="<?php echo $no_hp_edit; ?>" placeholder="Nomor HP">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" class="form-control" name="alamat_edit" value="<?php echo $alamat_edit; ?>" placeholder="Alamat">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Kota</label>
                                                <input type="text" class="form-control" name="kota_edit" value="<?php echo $kota_edit; ?>" placeholder="Kota">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label for="unit" class="form-label">Unit</label>
                                                <select id="unit" name="unit" class="default-select form-control wide">
                                                    <option selected="">Choose...</option>
                                                    <option value="Pusat">Pusat</option>
                                                    <option value="Kertasena">Kertasena</option>
                                                    <option value="PM. Sahid">PM. Sahid</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <select id="jabatan" name="jabatan" class="default-select form-control wide">
                                                    <option selected="">Choose...</option>
                                                    <option value="Anggota">Anggota</option>
                                                    <option value="Pengurus">Pengurus</option>
                                                    <option value="Anggota Kehormatan">Anggota Kehormatan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="photo">Photo</label>
                                                <div class="input-group">
                                                    <div class="form-file">
                                                        <input type="file" name="photo" class="form-file-input form-control">
                                                    </div>
                                                </div>
                                                <!-- <input type="file" name="berkas" /> -->
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Pegawai -->
                <div class="modal fade" id="editpegawaimodal" tabindex="-1" role="dialog" aria-labelledby="editpegawaimodal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="editpegawaimodallabel"><span class="fas fa-user-edit mr-1"></span>Edit Pegawai</h5>
                            </div>
                            <div class="modal-body">
                                <div id="editdatapegawai"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Yakin ingin menghapus?",
                text: "Tapi kamu masih bisa membatalkannya.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Tidak!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    console.log('Delete');
                    form.submit(); // submitting the form when user press yes
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
    }
</script>