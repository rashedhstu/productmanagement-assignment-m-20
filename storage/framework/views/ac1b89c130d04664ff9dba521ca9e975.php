<?php $__env->startSection('content'); ?>
<h1 class="text-center mb-4">Product Details</h1>

<div class="card p-4 shadow-sm">

    <p><strong>Product ID:</strong> <?php echo e($product->product_id); ?></p>
    <p><strong>Name:</strong> <?php echo e($product->name); ?></p>
    <p><strong>Description:</strong> <?php echo e($product->description); ?></p>
    <p><strong>Price:</strong> $<?php echo e($product->price); ?></p>
    <p><strong>Stock:</strong> <?php echo e($product->stock); ?></p>
    <p><strong>Image:</strong></p>
    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" width="150" />

    <a href="<?php echo e(route('products.index')); ?>">Back to List</a>
</div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\productmanagement\resources\views/products/show.blade.php ENDPATH**/ ?>