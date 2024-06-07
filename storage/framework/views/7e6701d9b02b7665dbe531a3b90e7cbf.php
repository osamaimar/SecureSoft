<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Merchant/partials/page-header',['title'=> 'Checkout ' ,'subtitle'=>'','subtitle2'=>'Filters'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Start::row-1 -->
<div class="row">
    <div class="col-xl-9">
        <div class="card custom-card">
            <div class="card-body p-0 product-checkout">
                <ul class="nav nav-tabs tab-style-2 d-sm-flex d-block border-bottom border-block-end-dashed" id="myTab1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-tab-pane" type="button" role="tab" aria-controls="order-tab" aria-selected="true"><i class="ri-bank-card-line me-2 align-middle"></i>Payment</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active border-0 p-0" id="order-tab-pane" role="tabpanel" aria-labelledby="order-tab-pane" tabindex="0">
                        <div class="p-4">
                            <p class="mb-1 fw-semibold text-muted op-5 fs-20">01</p>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card border shadow-none mb-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Payment Methods
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row gy-3">
                                                <p class="fs-15 fw-semibold mb-1">How to pay?</p>
                                                <div class="col-xl-6">
                                                    <div class="form-check payment-card-container mb-0 lh-1 payment-card" data-input-id="payment-card1">
                                                        <input id="payment-card1" name="payment-cards" type="radio" class="form-check-input" checked>
                                                        <div class="form-check-label">
                                                            <div class="d-flex  align-items-center  ">
                                                                <div class="me-2 lh-1">
                                                                    <span class="avatar avatar-md">
                                                                        <img width="48" src="<?php echo e(asset('storage/payment/mastercard.svg')); ?>" alt="">
                                                                    </span>
                                                                </div>
                                                                <div class="saved-card-details">
                                                                    <p class=" mb-0 fw-semibold">Pay with Credit Card</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-check payment-card-container mb-0 lh-1 payment-card" data-input-id="payment-card2">
                                                        <input id="payment-card2" name="payment-cards" type="radio" class="form-check-input">
                                                        <div class="form-check-label">
                                                            <div class="d-flex  align-items-center ">
                                                                <div class="me-2 lh-1">
                                                                    <span class="avatar avatar-md">
                                                                        <img style="width: 35px;" src="<?php echo e(asset('storage/payment/paypal.svg')); ?>" alt="">
                                                                    </span>
                                                                </div>
                                                                <div class="saved-card-details">
                                                                    <p class="mb-0 fw-semibold">Pay with credit card</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($errors->any()): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label for="product-name-add" class="form-label m-1 ms-5 me-2 fs-12 op-5 text-danger mb-0 d-block"><?php echo e($error); ?></label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-between">
                        <div></div>
                        <form method="POST" action="<?php echo e(route('merchant.checkout.success')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="cart" value="<?php echo e(Auth::guard()->user()->cart->id); ?>">
                            <button type="submit" class="btn btn-success-light m-1" id="continue-payment-trigger">Continue Payment<i class="bi bi-credit-card-2-front align-middle ms-2 d-inline-block"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title me-1">Order Summary</div><span class="badge bg-primary-transparent rounded-pill">02</span>
            </div>
            <div class="card-body p-0">
                <ul class="list-group mb-0 border-0 rounded-0">
                    <?php $__currentLoopData = $cart->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item border-top-0 border-start-0 border-end-0">
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="me-2">
                                <span class="avatar avatar-lg bg-light">
                                    <img src="<?php echo e(asset($product->default_image)); ?>" alt="">
                                </span>
                            </div>
                            <div class="flex-fill">
                                <p class="mb-0 fw-semibold"><?php echo e($product->name); ?></p>
                                <p class="mb-0 text-muted fs-12">Quantity : <?php echo e($product->pivot->quantity); ?> </p>
                            </div><br>

                        </div>
                    </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
                <div class="p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="fs-15">Total :</div>
                        <div class="fw-semibold fs-16 text-dark"> $<?php echo e($cart->total_amount); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const paymentCards = document.querySelectorAll('.payment-card');
        paymentCards.forEach(card => {
            card.addEventListener('click', function() {
                // Get the input id from the data attribute
                const inputId = this.getAttribute('data-input-id');
                document.getElementById(inputId).checked = true;
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Merchant/partials/master',['title'=>'Checkout'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/osamahamar/Desktop/Codes/SecureSoft Solutions/SecureSoft/resources/views/Merchant/checkout/index.blade.php ENDPATH**/ ?>