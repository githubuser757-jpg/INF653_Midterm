<?php
include("header.php");
?>

<?php if (!empty($makes)) : ?>
    <section id="list" class="container">
        <header>
            <h1>Makes List</h1>
        </header>
            <table>
                <?php foreach ($makes as $make) : ?>
                    <tr>
                        <div class="list_row">
                            <div class="list_item">
                                <td class="bold"><?= htmlspecialchars($make['make']) ?></td>
                                <td class="bold"><?= htmlspecialchars($make['make_id']) ?></td>
                                <td class="bold">
                                    <form action="." method="post">
                                        <input type="hidden" name="action" value="delete_make">
                                        <input type="hidden" name="make_id" value="<?= $make['make_id'] ?>">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this make?')">X</button>
                                    </form>
                                </td>
                            </div>
                        </div>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <section class="input_area">
            <h2>Add Make</h2>
            <form action="." method="post">
                <input type="hidden" name=action value="add_make">
                <input type="text" name="make_name" maxlength="20" required>
                <button tye="submit">Add Make</button>
            </form>
        </section>

    <?php else : ?>
        <p>No Makes Exist Yet</p>
    <?php endif; ?>
    </section>
    <div class="hyperlinks">
        <p><a href=".?action=list_vehicles&admin=true">Home Page</a></p>
    </div>