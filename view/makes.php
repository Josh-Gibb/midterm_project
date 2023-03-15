<?php include('view/header.php');?>

<h2>Vehicle Make List</h2>
<section>
    <table>
        <tr>
            <th>Name</th>
        </tr>
        <?php foreach ($makes as $make): ?>
            <tr>
                <form action="." method="POST">
                    <input type="hidden" name="make_action" value="delete_make">
                    <input type="hidden" name="make_id" value="<?= $make['ID'] ?>">
                    <td>
                        <?= $make['Make'] ?>
                    </td>
                    <td><button class = "remove">Remove</button></td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
<h2>Add Vehicle Make</h2>
<form action="." method="POST">
    <input type="hidden" name="make_action" value="add_make">
    <label>Name:</label>
    <br>
    <input type="text" name="make" required>
    <button class = "submit">Add Make</button>
</form>
<br>
<a href=".?action=">View Full Vehicle List</a>
<p><a href=".?action=display_add_page">Click here</a> to add a vehicle</p>
<a href=".?action=display_types">View/Edit Vehicle Types</a>
<br>
<a href=".?action=display_classes">View/Edit Vehicle Classes</a>
<br>
<br>
<?php include('view/footer.php'); ?>