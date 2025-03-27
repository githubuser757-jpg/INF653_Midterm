<?php
include("header.php");
?>

<?php if (!empty($classes)) : ?>
    <section id="list" class="container">
        <header>
            <h1>Classes List</h1>
        </header>
        <table>
            <?php foreach ($classes as $class) : ?>
                <tr>
                    <div class="list_row">
                        <div class="list_item">
                            <td class="bold"><?= htmlspecialchars($class['class']) ?></td>
                            <td class="bold"><?= htmlspecialchars($class['class_id']) ?></td>
                            <td class="bold">
                                <form action="." method="post">
                                    <input type="hidden" name="action" value="delete_class">
                                    <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this class?')">X</button>
                                </form>
                            </td>
                        </div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <section class="input_area">
        <h2>Add Class</h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="add_class">
            <input type="text" name="class_name" maxlength="20" required>
            <button tye="submit">Add Class</button>
        </form>
    </section>

<?php else : ?>
    <p>No Classes Exist Yet</p>
<?php endif; ?>
<div class="hyperlinks">
    <p><a href=".?action=list_vehicles&admin=true">Home Page</a></p>
</div>