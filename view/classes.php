<?php include('view/header.php'); ?>

<h2>Vehicle Classes</h2>
<table>
    <tr>
        <th>Name</th>
    </tr>
    <?php foreach ($classes as $class): ?>
        <tr>
            <form action="." method="POST">
                <input type="hidden" name="class_action" value="delete_class">
                <input type="hidden" name="class_id" value="<?= $class['ID'] ?>">
                <td>
                    <?= $class['Class'] ?>
                </td>
                <td><button class = "remove">Remove</button></td>
            </form>
        </tr>
    <?php endforeach; ?>
</table>
<h2>Add Vehicle Class</h2>
<form action="." method="POST">
    <input type="hidden" name="class_action" value="add_class">
    <label>Class:</label>
    <br>
    <input type="text" name="class" placeholder = "Enter a class" required>
    <button class = "submit">Add Class</button>
</form>
<br>
<a href=".?action=">View Full Vehicle List</a>
<p><a href=".?action=display_add_page">Click here</a> to add a vehicle</p>
<a href=".?action=display_types">View/Edit Vehicle Types</a>
<br>
<a href=".?action=display_makes">View/Edit Vehicle Makes</a>
<br>
<br>
<?php include('view/footer.php'); ?>
