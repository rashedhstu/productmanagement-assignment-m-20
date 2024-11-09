<?php $__env->startSection('content'); ?>
<h1 class="text-center mb-4">All Products</h1>

<div class="d-flex justify-content-between mb-3">
    <form action="<?php echo e(url('/products')); ?>" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search by Product ID or Description">
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </form>
    <div>
        <span style="border: 1px solid;padding:10px">Sort by Name
            <a href="<?php echo e(url('/products?sort=name&sort_order=asc')); ?>" class="btn btn-sm btn-secondary me-2">Ascending </a>
            <a href="<?php echo e(url('/products?sort=name&sort_order=desc')); ?>" class="btn btn-sm btn-secondary me-2">Descending</a>
        </span>
        <span style="border: 1px solid;padding:10px"> Sort by Price
            <a href="<?php echo e(url('/products?sort=price&sort_order=asc')); ?>" class="btn btn-sm btn-secondary">Ascending</a>        
            <a href="<?php echo e(url('/products?sort=price&sort_order=desc')); ?>" class="btn  btn-sm btn-secondary">Descending</a>
        </span>
        
    </div>
</div>

<table class="table table-striped table-hover">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($product->id); ?></td>
            <td><?php echo e($product->product_id); ?></td>
            <td><?php echo e($product->name); ?></td>
            <td>$<?php echo e(number_format($product->price, 2)); ?></td>
            <td><?php echo e($product->stock); ?></td>
            <td><img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Product Image" width="50"></td>
            <td>
                <a href="<?php echo e(url('/products/' . $product->id)); ?>" class="btn btn-info btn-sm">View</a>
                <a href="<?php echo e(url('/products/' . $product->id . '/edit')); ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?php echo e(url('/products/' . $product->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="d-flex justify-content-center">
    <?php echo e($products->links('pagination::bootstrap-5')); ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\productmanagement\resources\views/products/index.blade.php ENDPATH**/ ?>