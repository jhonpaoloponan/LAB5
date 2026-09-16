<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0"><i class="bi bi-speedometer2 me-2"></i>Inventory Dashboard</h1>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Add Product
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Total Products</h6>
                            <h2 class="mb-0 fw-bold text-primary"><?php echo e($totalProducts); ?></h2>
                        </div>
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-box-seam fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Low Stock</h6>
                            <h2 class="mb-0 fw-bold text-warning"><?php echo e($lowStockCount); ?></h2>
                        </div>
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                            <i class="bi bi-exclamation-triangle fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Out of Stock</h6>
                            <h2 class="mb-0 fw-bold text-danger"><?php echo e($outOfStockCount); ?></h2>
                        </div>
                        <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                            <i class="bi bi-x-circle fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted text-uppercase mb-1">Inventory Value</h6>
                            <h2 class="mb-0 fw-bold text-success">₱<?php echo e(number_format($totalInventoryValue, 2)); ?></h2>
                        </div>
                        <div class="stat-icon bg-success bg-opacity-10 text-success">
                            <i class="bi bi-currency-dollar fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Low Stock Alerts -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-warning bg-opacity-10 border-0">
                    <h5 class="mb-0 text-warning"><i class="bi bi-exclamation-triangle me-2"></i>Low Stock Alerts</h5>
                </div>
                <div class="card-body p-0">
                    <?php if($lowStockProducts->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Reorder</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $lowStockProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <strong><?php echo e($product->name); ?></strong><br>
                                                <small class="text-muted"><?php echo e($product->sku); ?></small>
                                            </td>
                                            <td>
                                                <span class="badge <?php echo e($product->isOutOfStock() ? 'bg-danger' : 'bg-warning text-dark'); ?>">
                                                    <?php echo e($product->quantity); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e($product->reorder_level); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-4 text-center text-muted">
                            <i class="bi bi-check-circle fs-1"></i>
                            <p class="mt-2 mb-0">All products are well stocked!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary bg-opacity-10 border-0">
                    <h5 class="mb-0 text-primary"><i class="bi bi-clock-history me-2"></i>Recently Added</h5>
                </div>
                <div class="card-body p-0">
                    <?php if($recentProducts->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <strong><?php echo e($product->name); ?></strong><br>
                                                <small class="text-muted"><?php echo e($product->sku); ?></small>
                                            </td>
                                            <td><span class="badge bg-secondary"><?php echo e($product->category); ?></span></td>
                                            <td>₱<?php echo e(number_format($product->unit_price, 2)); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-4 text-center text-muted">
                            <p class="mb-0">No products yet. <a href="<?php echo e(route('products.create')); ?>">Add your first product</a>.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Summary -->
    <?php if($categorySummary->count() > 0): ?>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success bg-opacity-10 border-0">
                    <h5 class="mb-0 text-success"><i class="bi bi-pie-chart me-2"></i>Inventory by Category</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <?php $__currentLoopData = $categorySummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-sm-6">
                                <div class="p-3 border rounded">
                                    <h6 class="mb-1"><?php echo e($cat->category); ?></h6>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted"><?php echo e($cat->count); ?> products</span>
                                        <strong class="text-success">₱<?php echo e(number_format($cat->value, 2)); ?></strong>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\inventory-system\resources\views/dashboard/index.blade.php ENDPATH**/ ?>