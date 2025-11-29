

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Edit Tip</h1>

    <form method="POST" action="/admin/tips/<?php echo e($tip->id); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label>Title</label>
        <input type="text" name="title" value="<?php echo e($tip->title); ?>"
               class="w-full border p-2 mb-4" required>

        <label>Description</label>
        <textarea name="description" class="w-full border p-2 mb-4" required><?php echo e($tip->description); ?></textarea>

        <label>Benefits</label>
        <textarea name="benefits" class="w-full border p-2 mb-4" required><?php echo e($tip->benefits); ?></textarea>

        <label>Energy Saving</label>
        <input type="text" name="energy_saving" value="<?php echo e($tip->energy_saving); ?>"
               class="w-full border p-2 mb-4" required>

        <label>Current Image (if any)</label><br>
        <?php if($tip->image): ?>
            <img src="<?php echo e(asset('storage/' . $tip->image)); ?>" class="w-40 rounded mb-4">
        <?php endif; ?>

        <label>Change Image</label>
        <input type="file" name="image" class="w-full border p-2 mb-4">

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    </form>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/admin/tips/edit.blade.php ENDPATH**/ ?>