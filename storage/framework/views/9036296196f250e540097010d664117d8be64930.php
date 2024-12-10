<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Periksa Database |
        <?php echo e(setting('admin_title') . ' ' . ucwords(setting('sebutan_desa') . ' ' . $header['nama_desa'])); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="<?php echo e(favico_desa()); ?>" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/ionicons.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('css/skins/_all-skins.min.css')); ?>">
</head>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?php echo e(ci_route('/')); ?>" class="navbar-brand"><b>Open</b>SID</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    </div>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="content-wrapper">
            <div class="container">

                <section class="content-header">
                    <h1>
                        Pemeriksaan Database
                    </h1>
                </section>
                <section class="content">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Masalah</h3>
                        </div>
                        <div class="panel-body">
                            <?php if(empty($masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p>Masalah ini belum diketahui sebabnya. Harap laporkan kepada OpenDesa untuk
                                        dibantu lebih lanjut. Harap periksa berkas logs dan laporkan juga isinya.
                                    </p>                                    
                                </div>
                            </div>
                            <?php else: ?>
                            <?php if(in_array('kode_kelompok', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi kode kelompok terlalu panjang</strong>
                                    <table class="table">
                                        <tr>
                                            <th>Kode kelompok terlalu panjang</th>
                                        </tr>
                                        <?php $__currentLoopData = $kode_panjang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($kode['kode']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperpendek kode kelompok supaya dapat dibuat
                                        unik dengan menambahkan ID di akhir masing-masing kode. Untuk melihat
                                        kode yang diubah harap periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'kode_kelompok')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('ref_inventaris_kosong', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi referensi pertanahan dan inventaris kosong</strong>
                                    <p>Klik tombol Perbaiki untuk mengembalikan isi tabel referensi tersebut.
                                        <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'ref_inventaris_kosong')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('id_cluster_null', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi lokasi keluarga kosong</strong>
                                    <table class="table">
                                        <tr>
                                            <th>No KK</th>
                                            <th>Nama Kepala Keluarga</th>
                                        </tr>
                                        <?php $__currentLoopData = $id_cluster_null; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($kel['no_kk']); ?></td>
                                            <td><?php echo e($kel['nama']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk mengubah lokasi keluarga kosong menjadi
                                        <strong><?php echo e($wilayah_pertama['wil']); ?></strong>. Untuk melihat keluarga
                                        yang diubah harap periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'id_cluster_null')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('nik_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi NIK ganda</strong>
                                    <table class="table">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Ganda</th>
                                        </tr>
                                        <?php $__currentLoopData = $nik_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($nik['nik']); ?></td>
                                            <td><?php echo e($nik['jml']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki NIK ganda dengan (1) mengubah
                                        semua NIK yang bukan numerik menjadi NIK sementara, dan (2) mengubah NIK
                                        ganda selain yang pertama menjadi NIK sementara. Untuk melihat NIK yang
                                        diubah harap periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'nik_ganda')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('kk_panjang', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi nomor KK melebihi 16 karakter</strong>
                                    <table class="table">
                                        <tr>
                                            <th>No KK</th>
                                            <th>Panjang</th>
                                        </tr>
                                        <?php $__currentLoopData = $kk_panjang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($kk['no_kk']); ?></td>
                                            <td><?php echo e($kk['panjang']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki dengan mengubah semua nomor KK
                                        panjang menjadi KK sementara. Untuk melihat nomor KK yang diubah harap
                                        periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'kk_panjang')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('no_kk_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi no_kk ganda</strong>
                                    <table class="table">
                                        <tr>
                                            <th>No KK</th>
                                            <th>Ganda</th>
                                        </tr>
                                        <?php $__currentLoopData = $no_kk_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_kk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no_kk['no_kk']); ?></td>
                                            <td><?php echo e($no_kk['jml']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki no_kk ganda dengan (1) menambah id
                                        ke masing-masing no_kk. Untuk melihat no_kk yang diubah harap periksa
                                        berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'no_kk_ganda')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('username_user_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi username user ganda</strong>
                                    <table class="table">
                                        <tr>
                                            <th>Username</th>
                                            <th>Ganda</th>
                                        </tr>
                                        <?php $__currentLoopData = $username_user_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($username['username']); ?></td>
                                            <td><?php echo e($username['jml']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki username ganda dengan (1) mengubah
                                        username kosong menjadi null, dan (2) menambah id ke masing-masing
                                        username. Untuk melihat username yang diubah harap periksa berkas logs.
                                        <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'username_user_ganda')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('email_user_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi email user ganda</strong>
                                    <table class="table">
                                        <tr>
                                            <th>Email</th>
                                            <th>Ganda</th>
                                        </tr>
                                        <?php $__currentLoopData = $email_user_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($email['email']); ?></td>
                                            <td><?php echo e($email['jml']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki email ganda dengan (1) mengubah
                                        email kosong menjadi null, dan (2) menambah id ke masing-masing email.
                                        Untuk melihat email yang diubah harap periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'email_user_ganda')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('email_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi email penduduk ganda</strong>
                                    <table class="table">
                                        <tr>
                                            <th>Email</th>
                                            <th>Ganda</th>
                                        </tr>
                                        <?php $__currentLoopData = $email_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($email['email']); ?></td>
                                            <td><?php echo e($email['jml']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki email ganda dengan (1) mengubah
                                        email kosong menjadi null, dan (2) menambah id ke masing-masing email.
                                        Untuk melihat email yang diubah harap periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'email_ganda')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('tag_id_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi Tag ID ganda</strong>
                                    <table class="table">
                                        <tr>
                                            <th>Tag ID</th>
                                            <th>Ganda</th>
                                        </tr>
                                        <?php $__currentLoopData = $tag_id_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($tag_id['tag_id_card']); ?></td>
                                            <td><?php echo e($tag_id['jml']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk mengosongkan Tag ID ganda, supaya hanya Tag ID
                                        yang unik saja yang tertinggal. Untuk melihat Tag ID yang diubah harap
                                        periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'tag_id_ganda')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('kartu_alamat', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi ada kartu_tempat_lahir atau kartu_alamat berisi null,
                                        seharusnya ''</strong>
                                    <p>Klik tombol Perbaiki untuk mengubah nilai null menjadi '' <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'kartu_alamat')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('autoincrement', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi ada tabel yang kehilangan autoincrement</strong>
                                    <p>Klik tombol Perbaiki untuk mengembalikan autoincrement pada semua tabel
                                        yang memerlukan <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'autoincrement')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('collation', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi collation table bukan
                                        <code><?php echo e($ci->db->dbcollat); ?></code></strong>
                                    <table class="table">
                                        <tr>
                                            <th>Tabel</th>
                                            <th>Collation</th>
                                        </tr>
                                        <?php $__currentLoopData = $collation_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($value['TABLE_NAME']); ?></td>
                                            <td><?php echo e($value['TABLE_COLLATION']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki semua collation table yang tidak
                                        sesuai menjadi collation <code><?php echo e($ci->db->dbcollat); ?></code>.<br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'collation')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('zero_date_default_value', $masalah)): ?>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi zero date Default Value<code>(0000-00-00 00:00:00)</code>
                                        pada tabel berikut : </strong>
                                    <table class="table">
                                        <tr>
                                            <th>Tabel</th>
                                            <th>Kolom</th>
                                        </tr>
                                        <?php $__currentLoopData = $zero_date_default_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($value['table_name']); ?></td>
                                            <td><?php echo e($value['column_name']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki semua data default table yang
                                        tidak sesuai <code>(0000-00-00 00:00:00)</code>.</code>Untuk melihat
                                        data tanggal yang diubah harap periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'zero_date_default_value')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('tabel_invalid_date', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi tanggal tidak sesuai <code>(0000-00-00 00:00:00)</code>
                                        pada tabel berikut : </strong>
                                    <table class="table">
                                        <tr>
                                            <th>Tabel</th>
                                        </tr>
                                        <?php $__currentLoopData = $tabel_invalid_date; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki semua data tanggal table yang
                                        tidak sesuai <code>(0000-00-00 00:00:00)</code>.</code>Untuk melihat
                                        data tanggal yang diubah harap periksa berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'tabel_invalid_date')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('data_jabatan_tidak_ada', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi ada data jabatan yang tidak tersedia.</strong>
                                    <p>Klik tombol Perbaiki untuk mengembalikan data jabatan yang diperlukan
                                        tersebut. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'data_jabatan_tidak_ada')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('penduduk_tanpa_keluarga', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi penduduk belum tercatat di data keluarga</strong>
                                    <table class="table">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                        </tr>
                                        <?php $__currentLoopData = $penduduk_tanpa_keluarga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penduduk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($penduduk['nik']); ?></td>
                                            <td><?php echo e($penduduk['nama']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki Data untuk memperbaiki penduduk yang belum tercatat
                                        keluarganya. Untuk melihat no_kk_sementara yang diubah harap periksa
                                        berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'penduduk_tanpa_keluarga')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('log_penduduk_tidak_sinkron', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi log penduduk dan status dasar penduduk tidak sesuai</strong>
                                    <div class="col-md-10 col-offset-1" id="info-log-penduduk-tidak-sinkron">

                                    </div>

                                    <table class="table">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Kode Peristiwa Log Terakhir</th>
                                            <th>Status Dasar Saat Ini</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php $__currentLoopData = $log_penduduk_tidak_sinkron; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penduduk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-log-tidak-sinkron="<?php echo e($penduduk['nik']); ?>">
                                            <td><?php echo e($penduduk['nik']); ?></td>
                                            <td><?php echo e($penduduk['nama']); ?></td>
                                            <td><?php echo e(\App\Models\LogPenduduk::kodePeristiwaAll($penduduk['kode_peristiwa'])); ?></td>
                                            <td><?php echo e(\App\Enums\StatusDasarEnum::all()[$penduduk['status_dasar']] ?? '-'); ?></td>
                                            <td><button type="button" class="btn btn-sm btn-danger"
                                                    data-title="Data Catatan Peristiwa Penduduk <?php echo e($penduduk['nama']); ?> / <?php echo e($penduduk['nik']); ?>"
                                                    data-url='periksaLogPenduduk' data-ref='<?php echo json_encode(['penduduk'=> $penduduk]); ?>'
                                                    data-toggle="modal"
                                                    data-target="#modal-kosong"
                                                    data-close-btn-center=1
                                                    ><i class="fa fa-eye"></i> Lihat log</button></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('log_penduduk_null', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi log penduduk memiliki kode peristiwa null</strong>
                                    <table class="table">
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Kode Peristiwa</th>
                                        </tr>
                                        <?php $__currentLoopData = $log_penduduk_null; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penduduk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($penduduk['nik']); ?></td>
                                            <td><?php echo e($penduduk['nama']); ?></td>
                                            <td><?php echo e($penduduk['kode_peristiwa']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki Data memperbaiki data, kode peristiwa akan diset default
                                        menjadi 5 (baru pindah masuk). <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'log_penduduk_null')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('log_keluarga_bermasalah', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi keluarga tidak memiliki log keluarga baru</strong>
                                    <table class="table">
                                        <tr>
                                            <th>No KK</th>
                                            <th>Alamat</th>
                                        </tr>
                                        <?php $__currentLoopData = $log_keluarga_bermasalah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penduduk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($penduduk['no_kk']); ?></td>
                                            <td><?php echo e($penduduk['alamat']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki Data memperbaiki data, log keluarga dengan id peristiwa 1
                                        (keluarga baru) akan dibuat otomatis <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'log_keluarga_bermasalah')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a></p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('log_keluarga_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi keluarga tidak memiliki log keluarga ganda</strong>
                                    <div class="col-md-10 col-offset-1" id="info-log-keluarga-ganda">

                                    </div>
                                    <table class="table">
                                        <tr>
                                            <th>No KK</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php $__currentLoopData = $log_keluarga_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keluarga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-log-keluarga-ganda="<?php echo e($keluarga['id']); ?>">
                                            <td><?php echo e($keluarga['no_kk']); ?></td>
                                            <td><?php echo e($keluarga['alamat']); ?></td>
                                            <td><button type="button" class="btn btn-sm btn-danger"
                                                    data-title="Data Catatan Peristiwa Keluarga <?php echo e($keluarga['no_kk']); ?> / <?php echo e($keluarga['alamat']); ?>"
                                                    data-url='periksaLogKeluarga' data-ref='<?php echo json_encode(['
                                                    keluarga'=> $keluarga]); ?>'
                                                    data-toggle="modal"
                                                    data-target="#modal-kosong"
                                                    data-close-btn-center=0
                                                    ><i class="fa fa-eye"></i> Lihat log</button></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('no_anggota_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi No Anggota ganda</strong>
                                    <table class="table">
                                        <tr>
                                            <th>Ganda</th>
                                            <th>Config ID</th>
                                            <th>ID Kelompok</th>
                                            <th>No Anggota</th>
                                        </tr>
                                        <?php $__currentLoopData = $no_anggota_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no_anggota->jml); ?></td>
                                            <td><?php echo e($no_anggota->config_id); ?></td>
                                            <td><?php echo e($no_anggota->id_kelompok); ?></td>
                                            <td><?php echo e($no_anggota->no_anggota); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                    <p>Klik tombol Perbaiki untuk memperbaiki no_anggota ganda dengan (1) menambah id
                                        ke masing-masing no_anggota. Untuk melihat no_anggota yang diubah harap periksa
                                        berkas logs. <br><a href="#"
                                            data-href="<?php echo e(ci_route('periksa.perbaiki_sebagian', 'no_anggota_ganda')); ?>"
                                            class="btn btn-sm btn-social btn-danger" role="button"
                                            title="Perbaiki masalah data" data-toggle="modal"
                                            data-target="#confirm-backup"
                                            data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                                class="fa fa fa-wrench"></i>Perbaiki Data</a>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('klasifikasi_surat_ganda', $masalah)): ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <strong>Terdeteksi kode klasifikasi surat ganda</strong>
                                    <table class="table">
                                        <tr>
                                            <th>Id</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Uraian</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php $__currentLoopData = $klasifikasi_surat_ganda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $klasifikasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($klasifikasi['id']); ?></td>
                                            <td><?php echo e($klasifikasi['kode']); ?></td>
                                            <td><?php echo e($klasifikasi['nama']); ?></td>
                                            <td><?php echo e($klasifikasi['uraian']); ?></td>
                                            <td><button
                                                    onclick="$.get('periksaKlasifikasiSurat/hapus', {id: <?php echo e($klasifikasi['id']); ?>},function(){$(event.target).replaceWith(`<button class='btn btn-sm btn-success'><i class='fa fa-check'></i> Sudah dihapus</button>`)},'json')"
                                                    type="button" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash"></i> Hapus </button></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php
                            $excludePerbaikiSemua = ['klasifikasi_surat_ganda', 'log_keluarga_ganda',
                            'log_penduduk_tidak_sinkron'];
                            $pengurangMasalah = 0;
                            foreach ($excludePerbaikiSemua as $mandiri) {
                            if (in_array($mandiri, $masalah)) {
                            $pengurangMasalah++;
                            }
                            }
                            $totalMasalah = count($masalah) - $pengurangMasalah;
                            ?>
                            <?php if($totalMasalah): ?>
                            <p>Setelah diperbaiki, migrasi akan otomatis diulangi mulai dari versi
                                <?php echo e($migrasi_utk_diulang); ?>.</p>
                            <br><a href="#" data-href="<?php echo e(ci_route('periksa.perbaiki')); ?>"
                                class="btn btn-sm btn-social btn-danger" role="button" title="Perbaiki masalah data"
                                data-toggle="modal" data-target="#confirm-backup"
                                data-body="Apakah sudah melakukan backup database/folder desa?"><i
                                    class="fa fa fa-wrench"></i>Perbaiki Semua</a>
                            <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </div>                    
                </section>

            </div>

            <?php echo $__env->make('admin.layouts.components.konfirmasi', ['periksa_data' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('admin.layouts.components.modal_kosong', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b>Versi
                        <?= config_item('nama_aplikasi') ?>
                    </b> v<?php echo e(AmbilVersi()); ?>

                </div>
                <strong>Hak cipta &copy; 2016-<?php echo e(date('Y')); ?> <a href="https://opendesa.id">OpenDesa</a>.</strong>
                Seluruh hak cipta dilindungi.
            </div>
        </footer>
    </div>

    <!-- jQuery 3 -->
    <script src="<?php echo e(asset('bootstrap/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo e(asset('bootstrap/js/jquery.slimscroll.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('bootstrap/js/fastclick.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('js/adminlte.min.js')); ?>"></script>
    <?php if(!setting('inspect_element')): ?>
    <script src="<?php echo e(asset('js/disabled.min.js')); ?>"></script>
    <?php endif; ?>
    <script type="text/javascript">
        $('#confirm-backup').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            $(this).find('.modal-body').html($(e.relatedTarget).data('body'));
        });
        $('#modal-kosong').on('show.bs.modal', function (e) {
            let _btn = e.relatedTarget
            let _data = $(_btn).data('ref')
            let _url = $(_btn).data('url')
            let _title = $(_btn).data('title')
            let _btnCloseCenter = $(_btn).data('close-btn-center') ? {
                'text-align': 'center'
            } : {}
            let _modal = $(this)
            $.get(_url, _data, function (data) {
                _modal.find('.modal-body').html(data);
            }, 'html')

            _modal.find('.modal-title').html(_title)
            _modal.find('.modal-footer').css(_btnCloseCenter).html(
                `<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i
                        class="fa fa-sign-out"></i> Tutup</button>
                `
            )
        });
    </script>
</body>

</html><?php /**PATH /data/docker/opendesa/KlinikOpenSID/resources/views/periksa/index.blade.php ENDPATH**/ ?>