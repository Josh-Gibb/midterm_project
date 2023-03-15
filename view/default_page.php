<?php include('view/header.php'); ?>
<section>
    <form action="." method="GET">
        <select name="make_id" class="filter" required>
            <option value="0">View All Makes</option>
            <?php foreach ($makes as $make): ?>
                <?php if ($make_id == $make['ID']) { ?>
                    <option value="<?= $make['ID'] ?>" selected>
                    <?php } else { ?>
                    <option value="<?= $make['ID'] ?>">
                    <?php } ?>
                    <?= $make['Make'] ?>
                <?php endforeach; ?>
        </select>
        <br>
        <select name="type_id" class="filter" required>
            <option value="0">View All Types</option>
            <?php foreach ($types as $type): ?>
                <?php if ($type_id == $type['ID']) { ?>
                    <option value="<?= $type['ID'] ?>" selected>
                    <?php } else { ?>
                    <option value="<?= $type['ID'] ?>">
                    <?php } ?>
                    <?= $type['Type'] ?>
                <?php endforeach; ?>
        </select>
        <br>
        <select name="class_id" class="filter" required>
            <option value="0">View All Classes</option>
            <?php foreach ($classes as $class): ?>
                <?php if ($class_id == $class['ID']) { ?>
                    <option value="<?= $class['ID'] ?>" selected>
                    <?php } else { ?>
                    <option value="<?= $class['ID'] ?>">
                    <?php } ?>
                    <?= $class['Class'] ?>
                <?php endforeach; ?>
        </select>
        <div class="sort">
            <label>Sort By</label>
            <input type="radio" id="price" name="order" value="Price">
            <label for="price">Price</label>
            <input type="radio" id="year" name="order" value="Year">
            <label for="year">Year</label>
            <button class = "submit">Submit</button>
        </div>
    </form>
</section>
<section>
    <table>
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
        </tr>
        <?php foreach ($vehicles as $vehicle): ?>
            <tr>
                <form action='.' method="POST">
                    <input type="hidden" name="action" value="delete_vehicle">
                    <input type="hidden" name="vehicle_id" value="<?= $vehicle['ID'] ?>">
                    <td>
                        <?php echo $vehicle['Year'] ?>
                    </td>
                    <td>
                        <?php echo $vehicle['Make'] ?>
                    </td>
                    <td>
                        <?php echo $vehicle['Model'] ?>
                    </td>
                    <td>
                        <?php echo $vehicle['Type'] ?>
                    </td>
                    <td>
                        <?php echo $vehicle['Class'] ?>
                    </td>
                    <td>
                        <label>$</label>
                        <?php echo $vehicle['Price'] ?>
                    </td>
                    <td><button class = "remove">Remove</button></td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <p><a href=".?action=display_add_page">Click here</a> to add a vehicle</p>
    <a href=".?action=display_makes">View/Edit Vehicle Makes</a>
    <br>
    <a href=".?action=display_types">View/Edit Vehicle Types</a>
    <br>
    <a href=".?action=display_classes">View/Edit Vehicle Classes</a>
</section>
<br>
<?php include('view/footer.php'); ?>