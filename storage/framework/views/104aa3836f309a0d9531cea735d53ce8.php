

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Manage Tips</h1>

    <a href="/admin/tips/create" class="px-4 py-2 bg-green-600 text-white rounded">Add New Tip</a>

    <table class="w-full mt-6 bg-white shadow rounded-lg">
        <tr class="bg-gray-200 text-left">
            <th class="p-3">Title</th>
            <th class="p-3">Energy Saving</th>
            <th class="p-3">Actions</th>
        </tr>

        <?php $__currentLoopData = $tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-t">
            <td class="p-3"><?php echo e($tip->title); ?></td>
            <td class="p-3"><?php echo e($tip->energy_saving); ?></td>
            <td class="p-3 flex gap-2">
                
                <a href="/admin/tips/<?php echo e($tip->id); ?>/edit"
                   class="px-3 py-1 bg-blue-500 text-white rounded">Edit</a>

                <form method="POST" action="/admin/tips/<?php echo e($tip->id); ?>"
                      onsubmit="return confirm('Are you sure?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                </form>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/admin/tips/index.blade.php ENDPATH**/ ?>