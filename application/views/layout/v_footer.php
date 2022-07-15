<!--**********************************
    Footer start
***********************************-->
<div class="footer">

    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 2022</p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="assets/template/vendor/global/global.min.js"></script>
<script src="assets/template/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="assets/template/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<!-- Apex Chart -->
<script src="assets/template/vendor/apexchart/apexchart.js"></script>
<script src="assets/template/vendor/nouislider/nouislider.min.js"></script>
<script src="assets/template/vendor/wnumb/wNumb.js"></script>

<!-- Dashboard 1 -->
<script src="assets/template/js/dashboard/dashboard-1.js"></script>

<script src="assets/template/js/custom.min.js"></script>
<script src="assets/template/js/dlabnav-init.js"></script>
<script src="assets/template/js/demo.js"></script>
<script src="assets/template/js/styleSwitcher.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/scripts.js"></script>
<script src="<?= base_url('assets'); ?>/js/sb-admin-js.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-toggle-master/js/bootstrap4-toggle.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jonthornton-jquery-timepicker/jquery.timepicker.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>

<script type="text/javascript"></script>
<!-- <script>
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
    function(isConfirm){
    if (isConfirm) {
        form.submit();          // submitting the form when user press yes
    } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
    }
    });
    }
</script> -->
<!--CRUD Pegawai-->
<script>
    $('#datapegawai').DataTable({
        "ajax": {
            url: "<?= base_url('ajax/get_datatbl?type=datapgw'); ?>",
            type: 'get',
            async: true,
            "processing": true,
            "serverSide": true,
            dataType: 'json',
            "bDestroy": true
        },
        rowCallback: function(row, data, iDisplayIndex) {
            $('td:eq(0)', row).html();
        }
    });

    $('#addpegawai').submit(function(e) {
        e.preventDefault();
        var form = this;
        $("#addpgw-btn").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Proses Penambahan").attr("disabled", true);
        var formdata = new FormData(form);
        $.ajax({
            url: "<?= base_url('ajax/datapgw?type=addpgw'); ?>",
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
                $("#info-data").hide();
                swal.fire({
                    imageUrl: "<?= base_url('assets'); ?>/img/ajax-loader.gif",
                    title: "Menambahkan Pegawai",
                    text: "Please wait",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function(response) {
                $("#info-data").html(response.messages).attr("disabled", false).show();
                if (response.success == true) {
                    $('.text-danger').remove();
                    swal.fire({
                        icon: 'success',
                        title: 'Penambahan Pegawai Berhasil',
                        text: 'Penambahan pegawai sudah berhasil !',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#datapegawai').DataTable().ajax.reload();
                    $('#addpegawaimodal').modal('hide');
                    form.reset();
                    $("#addpgw-btn").html("<span class='fas fa-plus mr-1' aria-hidden='true' ></span>Simpan").attr("disabled", false);
                } else {
                    swal.close()
                    $("#addpgw-btn").html("<span class='fas fa-plus mr-1' aria-hidden='true' ></span>Simpan").attr("disabled", false);
                }
            },
            error: function() {
                swal.fire("Penambahan Pegawai Gagal", "Ada Kesalahan Saat penambahan pegawai!", "error");
                $("#addpgw-btn").html("<span class='fas fa-pen mr-1' aria-hidden='true' ></span>Edit").attr("disabled", false);
            }
        });

    });

    $("#datapegawai").on('click', '.delete-pegawai', function(e) {
        e.preventDefault();
        var pgw_id = $(e.currentTarget).attr('data-pegawai-id');
        if (pgw_id === '') return;
        Swal.fire({
            title: 'Hapus User Ini?',
            text: "Anda yakin ingin menghapus user ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('ajax/datapgw?type=delpgw'); ?>',
                    data: {
                        pgw_id: pgw_id
                    },
                    beforeSend: function() {
                        swal.fire({
                            imageUrl: "<?= base_url('assets'); ?>/img/ajax-loader.gif",
                            title: "Menghapus User",
                            text: "Please wait",
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    },
                    success: function(data) {
                        if (data.success == false) {
                            swal.fire({
                                icon: 'error',
                                title: 'Menghapus User Gagal',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            swal.fire({
                                icon: 'success',
                                title: 'Menghapus User Berhasil',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#datapegawai').DataTable().ajax.reload();
                        }
                    },
                    error: function() {
                        swal.fire("Penghapusan Pegawai Gagal", "Ada Kesalahan Saat menghapus pegawai!", "error");
                    }
                });
            }
        })
    });

    $("#datapegawai").on('click', '.activate-pegawai', function(e) {
        e.preventDefault();
        var pgw_id = $(e.currentTarget).attr('data-pegawai-id');
        if (pgw_id === '') return;
        $.ajax({
            type: "POST",
            url: '<?= base_url('ajax/datapgw?type=actpgw'); ?>',
            data: {
                pgw_id: pgw_id
            },
            dataType: 'json',
            beforeSend: function() {
                swal.fire({
                    imageUrl: "<?= base_url('assets'); ?>/img/ajax-loader.gif",
                    title: "Aktivasi User",
                    text: "Please wait",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function(data) {
                if (data.success) {
                    swal.fire({
                        icon: 'success',
                        title: 'Aktivasi User Berhasil',
                        text: 'Anda telah mengaktifkan user!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#datapegawai').DataTable().ajax.reload();
                } else {
                    swal.fire({
                        icon: 'error',
                        title: 'User Sudah Diaktivasi',
                        text: 'User ini sudah diaktivasi!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#datapegawai').DataTable().ajax.reload();
                }
            },
            error: function() {
                swal.fire("Aktivasi Pegawai Gagal", "Ada Kesalahan Saat aktivasi pegawai!", "error");
            }
        });
    });

    $("#datapegawai").on('click', '.view-pegawai', function(e) {
        e.preventDefault();
        var pgw_id = $(e.currentTarget).attr('data-pegawai-id');
        if (pgw_id === '') return;
        $.ajax({
            type: "POST",
            url: '<?= base_url('ajax/datapgw?type=viewpgw'); ?>',
            data: {
                pgw_id: pgw_id
            },
            beforeSend: function() {
                swal.fire({
                    imageUrl: "<?= base_url('assets'); ?>/img/ajax-loader.gif",
                    title: "Mempersiapkan Preview User",
                    text: "Please wait",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function(data) {
                swal.close();
                $('#viewpegawaimodal').modal('show');
                $('#viewdatapegawai').html(data);

            },
            error: function() {
                swal.fire("Preview Pegawai Gagal", "Ada Kesalahan Saat menampilkan data pegawai!", "error");
            }
        });
    });

    $("#datapegawai").on('click', '.edit-pegawai', function(e) {
        e.preventDefault();
        var pgw_id = $(e.currentTarget).attr('data-pegawai-id');
        if (pgw_id === '') return;
        $.ajax({
            type: "POST",
            url: '<?= base_url('ajax/datapgw?type=edtpgw'); ?>',
            data: {
                pgw_id: pgw_id
            },
            beforeSend: function() {
                swal.fire({
                    imageUrl: "<?= base_url('assets'); ?>/img/ajax-loader.gif",
                    title: "Mempersiapkan Edit User",
                    text: "Please wait",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function(data) {
                swal.close();
                $('#editpegawaimodal').modal('show');
                $('#editdatapegawai').html(data);

                $('#editpegawai').submit(function(e) {
                    e.preventDefault();
                    var form = this;
                    $("#editpgw-btn").html("<span class='fas fa-spinner fa-pulse' aria-hidden='true' title=''></span> Menyimpan").attr("disabled", true);
                    var formdata = new FormData(form);
                    $.ajax({
                        url: "<?= base_url('ajax/editpgwbc?type=edtpgwalt'); ?>",
                        type: 'POST',
                        data: formdata,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        beforeSend: function() {
                            swal.fire({
                                imageUrl: "<?= base_url('assets'); ?>/img/ajax-loader.gif",
                                title: "Menyimpan Data Pegawai",
                                text: "Please wait",
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function(response) {
                            if (response.success == true) {
                                $('.text-danger').remove();
                                swal.fire({
                                    icon: 'success',
                                    title: 'Edit Pegawai Berhasil',
                                    text: 'Edit pegawai sudah berhasil !',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('#datapegawai').DataTable().ajax.reload();
                                $('#editpegawaimodal').modal('hide');
                                form.reset();
                                $("#editpgw-btn").html("<span class='fas fa-pen mr-1' aria-hidden='true' ></span>Edit").attr("disabled", false);
                            } else {
                                swal.close()
                                $("#editpgw-btn").html("<span class='fas fa-pen mr-1' aria-hidden='true' ></span>Edit").attr("disabled", false);
                                $("#info-edit").html(response.messages);
                            }
                        },
                        error: function() {
                            swal.fire("Edit Pegawai Gagal", "Ada Kesalahan Saat pengeditan pegawai!", "error");
                            $("#editpgw-btn").html("<span class='fas fa-pen mr-1' aria-hidden='true' ></span>Edit").attr("disabled", false);
                        }
                    });

                });
            },
            error: function() {
                swal.fire("Edit Pegawai Gagal", "Ada Kesalahan Saat pengeditan pegawai!", "error");
            }
        });
    });
</script>


</body>

</html>