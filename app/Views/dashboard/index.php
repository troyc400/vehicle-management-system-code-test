<h1>Vehicle Management System</h1>
<p>Welcome <?= htmlspecialchars($_SESSION['username']) ?></p>
<p>Role: <?= htmlspecialchars($_SESSION['role']) ?></p>
<a href="<?= \Config\App::url('/logout') ?>">Logout</a>ß