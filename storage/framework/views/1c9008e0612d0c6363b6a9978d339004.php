

<?php $__env->startSection('content'); ?>

    
    <section class="bg-green-600 text-white py-10">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold mb-2">
                Educational Resources
            </h1>
            <p class="text-sm md:text-base text-green-100">
                Learn more about clean and affordable energy through curated articles, videos, and tools.
            </p>
        </div>
    </section>

    
    <section class="max-w-6xl mx-auto px-6 py-10">

        <?php if($resources->count() === 0): ?>
            <p class="text-center text-gray-600 text-lg">
                No resources available yet.
            </p>
        <?php else: ?>

            <div class="grid md:grid-cols-2 gap-8">

                <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">

                        
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                     bg-green-100 text-green-700 mb-3">
                            <?php echo e(ucfirst($resource->type)); ?>

                        </span>

                        
                        <h2 class="text-xl font-bold text-gray-800 mb-2">
                            <?php echo e($resource->title); ?>

                        </h2>

                        
                        <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                            <?php echo e($resource->description); ?>

                        </p>

                        
                        <a href="<?php echo e($resource->url); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="mt-auto inline-flex items-center gap-2 text-sm font-semibold
                                  text-green-700 hover:text-green-800">
                            Open Resource
                            <span class="text-lg">↗</span>
                        </a>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        <?php endif; ?>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/resources/index.blade.php ENDPATH**/ ?>