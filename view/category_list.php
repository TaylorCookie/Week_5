<?php include '../view/header.php'; ?>

<section>
    <!-- Display a table of items -->
    <h2>Categories</h2>
    <table>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $product) : ?>
        <tr>
            <td><?php echo $product['categoryID']; ?></td>
            <td><?php echo $product['categoryName']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action" value="delete_category">
                <input type="hidden" name="id" value="<?php echo $product['categoryID']; ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>

<section>
    <h2>Add New Category:</h2>
    <form action="." method="post">
    <input type="hidden" name="action" value="add_category">
    <table>
        <tr>
            <th>Category Name</th>
        </tr>
        <tr>
            <td><input type="text" id="categoryName" name="categoryName" required></td>
        </tr>                
    </table>
        <button>Submit</button>
    </form>
</section> 

<section>
<a href="index.php?action=list_items">View Items</a>
</section>
</main>
<?php include '../view/footer.php'; ?>