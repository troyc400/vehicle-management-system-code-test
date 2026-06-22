<h1>Vehicles</h1>
<a href="<?=\Config\App::url('/vehicles/create')?>">Add Vehicle</a>

<table>
    <tr>
        <th>Make</th>
        <th>Model</th>
        <th>Year</th>
        <th>Action</th>
    </tr>
    <?php foreach($vehicles as $vehicle): ?>
    <tr>
        <td><?=htmlspecialchars($vehicle['make'])?></td>
        <td><?=htmlspecialchars($vehicle['model'])?></td>
        <td><?=$vehicle['year']?></td>
        <td><a href="<?=\Config\App::url('/vehicles/edit?id='.$vehicle['id'])?>">Edit</a>
        <?php if($_SESSION['role']=='admin'): ?>
        <form method="POST" action="<?=\Config\App::url('/vehicles/delete')?>" style="display:inline;">
            <input type="hidden" name="id" value="<?=$vehicle['id']?>">
            <button onclick="return confirm('Delete this vehicle?')">Delete</button>
        </form>
        <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>