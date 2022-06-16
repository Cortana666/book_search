<?php require_once "source.php"; ?>

<?php
    $url = $_GET['url'] ?? '';
    $source_key = $_GET['source_key'] ?? '';
    if ($url) {
        $article = array();
        $html = getHtml(base64_decode($url), $source[$source_key]);
        $article = getArticle($article, $html, $source[$source_key]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章</title>
</head>
<body>
    <?php if ($url) { ?>
        <?php if ($article) { ?>
    <div>
            <?php echo $article['content']; ?>
    </div>
    <div>
        <a href="article.php?url=<?php echo $article['prev']; ?>&source_key=<?php echo $source_key; ?>">上一页</a>
        <a href="catalog.php?url=<?php echo $article['catalog']; ?>&source_key=<?php echo $source_key; ?>">目录</a>
        <a href="article.php?url=<?php echo $article['next']; ?>&source_key=<?php echo $source_key; ?>">下一页</a>
    </div>
        <?php } else { ?>
    <div>
        <p>获取文章失败</p>
    </div>
        <?php } ?>
    <?php } else { ?>
    <div>
        <p>参数错误</p>
    </div>
    <?php } ?>
</body>
</html>
