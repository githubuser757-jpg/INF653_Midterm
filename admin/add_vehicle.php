<?php
include_once("header.php");
?>

<?php if (!empty($vehicles)) : ?>
    <section id="list" class="container">
        <header>
            <h1>Vehicles List</h1>
        </header>
        <table>
            <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <div class="list_row">
                        <div class="list_item">
                            <td class="bold"><?= htmlspecialchars($vehicle['year']) ?></td>
                            <td class="bold"><?= htmlspecialchars($vehicle['model']) ?></td>
                            <td class="bold">$<?= htmlspecialchars($vehicle['price']) ?></td>
                        </div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No Vehicles Exist Yet</p>
    <?php endif; ?>
    </section>

    <section class="input_area">
        <?php if (!empty($vehicles)) : ?>
            <h2>Add Vehicle</h2>
            <form action="." method="post" id="add__form" class="add_vehicle_form">
                <input type="hidden" name="action" value="add_vehicle">
                <div class="input_row">
                    <label>Year:</label>
                    <input type="text" name="vehicle_year" maxlength="4" placeholder="2025" autofocus required>
                </div>

                <div class="input_row">
                    <label>Model:</label>
                    <input type="text" name="vehicle_model" maxlength="30" required>
                </div>

                <div class="input_row">
                    <label>Price:</label>
                    <input type="number" name="vehicle_price" required>
                </div>

                <div class="input_row">
                    <label>Type:</label>
                    <select name="vehicle_type">
                        <?php foreach ($types as $type) : ?>
                            <option value="<?= htmlspecialchars($type['type_id']) ?>"><?= htmlspecialchars($type['type']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input_row">
                    <label>Make:</label>
                    <select name="vehicle_make">
                        <?php foreach ($makes as $make) : ?>
                            <option value="<?= htmlspecialchars($make['make_id']) ?>"><?= htmlspecialchars($make['make']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input_row">
                    <label>Class:</label>
                    <select name="vehicle_class">
                        <?php foreach ($classes as $class) : ?>
                            <option value="<?= htmlspecialchars($class['class_id']) ?>"><?= htmlspecialchars($class['class']) ?></option>
                        <?php endforeach; ?>
                </div>
                </select>
            </form>
    </section>
    <div class="submit_button_container">
        <button type="submit" class="submit_button">Add Vehicle</button>
    </div>
<?php endif; ?>
    <div class="hyperlinks">
        <p><a href=".?action=list_vehicles&admin=true">Home Page</a></p>
    </div>