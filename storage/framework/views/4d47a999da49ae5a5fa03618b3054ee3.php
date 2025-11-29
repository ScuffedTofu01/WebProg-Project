

<?php $__env->startSection('content'); ?>

    
    <header class="bg-green-600 text-white text-center py-14">
        <h2 class="text-3xl font-extrabold mb-2">Clean Energy Tips</h2>
        <p class="text-lg">Browse practical and simple ways to save energy.</p>
    </header>

    
    <section class="max-w-3xl mx-auto px-6 mt-10">
        <?php echo $__env->make('components.searchbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </section>

    
    <section class="max-w-7xl mx-auto px-6 my-14">
        
        <?php if($tips->count() == 0): ?>

            
            <?php if(request('q')): ?>
                <p class="text-center text-gray-600 text-lg">
                    No tips found for "<span class="font-semibold"><?php echo e(request('q')); ?></span>".
                </p>
            <?php else: ?>
                <p class="text-center text-gray-600 text-lg">
                    No tips available yet.
                </p>
            <?php endif; ?>

        <?php else: ?>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php $__currentLoopData = $tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                        
                        <?php if($tip->image): ?>
                            <img src="<?php echo e(asset('storage/' . $tip->image)); ?>"
                                 class="w-full h-40 object-cover rounded-lg mb-4">
                        <?php endif; ?>

                        
                        <h3 class="text-xl font-bold mb-2 text-green-700">
                            <?php echo e($tip->title); ?>

                        </h3>

                        
                        <?php
                            $avg = $tip->averageRating() ?? 0;
                        ?>

                        <div class="flex items-center gap-1 mb-2">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <span class="<?php echo e($i <= $avg ? 'text-yellow-400' : 'text-gray-300'); ?>">
                                    ★
                                </span>
                            <?php endfor; ?>
                            <span class="text-sm text-gray-600">
                                (<?php echo e(number_format($avg, 1)); ?>)
                            </span>
                        </div>

                        
                        <p class="text-gray-700 text-sm mb-4">
                            <?php echo e(Str::limit($tip->description, 100)); ?>

                        </p>

                        
                        <a href="/tips/<?php echo e($tip->id); ?>"
                           class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700 shadow">
                            View Details
                        </a>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        <?php endif; ?>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/tips/index.blade.php ENDPATH**/ ?>