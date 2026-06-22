<h1>Add Vehicle</h1>
<form method="POST" action="<?=\Config\App::url('/vehicles')?>">
    <input name="make" placeholder="Make">
    <input name="model" placeholder="Model">
    <input name="year" placeholder="Year">
    <input name="colour" placeholder="Colour">
    <input name="registration" placeholder="Registration">
    <button>Save</button>
</form>