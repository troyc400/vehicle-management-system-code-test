<div class="card">
    <div class="card-header">
        <h3 class="mb-0">
            Add Vehicle
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="<?=\Config\App::url('/vehicles')?>">
            <input type="hidden" name="csrf_token" value="<?=\Core\Csrf::token()?>">
            <div class="mb-3">
                <label class="form-label">Make</label>
                <input type="text" class="form-control" name="make" placeholder="Enter vehicle make" value="<?=htmlspecialchars($_SESSION['old']['make'] ?? '')?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Model</label>
                <input type="text" class="form-control" name="model" placeholder="Enter vehicle model" value="<?=htmlspecialchars($_SESSION['old']['model'] ?? '')?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="number" class="form-control" name="year" placeholder="Enter vehicle year" value="<?=htmlspecialchars($_SESSION['old']['year'] ?? '')?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Colour</label>
                <input type="text" class="form-control" name="colour" placeholder="Enter vehicle colour" value="<?=htmlspecialchars($_SESSION['old']['colour'] ?? '')?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Registration Number</label>
                <input type="text" class="form-control" name="registration" placeholder="Enter registration number" value="<?=htmlspecialchars($_SESSION['old']['registration'] ?? '')?>">
            </div>
            <button type="submit" class="btn btn-primary">Save Vehicle</button>
            <a href="<?=\Config\App::url('/vehicles')?>"class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
<?php unset($_SESSION['old']); ?>