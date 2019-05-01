<div class="page-header">
    <h3>Books</h3>
</div>
<form action="<?= \core\router\generate('sort_books') ?>" method="get">
    <select name="tagSort">
        <option value="">choose</option>
        <option value="php">Php</option>
        <option value="javascript">Javascript</option>
        <option value="mysql">MySQL</option>
        <option value="jquery">Jquery</option>
    </select>
    <input type="submit" name="Sort" value="SortByTags">
</form>
<?php foreach ($books as $book): ?>

    <div class="media">
        <div class="media-left">
            <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>">
                <img src="<?= $book['poster'] ?>" alt="<?= $book['name'] ?>" class="media-object">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">
                <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>"><?= $book['name'] ?></a>
            </h4>

            <p><b>Author</b>: <?= $book['author'] ?></p>

            <p><b>Price</b>: <span class="text-success" style="font-size: large"><?= sprintf("$ %01.2f",
                        $book['price']) ?></span></p>

            <p><b>Date</b>: <?= date_format(date_create($book['date']), 'd/m/Y') ?></p>

            <?php if (isset($book['title'])): ?>
                <p>
                    <b>Tags</b>:
                    <?php foreach ((array)$book['title'] as $tag): ?>
                        <span class="label label-primary"><?= $tag ?></span>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>

            <a href="<?= \core\router\generate('book_by_id', ['id' => $book['id']]) ?>"
               class="btn btn-primary">Details</a>
        </div>
    </div>
<?php  endforeach;  ?>

<nav class="text-center">
        <ul class="pagination">
    <?php
    for ($page = 1; $page <= $number_of_pages; $page++)
    {
        echo ' <li><a href="index.php?page=' . $page . '">  ' . $page . '  </a> </li>';
    }
    ?>
    </ul>
</nav>