<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory HQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: #f0f2f5;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 15px;
        }
        .login-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .brand-title {
            font-weight: 700;
            color: #1e3a5f;
            letter-spacing: -0.5px;
        }
        .btn-login {
            background-color: #1e3a5f;
            border-color: #1e3a5f;
            font-weight: 600;
            padding: 12px;
        }
        .btn-login:hover {
            background-color: #152c4a;
            border-color: #152c4a;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Brand -->
        <div class="text-center mb-4">
            <h1 class="brand-title mb-1">
                <i class="bi bi-box-seam me-2"></i>Inventory HQ
            </h1>
            <p class="text-muted mb-0">Real-time Inventory Management</p>
        </div>

        <!-- Login Card -->
        <div class="card login-card">
            <div class="card-body p-4 p-md-5">
                <?php if(session('status')): ?>
                    <div class="alert alert-success mb-4">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" 
                               class="form-control form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               id="email" 
                               name="email" 
                               value="<?php echo e(old('email')); ?>" 
                               required 
                               autofocus>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" 
                               class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               id="password" 
                               name="password" 
                               required>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-login btn-lg">
                            LOG IN
                        </button>
                    </div>

                    <div class="text-center">
                        <?php if(Route::has('password.request')): ?>
                            <a href="<?php echo e(route('password.request')); ?>" class="text-decoration-none text-muted small">
                                Forgot your password?
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-4 small">
            &copy; <?php echo e(date('Y')); ?> Inventory HQ — Lab 5
        </p>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\inventory-system\resources\views/auth/login.blade.php ENDPATH**/ ?>