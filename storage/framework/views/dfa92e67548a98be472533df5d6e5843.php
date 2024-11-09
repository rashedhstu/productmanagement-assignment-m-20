<?php $__env->startSection('content'); ?>
<h1 class="text-center mb-4">Edit Product</h1>

<form action="<?php echo e(url('/products/' . $product->id)); ?>" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-3">
        <label for="product_id" class="form-label">Product ID</label>
        <input type="text" name="product_id" class="form-control" value="<?php echo e($product->product_id); ?>" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo e($product->name); ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control"><?php echo e($product->description); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" step="0.01" value="<?php echo e($product->price); ?>" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control" value="<?php echo e($product->stock); ?>">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Product Image</label>
        <input type="file" name="image" class="form-control">
        <small>Current Image:</small><br>
        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Current Image" width="100">
    </div>
    <button type="submit" class="btn btn-primary w-100">Update Product</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\productmanagement\resources\views/products/edit.blade.php ENDPATH**/ ?>