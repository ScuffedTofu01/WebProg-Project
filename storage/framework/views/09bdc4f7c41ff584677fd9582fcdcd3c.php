

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Manage Resources</h1>

    <a href="/admin/resources/create" class="px-4 py-2 bg-green-600 text-white rounded">Add New Resource</a>

    <table class="w-full mt-6 bg-white shadow rounded-lg">
        <tr class="bg-gray-200">
            <th class="p-3 text-left">Title</th>
            <th class="p-3 text-left">Type</th>
            <th class="p-3 text-left">URL</th>
            <th class="p-3 text-left">Actions</th>
        </tr>

        <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-t">
            <td class="p-3"><?php echo e($resource->title); ?></td>
            <td class="p-3"><?php echo e(ucfirst($resource->type)); ?></td>
            <td class="p-3">
                <a href="<?php echo e($resource->url); ?>" target="_blank" class="text-blue-600 underline">
                    View
                </a>
            </td>
            <td class="p-3 flex gap-2">

                <a href="/admin/resources/<?php echo e($resource->id); ?>/edit"
                   class="px-3 py-1 bg-blue-500 text-white rounded">Edit</a>

                <form action="/admin/resources/<?php echo e($resource->id); ?>" method="POST"
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/admin/resources/index.blade.php ENDPATH**/ ?>