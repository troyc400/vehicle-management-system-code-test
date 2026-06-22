<h1>Vehicle Management Login</h1>
<?php if(isset($_SESSION['error'])): ?>
<p><?= $_SESSION['error']; ?></p>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form method="POST" action="<?= \Config\App::url('/login') ?>">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">
        Login
    </button>
</form>