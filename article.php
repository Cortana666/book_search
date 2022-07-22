<?php require_once "source.php"; ?>

<?php
    Session_start();

    $url = $_GET['url'] ?? '';
    $source_key = $_GET['source_key'] ?? '';
    $read_type = $_GET['read_type'] ?? '';
    
    $_SESSION['read_type'] = $_SESSION['read_type'] ?? 1;
    if ($read_type) {
        $_SESSION['read_type'] = $read_type;
    }

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
<body <?php echo $_SESSION['read_type'] == 3 ? 'style="background-color: green;"' : 'style="background-color: white;"'; ?>>
    <div>
        <span>模式：</span>
        <select onchange="read_change(this)">
            <option value="1"<?php echo $_SESSION['read_type'] == 1 ? ' selected' : ''; ?>>标准</option>
            <option value="2"<?php echo $_SESSION['read_type'] == 2 ? ' selected' : ''; ?>>朗读</option>
            <option value="3"<?php echo $_SESSION['read_type'] == 3 ? ' selected' : ''; ?>>护眼</option>
        </select>
    </div>
    <?php if ($url) { ?>
        <?php if ($article) { ?>
    <div <?php echo $_SESSION['read_type'] == 2 ? 'style="color: white;"' : 'style="color: black;"'; ?>>
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
<script>
    function read_change(obj) {
        location.href = location.href + '&read_type=' + obj.options[obj.selectedIndex].value;
    }
</script>
</html>
