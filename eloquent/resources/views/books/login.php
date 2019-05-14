<?php if (isset($_SESSION['user'])) {

    echo '<p>Welcome  <b>,' . $_SESSION['user'] . '</b></p>';
    }
    if ($_SESSION['user'] =='Admin'):
?>
<div class="page-header">
    <h3>Books Admin Panel</h3>
</div>

<p> You are Logged as <b><?php echo $admin['email']; ?></b></p>
<table class="table-bordered">
    <tr class="text-center">
        <th>Image</th>
        <th>Name</th>
        <th>Author</th>
        <th>Price</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td>
                <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>">
                    <img src="<?= $book['poster'] ?>" alt="<?= $book['name'] ?>" class="media-object" width="50%">
                </a>
            </td>
            <td>
                <a href="<?= \core\router\generate('book_by_id',
                    ['id' => $book['id']]) ?>"><?= $book['name'] ?></a>
            </td>

            <td> <?= $book['author'] ?></td>

            <td> <span class="text-success" style="font-size: large"><?= sprintf("$ %01.2f",
                        $book['price']) ?></span></td>

            <td> <?= date_format(date_create($book['date']), 'd/m/Y') ?></td>

            <?php if (isset($book['title'])): ?>
                <td>
                    <?php foreach ((array)$book['title'] as $tag): ?>
                        <span class="label label-primary"><?= $tag ?></span>
                    <?php endforeach; ?>
                </td>
            <?php endif; ?>
            <td>
                <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>"
                   class="btn btn-primary">Edit</a>
            </td>
            <td>
                <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>"
                   class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<nav class="text-center">
    <ul class="pagination">
        <?php
        for ($page = 1; $page <= $number_of_pages; $page++) {
            echo ' <li><a href="index.php?page=' . $page . '">  ' . $page . '  </a> </li>';
        }
        ?>
    </ul>
</nav>
<?php endif;
unset ($_SESSION['user']);