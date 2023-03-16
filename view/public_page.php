<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Assessment</title>
    <link rel = "stylesheet" href = "view/css/main.css">
</head>
<header>
    <h1>Zippy Public Page</h1>
</header>
<body>
<section>
    <form action="." method="GET">
        <input type = "hidden" name = "action" value = "display_public_page">
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
