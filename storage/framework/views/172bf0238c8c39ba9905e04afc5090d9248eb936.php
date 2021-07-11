

<?php $__env->startSection('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <?php if(session('status')): ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <?php if(session('status')=='profile-information-updated'): ?>
                        Profile has been updated.
                    <?php endif; ?>
                    <?php if(session('status')=='password-updated'): ?>
                        Password has been updated.
                    <?php endif; ?>
                    <?php if(session('status')=='two-factor-authentication-disabled'): ?>
                        Two factor authentication disabled.
                    <?php endif; ?>
                    <?php if(session('status')=='two-factor-authentication-enabled'): ?>
                        Two factor authentication enabled.
                    <?php endif; ?>
                    <?php if(session('status')=='recovery-codes-generated'): ?>
                        Recovery codes generated.
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Page Heading -->
    <div class="row">
        <?php if(Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication())): ?>

        <div class="col-md-5 mb-5">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-key"></i> TWO-FACTOR AUTHENTICATION</h6>
                </div>

                <div class="card-body">

                    <?php if(! auth()->user()->two_factor_secret): ?>
                    
                    <form method="POST" action="<?php echo e(url('user/two-factor-authentication')); ?>">
                        <?php echo csrf_field(); ?>

                        <button type="submit" class="btn btn-primary text-uppercase">
                            Enable Two-Factor
                        </button>
                    </form>
                    <?php else: ?>
                    
                    <form method="POST" action="<?php echo e(url('user/two-factor-authentication')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger mb-3 text-uppercase">
                            Disable Two-Factor
                        </button>
                    </form>

                    <?php if(session('status') == 'two-factor-authentication-enabled'): ?>
                    
                    <p>
                        Otentikasi dua faktor sekarang diaktifkan. Pindai kode QR berikut menggunakan aplikasi pengautentikasi ponsel Anda.
                    </p>

                    <div class="mb-3">
                        <?php echo auth()->user()->twoFactorQrCodeSvg(); ?>

                    </div>
                    <?php endif; ?>

                    
                    <p>
                        Simpan recovery code ini  dengan aman. Ini dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat otentikasi dua faktor Anda hilang.
                    </p>

                    <div style="background: rgb(44, 44, 44);color:white" class="rounded p-3 mb-2">
                        <?php $__currentLoopData = json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div><?php echo e($code); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <form method="POST" action="<?php echo e(url('user/two-factor-recovery-codes')); ?>">
                        <?php echo csrf_field(); ?>

                        <button type="submit" class="btn btn-dark text-uppercase">
                            Regenerate Recovery Codes
                        </button>
                    </form>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <?php endif; ?>

        <div class="col-md-7">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> EDIT PROFILE</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('user-profile-information.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label class="text-uppercase">Nama</label>
                            <input type="text" class="form-control" name="name"
                                value="<?php echo e(old('name') ?? auth()->user()->name); ?>" required autofocus
                                autocomplete="name" />
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="<?php echo e(old('email') ?? auth()->user()->email); ?>" required autofocus />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary text-uppercase" type="submit">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow mt-3 mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-unlock"></i> UPDATE PASSWORD</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('user-password.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label class="text-uppercase">Current Password</label>
                            <input type="password" class="form-control" name="current_password" required
                                autocomplete="current-password" />
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">Password</label>
                            <input type="password" name="password" required autocomplete="new-password"
                                class="form-control" />
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required
                                autocomplete="new-password" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary text-uppercase" type="submit">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['title' => 'Profile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\backend-shop\resources\views/admin/profile/index.blade.php ENDPATH**/ ?>