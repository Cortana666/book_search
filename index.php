<?php require_once "source.php"; ?>

<?php
    $key_word = $_GET['keyword'] ?? '';
    if ($key_word) {
        $book = array();
        foreach ($source as $key => $value) {
            if ($value['search_encoding'] != 'UTF-8') {
                $encode = mb_detect_encoding($key_word, array("ASCII", "GB2312", "GBK", 'BIG5'));
                $key_word = mb_convert_encoding($key_word, $value['search_encoding'], $encode);
            }
            $url = str_replace('{{$keyword}}', urlencode($key_word), $value['search_url']);
            $html = getHtml($url, $value);
            if ($value['search_encoding'] != 'UTF-8') {
                $key_word = mb_convert_encoding($key_word, 'UTF-8', $encode);
            }
            $book = getSearch($book, $html, $value);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>搜索</title>
</head>
<body>
    <div>
        <form action="index.php" method="get">
            <input type="text" name="keyword" value="<?php echo $key_word; ?>">
            <br>
            <input type="submit" value="搜索">
            <a href="gocatalog.php">已有目录网址？</a>
            <a href="goarticle.php">已有章节网址？</a>
        </form>
    </div>
    <?php if ($key_word) { ?>
        <?php if ($book) { ?>
    <div>
        <ul>
            <?php foreach ($book as $key => $value) { ?>
                <li><a href="catalog.php?url=<?php echo $value['url']; ?>&source_key=<?php echo $value['source_key']; ?>">[<?php echo $value['source_key']; ?>]<?php echo '《'.$value['title'].'》-'.$value['author']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
        <?php } else { ?>
    <div>
        <p>暂无结果</p>
    </div>
        <?php } ?>
    <?php } ?>
</body>
</html>
