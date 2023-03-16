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
            </tr>
        <?php endforeach; ?>
    </table>
</section>
<br>
<?php include('view/footer.php'); ?>
