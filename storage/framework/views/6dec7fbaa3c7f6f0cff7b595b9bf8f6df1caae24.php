<?php if(config_item('csrf_protection')): ?>
    <!-- CSRF Token -->
    <script type="text/javascript">
        var csrfParam = "<?php echo e($token_name); ?>";
        var csrfVal = "<?php echo e($token_value); ?>";

        var getCsrfToken = (csrfVal) => {
            const match = document.cookie.match(new RegExp(`${csrfParam}=([^;]+)`));
            return match ? match[1] : csrfVal;
        };
    </script>
    <script src="<?php echo e(asset('js/anti-csrf.js')); ?>"></script>
<?php endif; ?>
<?php /**PATH /data/docker/opendesa/KlinikOpenSID/resources/views/admin/layouts/components/token.blade.php ENDPATH**/ ?>