<?php $__env->startSection('content'); ?>
<?php echo $__env->make("Merchant/partials/page-header", ["title"=> "Invoices", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Invoices'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Manage Invoices
                </div>
                <div class="d-flex">
                    <div class="dropdown m-1">
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                            Status<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <form method="get" action="<?php echo e(route('merchant.invoices.unpaid')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn dropdown-item">Unpaid</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="<?php echo e(route('merchant.invoices.pending')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn dropdown-item">Pending</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="<?php echo e(route('merchant.invoices.paid')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn dropdown-item">Paid</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="<?php echo e(route('merchant.invoices.completed')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn dropdown-item">Completed</button>
                                </form>
                            </li>
                            <li>
                                <form method="get" action="<?php echo e(route('merchant.invoices.overdue')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn dropdown-item">Overdue</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Business</th>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Date</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="invoice-list">
                                <td>
                                    <?php echo e($orders->firstItem() + $index); ?>

                                </td>
                                <td>
                                    <p class="text-muted">
                                        <?php echo e($order->merchant->first_name); ?> <?php echo e($order->merchant->last_name); ?>

                                    </p>
                                </td>
                                <td>
                                    <p class="text-muted">
                                        <?php echo e($order->merchant->company_name); ?>

                                    </p>
                                </td>
                                <td>
                                    <p class="fw-semibold text-primary">
                                        <?php echo e($order->invoice->invoice_number); ?>

                                    </p>
                                </td>
                                <td>
                                    <?php echo e($order->created_at->format('Y-m-d')); ?>

                                </td>
                                <td>
                                    <?php echo e($order->discount); ?>

                                </td>
                                <td>
                                    $<?php echo e($order->total_amount); ?>

                                </td>
                                <td>
                                    <?php if($order->status == 'Pending'): ?>
                                    <span class="badge bg-warning-transparent">Pending</span>
                                    <?php elseif($order->status == 'Paid'): ?>
                                    <span class="badge bg-primary-transparent">Paid</span>
                                    <?php elseif($order->status == 'Completed'): ?>
                                    <span class="badge bg-success-transparent">Completed</span>
                                    <?php elseif($order->status == 'Overdue'): ?>
                                    <span class="badge bg-danger-transparent">Overdue</span>
                                    <?php elseif($order->status == 'Unpaid'): ?>
                                    <span class="badge bg-info-transparent">Unpaid</span>
                                    <?php endif; ?>

                                </td>
                                <td class='hstack gap-2 fs-15'>
                                    <form method="GET" action="<?php echo e(route('merchant.invoices.pdf',$order->invoice)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-sm btn-success btn-wave waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF Invoice">Download</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php if($orders->isEmpty()): ?>
                        <div class="text-center mt-5" style="height: 30vh; align-items: center;">
                            <h1>Empty!</h1>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <!-- Custom Pagination -->

                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0 float-end">
                        
                        <?php if($orders->onFirstPage()): ?>
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($orders->previousPageUrl()); ?>">Previous</a></li>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = $orders->getUrlRange(1, $orders->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $orders->currentPage()): ?>
                        <li class="page-item active"><span class="page-link"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($orders->hasMorePages()): ?>
                        <li class="page-item"><a class="page-link" href="<?php echo e($orders->nextPageUrl()); ?>">Next</a></li>
                        <?php else: ?>
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Merchant/partials/master',['title'=>'Invoices'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Merchant/invoice/invoices-list.blade.php ENDPATH**/ ?>