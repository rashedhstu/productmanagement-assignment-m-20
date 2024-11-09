<?php $__env->startSection('content'); ?>
<h1 class="text-center mb-4">Create New Product</h1>

<form action="<?php echo e(url('/products')); ?>" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    <?php echo csrf_field(); ?>
    <div class="mb-2">
        <label for="product_id" class="form-label">Product ID</label>
        <input type="text" name="product_id" class="form-control" required>
    </div>
    <div class="mb-2">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-2">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-2">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="mb-2">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control">
    </div>
    <div class="mb-2">
        <label for="image" class="form-label">Product Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary w-100">Create Product</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\productmanagement\resources\views/products/create.blade.php ENDPATH**/ ?>