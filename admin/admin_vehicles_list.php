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
                            <td class="bold">
                                <form action="." method="post">
                                    <input type="hidden" name="action" value="delete_vehicle">
                                    <input type="hidden" name="vehicle_id" value="<?= $vehicle['vehicle_id'] ?>">
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this vehicle?')">X</button>
                                </form>
                            </td>
                        </div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No Vehicles Exist Yet</p>
    <?php endif; ?>
    </section>

    <section class="order_buttons">
        <form>
            <input type="hidden" name="action" value="order_vehicles_by_year">
            <input type="hidden" name="admin" value="true">
            <button type="submit">Order By Year</button>
        </form>
        <form>
            <input type="hidden" name="action" value="order_vehicles_by_price">
            <input type="hidden" name="admin" value="true">
            <button type="submit">Order By Price</button>
        </form>
    </section>

    <section class="input_area">
        <form method="post">
            <input type="hidden" name="action" value="filter_vehicles">
            <input type="hidden" name="admin" value="true">

            <div class="input_row">
                <label for="type_filter">Filter By Type: </label>
                <select name="type_filter" id="type_filter">
                    <option value="">-</option>
                    <option value="1">SUV</option>
                    <option value="2">Truck</option>
                    <option value="3">Sedan</option>
                    <option value="4">Coupe</option>
                </select>
            </div>

            <div class="input_row">
                <label for="class_filter">Filter By Class: </label>
                <select name="class_filter" id="class_filter">
                    <option value="">-</option>
                    <option value="1">Utility</option>
                    <option value="2">Economy</option>
                    <option value="3">Luxury</option>
                    <option value="4">Sports</option>
                </select>
            </div>

            <div class="input_row">
                <label for="make_filter">Filter By Make: </label>
                <select name="make_filter" id="make_filter">
                    <option value="">-</option>
                    <option value="1">Chevy</option>
                    <option value="2">Ford</option>
                    <option value="3">Cadillac</option>
                    <option value="4">Nissan</option>
                    <option value="5">Hyundai</option>
                    <option value="6">Dodge</option>
                    <option value="7">Infiniti</option>
                    <option value="8">Buick</option>
                </select>
            </div>


    </section>
    <div class="submit_button_container">
        <button type="submit" class="submit_button">Filter</button>
    </div>
    </form>

    <div class="hyperlinks">
        <p><a href=".?action=list_add_vehicles&admin=true">Add Vehicles</a></p>
        <p><a href=".?action=list_makes&admin=true">Makes List</a></p>
        <p><a href=".?action=list_types&admin=true">Types List</a></p>
        <p><a href=".?action=list_classes&admin=true">Classes List</a></p>
    </div>