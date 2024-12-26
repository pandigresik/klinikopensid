<?php $__env->startSection('title'); ?>
    <h1>
        Pengaturan Database
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active"><a href="<?php echo e(ci_route('database')); ?>">Pengaturan Database</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li <?php echo $act_tab == 1 ? 'class="active"' : ''; ?>><a href="<?php echo e(ci_route('database')); ?>">Backup <?php echo e(jecho(config_item('demo_mode'), false, ' /Restore')); ?></a></li>
            <?php if(can('u')): ?>
                <li <?php echo $act_tab == 2 ? 'class="active"' : ''; ?>><a href="<?php echo e(ci_route('database.migrasi_cri')); ?>">Migrasi DB</a></li>
            <?php endif; ?>
        </ul>
        <div class="tab-content">
            <?php echo $__env->make($content, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /data/docker/opendesa/KlinikOpenSID/resources/views/admin/database/index.blade.php ENDPATH**/ ?>