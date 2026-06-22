<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Vehicles</h1>
    <a class="btn btn-primary" href="<?=\Config\App::url('/vehicles/create')?>">Add Vehicle</a>
</div>
<?php if(empty($vehicles)): ?>
<div class="alert alert-info">No vehicles found. Add your first vehicle.</div>
<?php else: ?>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Colour</th>
                <th>Registration</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vehicles as $vehicle): ?>
            <tr>
                <td><?=htmlspecialchars($vehicle['make'])?></td>
                <td><?=htmlspecialchars($vehicle['model'])?></td>
                <td><?=htmlspecialchars($vehicle['year'])?></td>
                <td><?=htmlspecialchars($vehicle['colour'])?></td>
                <td><?=htmlspecialchars($vehicle['registration_number'])?></td>
                <td><a class="btn btn-sm btn-warning" href="<?=\Config\App::url('/vehicles/edit?id='.$vehicle['id'])?>">Edit</a><?php if($_SESSION['role']=='admin'): ?>
                <form method="POST" action="<?=\Config\App::url('/vehicles/delete')?>"style="display:inline;">
                <input type="hidden" name="csrf_token" value="<?=\Core\Csrf::token()?>">
                <input type="hidden" name="id" value="<?=$vehicle['id']?>">
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this vehicle?')">Delete</button>
                </form>
                <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>