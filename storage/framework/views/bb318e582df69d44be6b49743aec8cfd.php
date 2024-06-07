<?php $__env->startSection('content'); ?>
<?php echo $__env->make("Merchant/partials/page-header", ["title"=> "Orders", "subtitle"=> 'Ecommerce', 'subtitle2'=>'Orders'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between d-flex ">
                <div class="">

                   
                        <a type="submit" href="<?php echo e(route('merchant.orders.goBack')); ?>" class="btn btn-primary-transparent rounded-0 ps-2"><i class="ri-arrow-left-s-line"></i>Back</a>
                </div>
                <div class="">
                    <div class="text-primary fs-16"><strong>User type</strong></div>
                    <div class="fs-15">Mercahnt</div>
                </div>
                <div class="">
                    <div class="text-primary fs-16"><strong>Date</strong></div>
                    <div class="fs-15"><?php echo e($order->created_at); ?></div>
                </div>
                <div class="me-5">
                    <div class="text-primary fs-16"><strong>Status</strong></div>
                    <div class="fs-15"><?php echo e($order->status); ?></div>
                </div>



            </div>
        </div>
        <div class="card custom-card">
            <div class="card-header justify-content-center d-flex border-0">
                <div>
                    <div class="text-primary fs-16"><i class="bi bi-basket2-fill fs-19 p-0 m-0"></i> Order Items</div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="font-weight: normal;">#</th>
                                <th scope="col" style="font-weight: normal;">Item Type</th>
                                <th scope="col" style="font-weight: normal;">Description</th>
                                <th scope="col" style="font-weight: normal;">U/Price</th>
                                <th scope="col" style="font-weight: normal;">Quantity</th>
                                <th scope="col" style="font-weight: normal;">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="invoice-list">
                                <td style="font-weight: bold;">
                                    <?php echo e($index+1); ?>

                                </td>
                                <td style="font-weight: bold;">
                                    product
                                </td>
                                <td style="font-weight: bold;">
                                    <?php echo e($product->name); ?>

                                </td>
                                <td style="font-weight: bold;">
                                    <?php echo e($product->min_partner_price); ?> $
                                </td>
                                <td style="font-weight: bold;">
                                    <?php echo e($product->pivot->quantity); ?>

                                </td>
                                <td class="text-danger" style="font-weight: bold;">
                                    <?php echo e($product->pivot->quantity * $product->min_partner_price); ?> $
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="border-0"></td>
                                <td class="border-0"></td>
                                <td class="border-0"></td>
                                <td class="border-0" style="font-weight: bold;">SUM:</td>
                                <td class="border-0" style="font-weight: bold;"><?php echo e($order->products()->sum('quantity')); ?></td>
                                <td class="border-0 text-danger" style="font-weight: bold;"><?php echo e($order->total_amount); ?> $</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-column flex-lg-row justify-content-center col-lg-12">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3 me-lg-3">
                    <div class="card custom-card">
                        <div class="card-header border-0">
                            <div class="text-primary fs-16">Serials & Licenses</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="font-weight: normal;">#</th>
                                            <th scope="col" style="font-weight: normal;">Serial ID</th>
                                            <th scope="col" style="font-weight: normal;">Serial Title</th>
                                            <th scope="col" style="font-weight: normal;">Redeem Expire Date</th>
                                            <th scope="col" style="font-weight: normal;">Activation</th>
                                            <th scope="col" style="font-weight: normal;">Licenses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $order->soldLicenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="invoice-list">
                                            <td style="font-weight: bold;">
                                                <?php echo e($index+1); ?>

                                            </td>
                                            <td style="font-weight: bold;">
                                                <?php echo e($license->id); ?>

                                            </td>
                                            <td style="font-weight: bold;">
                                                <?php echo e($license->product->name); ?>

                                            </td>
                                            <td style="font-weight: bold;">
                                                <?php echo e($license->product->duration_value); ?> <?php echo e($license->product->duration_time_unit); ?>

                                            </td>
                                            <td style="font-weight: bold;">
                                                <?php echo e($license->isActive() ? 'Active' : 'Inactive'); ?>

                                            </td>
                                            <td class="text-success" style="font-weight: bold;">
                                                <?php echo e($license->key); ?>

                                                <button class="btn btn-sm btn-success-transparent copy-license" data-license="<?php echo e($license->key); ?>">Copy</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3">
                    <div class="card custom-card">
                        <div class="card-header border-0">
                            <div class="text-primary fs-16">Payment Detail</div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <label class="form-label d-inline-block me-2 col-4 col-form-label">Amount</label>
                                <input type="text" class="form-control d-inline-block" value="<?php echo e($order->total_amount); ?> $" readonly>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <label class="form-label d-inline-block me-2 col-4 col-form-label">Grand-Total</label>
                                <input type="text" class="form-control d-inline-block" value="<?php echo e($order->total_amount); ?> $" readonly>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <label class="form-label d-inline-block me-2 col-4 col-form-label">Paid Amount</label>
                                <input type="text" class="form-control d-inline-block" value="<?php echo e($order->total_amount); ?> $" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.copy-license').click(function() {
            var button = $(this);
            var originalText = button.text();
            var licenseKey = button.data('license');
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(licenseKey).select();
            document.execCommand('copy');
            tempInput.remove();
            button.text('Copied!!');
            setTimeout(function() {
                button.text(originalText);
            }, 3000);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Merchant/partials/master',['title'=>'Orders'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Merchant/order/order-details.blade.php ENDPATH**/ ?>