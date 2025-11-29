

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">User Feedback</h1>

    <table class="w-full bg-white shadow rounded-lg">
        <tr class="bg-gray-200">
            <th class="p-3 text-left">Tip</th>
            <th class="p-3 text-left">Rating</th>
            <th class="p-3 text-left">Comment</th>
            <th class="p-3 text-left">Date</th>
            <th class="p-3 text-left">Actions</th>
        </tr>

        <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-t">
            <td class="p-3"><?php echo e($fb->tip->title); ?></td>
            <td class="p-3"><?php echo e($fb->rating); ?></td>
            <td class="p-3"><?php echo e($fb->comment ?? '-'); ?></td>
            <td class="p-3 text-sm"><?php echo e($fb->created_at->format('M d, Y')); ?></td>
            <td class="p-3">

                <form action="/admin/feedback/<?php echo e($fb->id); ?>" method="POST"
                      onsubmit="return confirm('Delete this feedback?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="px-3 py-1 bg-red-600 text-white rounded">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <div class="mt-4">
        <?php echo e($feedback->links()); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/admin/feedback/index.blade.php ENDPATH**/ ?>