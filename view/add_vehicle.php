<?php include('view/header.php'); ?>
<h2>Add Vehicle</h2>
<div class = "addPage">
    <form action "." method="POST">
        <input type="hidden" name="action" value="add_vehicle">
        <label>Make:</label>
        <br>
        <select class = "addTextFields" name="make_id">
            <?php foreach ($makes as $make): ?>
                <option value="<?= $make['ID'] ?>"><?= $make['Make'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Type:</label>
        <br>
        <select class = "addTextFields" name="type_id">
            <?php foreach ($types as $type): ?>
                <option value="<?= $type['ID'] ?>"><?= $type['Type'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Class:</label>
        <br>
        <select class = "addTextFields" name="class_id">
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['ID'] ?>"><?= $class['Class'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Year:</label>
        <br>
        <input class = "addTextFields" type="number" name="year" required>
        <br>
        <label>Model:</label>
        <br>
        <input class = "addTextFields" type="text" name="model" required>
        <br>
        <label>Price:</label>
        <br>
        <input class = "addTextFields" type="number" name="price" required>
        <br>
        <button class = "addButton">Add Vehicle</button>
    </form>
    <br>
    <a href=".?action=">View Full Vehicle List</a>
    <br>
    <a href=".?action=display_makes">View/Edit Vehicle Makes</a>
    <br>
    <a href=".?action=display_types">View/Edit Vehicle Types</a>
    <br>
    <a href=".?action=display_classes">View/Edit Vehicle Classes</a>
</div>
<br>
<?php include('view/footer.php'); ?>