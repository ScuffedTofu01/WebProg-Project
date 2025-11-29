

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Add New Tip</h1>

    <form method="POST" action="/admin/tips" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label>Title</label>
        <input type="text" name="title" class="w-full border p-2 mb-4" required>

        <label>Description</label>
        <textarea name="description" class="w-full border p-2 mb-4" required></textarea>

        <label>Benefits (one per line)</label>
        <textarea name="benefits" class="w-full border p-2 mb-4" required></textarea>

        <label>Energy Saving</label>
        <input type="text" name="energy_saving" class="w-full border p-2 mb-4" required>

        <label>Image (optional)</label>
        <input type="file" name="image" class="w-full border p-2 mb-4">

        <button class="px-4 py-2 bg-green-600 text-white rounded">Save</button>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/admin/tips/create.blade.php ENDPATH**/ ?>