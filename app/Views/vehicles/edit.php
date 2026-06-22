<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Edit Vehicle</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="<?=\Config\App::url('/vehicles/update')?>">
            <input type="hidden" name="csrf_token" value="<?=\Core\Csrf::token()?>">
            <input type="hidden" name="id" value="<?=$vehicle['id']?>">
            <div class="mb-3">
                <label class="form-label">Make</label>
                <input type="text" class="form-control" name="make" value="<?=htmlspecialchars($_SESSION['old']['make'] ?? $vehicle['make'])?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Model</label>
                <input type="text" class="form-control" name="model" value="<?=htmlspecialchars($_SESSION['old']['model'] ?? $vehicle['model'])?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Year</label> 
                <input type="number" class="form-control" name="year" value="<?=htmlspecialchars($_SESSION['old']['year'] ?? $vehicle['year'])?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Colour</label>
                <input type="text" class="form-control" name="colour" value="<?=htmlspecialchars($_SESSION['old']['colour'] ?? $vehicle['colour'])?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Registration Number</label>
                <input type="text" class="form-control" name="registration" value="<?=htmlspecialchars($_SESSION['old']['registration'] ?? $vehicle['registration_number'])?>">
            </div>
            <button type="submit" class="btn btn-success">Update Vehicle</button>
            <a href="<?=\Config\App::url('/vehicles')?>"class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
<?php unset($_SESSION['old']); ?>