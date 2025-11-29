

<?php $__env->startSection('content'); ?>


<section class="bg-green-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold mb-4">
            SDG 7: Affordable & Clean Energy
        </h2>
        <p class="text-lg mb-6 max-w-2xl mx-auto">
            Learn how small daily actions can contribute to big energy savings.
            Explore practical clean energy tips that help protect our planet.
        </p>

        <a href="/tips"
            class="px-6 py-3 bg-white text-green-700 font-semibold rounded-lg shadow hover:bg-gray-100 transition">
            Explore Tips
        </a>
    </div>
</section>


<section class="py-14">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h3 class="text-2xl font-bold mb-4">Search for Clean Energy Tips</h3>

        <?php echo $__env->make('components.searchbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</section>


<section class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h3 class="text-2xl font-bold text-center mb-10">Why Clean Energy Matters</h3>

        <div class="grid md:grid-cols-3 gap-8">

            
            <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold mb-2">Reduce Emissions</h4>
                <p class="text-gray-700 text-sm">
                    Clean energy reduces greenhouse gases and helps fight climate change.
                </p>
            </div>

            
            <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold mb-2">Save Money</h4>
                <p class="text-gray-700 text-sm">
                    Energy-efficient habits reduce your electricity bill.
                </p>
            </div>

            
            <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold mb-2">Sustainable Future</h4>
                <p class="text-gray-700 text-sm">
                    Clean energy supports long-term sustainability for future generations.
                </p>
            </div>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Documents\College\LEC\Semester 5\Web Programming\Final Project\final_project\resources\views/home.blade.php ENDPATH**/ ?>