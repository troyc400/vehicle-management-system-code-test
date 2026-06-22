<div class="card">
    <div class="card-body">
        <h2>Welcome <?=htmlspecialchars($_SESSION['username'])?></h2>
        <p>Role:<span class="badge bg-primary"><?=htmlspecialchars($_SESSION['role'])?></span></p>
        <a class="btn btn-primary" href="<?=\Config\App::url('/vehicles')?>">Manage Vehicles</a>
    </div>
</div>