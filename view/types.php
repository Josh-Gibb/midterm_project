<?php include('view/header.php'); ?>

<h2>Vehicle Type List</h2>
<table>
    <tr>
        <th>Name</th>
    </tr>
    <?php foreach ($types as $type): ?>
        <tr>
            <form action="." method="POST">
                <input type="hidden" name="type_action" value="delete_type">
                <input type="hidden" name="type_id" value="<?= $type['ID'] ?>">
                <td>
                    <?= $type['Type'] ?>
                </td>
                <td><button class = "remove">Remove</button></td>
            </form>
        </tr>
    <?php endforeach; ?>
</table>
<h2>Add Vehicle Type</h2>
<form action="." method="POST">
    <input type="hidden" name="type_action" value="add_type">
    <label>Name:</label>
    <br>
    <input type="text" name="type" placeholder="Enter a type" required>
    <button class = "submit">Add Type</button>
</form>
<br>
<a href=".?action=">View Full Vehicle List</a>
<p><a href=".?action=display_add_page">Click here</a> to add a vehicle</p>
<a href=".?action=display_makes">View/Edit Vehicle Makes</a>
<br>
<a href=".?action=display_classes">View/Edit Vehicle Classes</a>
<br>
<br>
<?php include('view/footer.php'); ?>