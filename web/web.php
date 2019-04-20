<?php
$books [] = include 'inc/books.php';
$count    = count($books);
if ( ! isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];


}
$results_per_page = 2;
$offset           = ($page - 1) * $results_per_page;
$pages            = array_slice($books, $offset, $results_per_page);

$number_of_pages = floor($count / $results_per_page);

if (isset($_GET['price_order'])) {

    $priceOrder = $_GET['price_order'];

    setcookie('tag_filter', $priceOrder, time() + (30));

} else {

    $priceOrder = 'price_asc';

    setcookie('tag_filter', 'no', time() + (30));

}

echo 'COOKIE set to:' . $_COOKIE['tag_filter'];

if (isset($priceOrder) || isset($_COOKIE['tag_filter'])) {

    if ($priceOrder == 'price_asc' || $_COOKIE['tag_filter'] == 'price_asc') {

        sort($pages);

    } elseif ($priceOrder == 'price_desc' || $_COOKIE['tag_filter'] == 'price_desc') {

        rsort($pages);
    }

} else {

}

?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <input type="text" name="search">
    <select name="tagSort" id="">
        <option value="">choose</option>
        <option value="php">Php</option>
        <option value="wordpress">Wordpress</option>
        <option value="laravel">Laravel</option>
        <option value="mysql">MySQL</option>
        <option value="jquery">Jquery</option>
    </select>
    <input type="submit" name="sub" value="Знайти">
</form>


<table>
    <thead>
    <tr>
        <th>ISBN</th>
        <th>NAME</th>
        <th>POSTER</th>
        <th>URL</th>
        <th>
            <a href="<?php echo 'index4.php?price_order=price_asc' ?>">+</a>
            <a href="<?php echo 'index4.php?price_order=price_desc' ?>">-</a>
        </th>
        <th>TAGS</th>
    </tr>
    </thead>
    <tbody>

    <?php

    foreach ($pages as $book) :
        ?>
        <tr>
            <td><?php echo $book['ISBN'] ?></td>
            <td><?php echo $book['name'] ?></td>
            <td><img src="<?php echo $book['poster'] ?>" alt="" width="68px"></td>
            <td><?php echo $book['url'] ?></td>
            <td><?php echo $book['price'] ?></td>
            <td><?php echo (isset($book['tags'])) ? $book['tags'][0] : '' ?></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
<?php





$search = null;
if (isset($_POST['search']) || ! empty($_POST['search'])) {

    $search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);

    ($_POST['tagSort']) ? $posTags = $_POST['tagSort'] : false;

    echo '<p>';
    echo '<b>Result:</b>';

    array_filter($books, function ($book) {
        global $search;
        global $posTags;

        if (in_array($search, $book['tags']) || in_array($posTags, $book['tags'])):
            echo '<div>';
            echo '<p><h5>' . $book['name'] . '<h5></p>';
            echo '<img src="' . $book['poster'] . '"  width="68px">';
            echo '</div>';
        else:exit;
        endif;
    });

} else {
    false;
};
echo '</p>';

for (
    $page = 1;
    $page <= $number_of_pages;
    $page++
) {
    echo '<a href="index4.php?page=' . $page . '">' . $page . '</a>';
}

?>


