<!DOCTYPE html>
<html>
    <head>
        <title>Vehicle Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?=\Config\App::url('/dashboard')?>">Vehicle Management</a>
                <div>
                    <span class="text-white me-3">
                        <?=htmlspecialchars($_SESSION['username'] ?? '')?>
                    </span>
                    <a class="btn btn-outline-danger btn-sm" href="<?=\Config\App::url('/logout')?>">Logout</a>
                </div>
            </div>
        </nav>
        <div class="container mt-4">
            <?php if($message = \Core\Session::getFlash('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert"><?= htmlspecialchars($message) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
            <?php if($message = \Core\Session::getFlash('error')): ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert"><?= htmlspecialchars($message) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
            <?= $content ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>