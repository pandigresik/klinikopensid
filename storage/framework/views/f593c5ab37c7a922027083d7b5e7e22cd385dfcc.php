<div class="col-md-12">
    <div class="row" style="margin-top: 5px">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Peristiwa</th>
                    <th>Tgl Lapor</th>
                    <th>Tgl Peristiwa</th>
                    <th>Tanggal Buat</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($log['id']); ?></td>
                        <td><?php echo e(\App\Models\LogPenduduk::kodePeristiwaAll($log['kode_peristiwa'])); ?></td>
                        <td><?php echo e($log['tgl_lapor']); ?></td>
                        <td><?php echo e($log['tgl_peristiwa']); ?></td>
                        <td><?php echo e($log['created_at']); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="row" style="padding: 5px">
        <button type="button" data-log='<?php echo e($log['id']); ?>' onclick="hapusLogPenduduk(this)" class="btn btn-sm btn-warning col-sm-12" style="margin-right:5px;margin-bottom:5px">Hapus Log Penduduk Terakhir ( <?php echo e(\App\Models\LogPenduduk::kodePeristiwaAll($kodePeristiwa)); ?> )</button>
        <button type="button" data-log='<?php echo e($log['id']); ?>' onclick="updateStatusPenduduk(this)" class="btn btn-sm btn-danger col-sm-12">Update Status Penduduk Saat Ini Mengikuti Log Terakhir ( <?php echo e(\App\Models\LogPenduduk::kodePeristiwaAll($kodePeristiwa)); ?>)</button>
    </div>
</div>

<script type="text/javascript">
    function hapusLogPenduduk(elm) {
        $.post('periksaLogPenduduk/hapusLog', {
            id: $(elm).data('log'),
            <?php echo e($ci->security->get_csrf_token_name()); ?>: '<?php echo e($ci->security->get_csrf_hash()); ?>'
        }, function(data) {
            let _message = 'Data penduduk dengan nik <?php echo e($nik); ?> gagal diperbaiki'
            let _messageClass = 'danger'
            if (data.status) {
                let _modal = $(elm).closest('.modal')
                _modal.find('button.close').click()
                $('tr[data-log-tidak-sinkron=<?php echo e($nik); ?>]').find('td:last').html('<button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Sudah diperbaiki</button>')
                _message = 'Data penduduk dengan nik <?php echo e($nik); ?> berhasil diperbaiki'
                _messageClass = 'success'
            }
            $('#info-log-penduduk-tidak-sinkron').html(`<div class="alert alert-${_messageClass}">${_message}</div>`)
        }, 'json')
    }

    function updateStatusPenduduk(elm) {
        $.post('periksaLogPenduduk/updateStatusDasar', {
            id: $(elm).data('log'),
            <?php echo e($ci->security->get_csrf_token_name()); ?>: '<?php echo e($ci->security->get_csrf_hash()); ?>'
        }, function(data) {
            let _message = 'Data penduduk dengan nik <?php echo e($nik); ?> gagal diperbaiki'
            let _messageClass = 'danger'
            if (data.status) {
                let _modal = $(elm).closest('.modal')
                _modal.find('button.close').click()
                $('tr[data-log-tidak-sinkron=<?php echo e($nik); ?>]').find('td:last').html('<button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Sudah diperbaiki</button>')
                _message = 'Data penduduk dengan nik <?php echo e($nik); ?> berhasil diperbaiki'
                _messageClass = 'success'
            }
            $('#info-log-penduduk-tidak-sinkron').html(`<div class="alert alert-${_messageClass}">${_message}</div>`)
        }, 'json')
    }
</script>
<?php /**PATH /data/docker/opendesa/KlinikOpenSID/resources/views/periksa/log.blade.php ENDPATH**/ ?>