

<?php $__env->startSection('content'); ?>

    <section class="bg-green-600 text-white py-10">
        <div class="max-w-4xl mx-auto px-6">
            <a href="/tips/<?php echo e($tip->id); ?>" class="text-sm underline hover:no-underline">
                ← Back to Tip
            </a>

            <h1 class="text-3xl font-extrabold mt-3">
                Rate This Tip
            </h1>
            <p class="text-green-100">
                "<?php echo e($tip->title); ?>"
            </p>
        </div>
    </section>

    <section class="max-w-4xl mx-auto px-6 py-10">
        <div class="bg-white rounded-xl shadow p-6 md:p-8">

            <form action="/feedback" method="POST">
                <?php echo csrf_field(); ?>

                
                <input type="hidden" name="tip_id" value="<?php echo e($tip->id); ?>">

                
                <label class="block font-semibold text-gray-800 mb-2">
                    Rate this tip
                </label>

                <div class="flex flex-row-reverse justify-center gap-1 mb-6">

                    <?php for($i = 5; $i >= 1; $i--): ?>
                        <input type="radio" id="star<?php echo e($i); ?>" name="rating" value="<?php echo e($i); ?>" class="hidden peer">
                        <label for="star<?php echo e($i); ?>"
                            class="text-3xl cursor-pointer text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-400">
                            ★
                        </label>
                    <?php endfor; ?>

                </div>

                
                <label class="block font-semibold text-gray-800 mb-2">
                    Additional Comments (optional)
                </label>

                <textarea name="comment"
                          rows="4"
                          class="w-full border rounded-lg p-3 shadow-sm focus:ring-green-500 focus:border-green-500"
                          placeholder="Tell us what you think about this tip..."></textarea>

                
                <button type="submit"
                        class="mt-6 px-6 py-3 bg-green-600 text-white rounded-lg shadow
                               hover:bg-green-700 transition">
                    Submit Feedback
                </button>

            </form>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/feedback/create.blade.php ENDPATH**/ ?>