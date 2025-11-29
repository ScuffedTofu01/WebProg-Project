

<?php $__env->startSection('content'); ?>

    
    <section class="bg-green-600 text-white py-10">
        <div class="max-w-5xl mx-auto px-6">
            <a href="/tips" class="text-sm underline hover:no-underline">
                ← Back to Tips
            </a>

            <h1 class="text-3xl md:text-4xl font-extrabold mt-3">
                <?php echo e($tip->title); ?>

            </h1>
            <p class="mt-2 text-sm md:text-base text-green-100">
                Detailed view · Clean Energy Tip
            </p>
        </div>
    </section>

    
    <section class="max-w-5xl mx-auto px-6 py-10">

        <div class="bg-white rounded-2xl shadow p-6 md:p-8 space-y-6">

            
            <?php if($tip->image): ?>
                <img src="<?php echo e(asset('storage/' . $tip->image)); ?>"
                     alt="<?php echo e($tip->title); ?>"
                     class="w-full max-h-72 object-cover rounded-xl mb-4">
            <?php endif; ?>

            
            <div>
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Description</h2>
                <p class="text-gray-700 leading-relaxed">
                    <?php echo e($tip->description); ?>

                </p>
            </div>

            
            <?php if(!empty($tip->benefits)): ?>
                <div>
                    <h2 class="text-xl font-semibold mb-2 text-gray-800">Benefits</h2>

                    <?php
                        // If benefits are stored as plain text with line breaks
                        $benefitsLines = preg_split("/\\r\\n|\\r|\\n/", $tip->benefits);
                    ?>

                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <?php $__currentLoopData = $benefitsLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(trim($line) !== ''): ?>
                                <li><?php echo e($line); ?></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            
            <?php if(!empty($tip->energy_saving)): ?>
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 md:p-5">
                    <h2 class="text-lg font-semibold text-green-800 mb-1">
                        Estimated Energy Savings
                    </h2>
                    <p class="text-green-900 text-sm md:text-base">
                        <?php echo e($tip->energy_saving); ?>

                    </p>
                </div>
            <?php endif; ?>

            
            <div class="flex flex-col md:flex-row gap-3 md:gap-4 mt-4">

                
                <a href="/resources"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-lg
                          bg-green-600 text-white text-sm font-semibold hover:bg-green-700 shadow">
                    Learn More About Clean Energy
                </a>

                
                <a href="/feedback/<?php echo e($tip->id); ?>"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-lg
                          border border-green-600 text-green-700 text-sm font-semibold
                          hover:bg-green-50">
                    Rate This Tip
                </a>
            </div>

            
            <div class="mt-10 bg-gray-50 rounded-xl p-6 border">

                <h2 class="text-2xl font-bold mb-4">User Feedback</h2>

                
                <?php if($average): ?>
                    <div class="flex items-center gap-1 mb-6">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <span class="<?php echo e($i <= $average ? 'text-yellow-400' : 'text-gray-300'); ?>">
                                ★
                            </span>
                        <?php endfor; ?>
                        <span class="text-gray-700 text-lg font-semibold">
                            <?php echo e($average); ?>/5
                        </span>
                    </div>
                <?php endif; ?>

                
                <div class="flex justify-end mb-4">
                    <form>
                        <label class="text-gray-700 font-semibold mr-2">Sort by:</label>
                        <select name="sort" onchange="this.form.submit()" 
                                class="border rounded p-2 text-sm">
                            <option value="newest" <?php echo e(request('sort')=='newest'?'selected':''); ?>>Newest</option>
                            <option value="oldest" <?php echo e(request('sort')=='oldest'?'selected':''); ?>>Oldest</option>
                            <option value="highest" <?php echo e(request('sort')=='highest'?'selected':''); ?>>Highest Rating</option>
                            <option value="lowest" <?php echo e(request('sort')=='lowest'?'selected':''); ?>>Lowest Rating</option>
                        </select>
                    </form>
                </div>

                
                <?php if($feedback->count() > 0): ?>
                    <div class="space-y-4">

                        <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white p-4 rounded-xl shadow">

                                
                                <div class="flex items-center gap-1 mb-2">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <span class="<?php echo e($i <= $fb->rating ? 'text-yellow-400' : 'text-gray-300'); ?>">
                                            ★
                                        </span>
                                    <?php endfor; ?>
                                    <span class="text-sm text-gray-600">(<?php echo e($fb->rating); ?>)</span>
                                </div>

                                
                                <?php if($fb->comment): ?>
                                    <p class="text-gray-700"><?php echo e($fb->comment); ?></p>
                                <?php endif; ?>

                                <p class="text-xs text-gray-400 mt-2"><?php echo e($fb->created_at->diffForHumans()); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <div class="mt-6">
                            <?php echo e($feedback->links()); ?>

                        </div>

                    </div>
                <?php else: ?>
                    <p class="text-gray-600">No feedback yet. Be the first to rate this tip!</p>
                <?php endif; ?>

            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/tips/show.blade.php ENDPATH**/ ?>