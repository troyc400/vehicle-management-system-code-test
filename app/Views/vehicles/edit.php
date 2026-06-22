<h1>Edit Vehicle</h1>
<form method="POST"action="<?=\Config\App::url('/vehicles/update')?>">
    <input type="hidden" name="id" value="<?=$vehicle['id']?>">
    <input name="make" value="<?=$vehicle['make']?>">
    <input name="model" value="<?=$vehicle['model']?>">
    <input name="year" value="<?=$vehicle['year']?>">
    <input name="colour" value="<?=$vehicle['colour']?>">
    <input name="registration" value="<?=$vehicle['registration_number']?>">
    <button>Update</button>
</form>