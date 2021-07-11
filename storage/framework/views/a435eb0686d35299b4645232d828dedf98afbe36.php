

<?php $__env->startSection('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-shopping-cart"></i> ORDERS</h6>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('admin.order.index')); ?>" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="q"
                                    placeholder="cari berdasarkan no. invoice">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col">NO. INVOICE</th>
                                    <th scope="col">NAMA LENGKAP</th>
                                    <th scope="col">GRAND TOTAL</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        <?php echo e(++$no + ($invoices->currentPage()-1) * $invoices->perPage()); ?></th>
                                    <td><?php echo e($invoice->invoice); ?></td>
                                    <td><?php echo e($invoice->name); ?></td>
                                    <td class="text-center"><?php echo e($invoice->status); ?></td>
                                    <td><?php echo e(moneyFormat($invoice->grand_total)); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.order.show', $invoice->id)); ?>"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-list-ul"></i>
                                        </a>
                                    </td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <div class="alert alert-danger">
                                        Data Belum Tersedia!
                                    </div>

                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            <?php echo e($invoices->links("vendor.pagination.bootstrap-4")); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Orders'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\backend-shop\resources\views/admin/order/index.blade.php ENDPATH**/ ?>