<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h3 class="mb-0">Vehicle Management System</h3>
                <small class="text-muted">Login</small>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($_SESSION['error']) ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form method="POST" action="<?= \Config\App::url('/login') ?>">
                    <input type="hidden" name="csrf_token" value="<?=\Core\Csrf::token()?>">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>