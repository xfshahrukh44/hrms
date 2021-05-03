<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Plan')); ?>

<?php $__env->stopSection(); ?>
<?php
    $dir= asset(Storage::url('uploads/plan'));
?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Plan')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Plan')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Manage Plan')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Plan')): ?>
                                        <a href="#" data-url="<?php echo e(route('plans.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Create New Plan')); ?>" data-original-title="<?php echo e(__('Create Plan')); ?>">
                                            <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row plan-div">
                                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="plan-item">
                                                <h4 class="font-style"> <?php echo e($plan->name); ?></h4>
                                                <div class="img-wrap">
                                                    <?php if(!empty($plan->image)): ?>
                                                        <img class="plan-img" src="<?php echo e($dir.'/'.$plan->image); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <h3>
                                                    <?php echo e(isset(\Auth::user()->planPrice()['stripe_currency_symbol'])?\Auth::user()->planPrice()['stripe_currency_symbol'].$plan->price:''); ?>

                                                </h3>
                                                <p class="font-style"><?php echo e($plan->duration); ?></p>
                                                <div class="text-center">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Plan')): ?>
                                                        <a title="Edit Plan" href="#" class="view-btn" data-url="<?php echo e(route('plans.edit',$plan->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Plan')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="far fa-edit"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Buy Plan')): ?>
                                                        <?php if($plan->id != \Auth::user()->plan): ?>
                                                            <?php if($plan->price > 0): ?>
                                                                <a title="Buy Plan" class="view-btn" href="<?php echo e(route('stripe',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>"><i class="fa fa-cart-plus"></i></a>
                                                            <?php else: ?>
                                                                <a class="view-btn"><?php echo e(__('Free')); ?></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if(\Auth::user()->type=='company' && \Auth::user()->plan == $plan->id): ?>
                                                        <div class="text-center">
                                                            <a class="view-success-btn">
                                                                <?php echo e(__('Active')); ?>

                                                            </a>
                                                        </div>
                                                        <div class="col-md-12 text-left">
                                                            <p class="font-style"><?php echo e(__('Plan Expired : ')); ?> <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date):'Unlimited'); ?></p>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-12 text-left">
                                                    <p><?php echo e($plan->description); ?></p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <i class="fas fa-user-tie"></i>
                                                        <p><?php echo e($plan->max_users); ?> <?php echo e(__('Users')); ?></p>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-user-plus"></i>
                                                        <p><?php echo e($plan->max_employees); ?> <?php echo e(__('Employees')); ?></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cwy3ovb7nhy6/public_html/hrms.82solutions.com/resources/views/plan/index.blade.php ENDPATH**/ ?>