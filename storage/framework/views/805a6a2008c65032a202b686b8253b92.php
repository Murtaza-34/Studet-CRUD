<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <?php if($showCreate): ?>
        
        <h3>Create Student</h3>

        <form method="POST" action="<?php echo e(route('student.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label>Student Name</label>
                <input type="text" class="form-control" name="std_name" required>
            </div>
            <div class="mb-3">
                <label>DOB</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?php echo e(route('student.index')); ?>" class="btn btn-secondary">Back to List</a>

        </form>

    <?php else: ?>
        <?php if(session()->has('username')): ?>
    <a href="<?php echo e(route('logout')); ?>" class="btn btn-danger float-end mb-3">Logout</a>
<?php endif; ?>
        <h3>Student List</h3>
        <a href="<?php echo e(route('student.index', ['create' => 1])); ?>" class="btn btn-success mb-3">Create New Student</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($student->std_name); ?></td>
                        <td><?php echo e($student->dob); ?></td>
                        <td><?php echo e($student->phone); ?></td>
                        <td>
                            <a href="<?php echo e(route('student.edit', $student->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                            <form action="<?php echo e(route('student.destroy', $student->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center">No students found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\Employee-CRUD-Application-main\laravel11projects\employee-app\resources\views/pages/index.blade.php ENDPATH**/ ?>