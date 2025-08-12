

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mt-5">Login</h3>

    <form method="POST" action="<?php echo e(url('/login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <?php if($errors->any()): ?>
            <p class="text-danger"><?php echo e($errors->first()); ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\Employee-CRUD-Application-main\laravel11projects\employee-app\resources\views/auth/login.blade.php ENDPATH**/ ?>