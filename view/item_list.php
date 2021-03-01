<?php include '../view/header.php'; ?>
<main>
        
        <aside>
            <!-- Display a list of categories -->
            <h2>Categories</h2>
            <nav>
            <ul>
            <li><a href="?categoryID=NULL">All Categories</a></li>
            <?php foreach ($categories as $category) : ?>
                <li>
                <a href="?categoryID=<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?> 
                </a>
                </li>
            <?php endforeach; ?>
            </ul>
            </nav>
        </aside>

        <section>
            <!-- Display a table of items -->
            <table>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($items as $product) : ?>
                <tr>
                    <td><?php echo get_category_name($product['categoryID']); ?></td>
                    <td><?php echo $product['Title']; ?></td>
                    <td><?php echo $product['Description']; ?></td>
                    <td><form action="." method="post">
                        <input type="hidden" name="action" value="delete_item">
                        <input type="hidden" name="ItemNum" value="<?php echo $product['ItemNum']; ?>">
                        <input type="hidden" name="categoryID" value="<?php echo $product['categoryID']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>

        <section>
            <h2>Add New Item:</h2>
            <form action="." method="post">
            <input type="hidden" name="action" value="add_item">
            <table>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td><input type="text" id="categoryName" name="categoryName" required></td>
                    <td><input type="text" id="title" name="title" required></td>
                    <td><input type="text" id="description" name="description" required></td>
                </tr>                
            </table>
                <button>Submit</button>
            </form>
        </section> 
        <a href="?action=show_add_form">View/Add Categories</a>
    </main>
    <?php include '../view/footer.php'; ?>
