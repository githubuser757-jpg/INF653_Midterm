<?php
include("header.php");
?>

<?php if (!empty($types)) : ?>
    <section id="list" class="container">
        <header>
            <h1>Types List</h1>
        </header>
        <table>
            <?php foreach ($types as $type) : ?>
                <tr>
                    <div class="list_row">
                        <div class="list_item">
                            <td class="bold"><?= htmlspecialchars($type['type']) ?></td>
                            <td class="bold"><?= htmlspecialchars($type['type_id']) ?></td>
                            <td class="bold">
                                <form action="." method="post">
                                    <input type="hidden" name="action" value="delete_type">
                                    <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this type?')">X</button>
                                </form>
                            </td>
                        </div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <section class="input_area">
        <h2>Add Type</h2>
        <form action="." method="post">
            <input type="hidden" name=action value="add_type">
            <input type="text" name="type_name" maxlength="20" required>
            <button tye="submit">Add Type</button>
        </form>
    </section>

<?php else : ?>
    <p>No Types Exist Yet</p>
<?php endif; ?>

<div class="hyperlinks">
    <p><a href=".?action=list_vehicles&admin=true">Home Page</a></p>
</div>