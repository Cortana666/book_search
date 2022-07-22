<?php require_once "source.php"; ?>

<?php
    $url = $_GET['url'] ?? '';
    $source_key = $_GET['source_key'] ?? '';
    if ($url) {
        $catalog = array();
        $html = getHtml(base64_decode($url), $source[$source_key]);
        $catalog = getCatalog($catalog, $html, $source[$source_key]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>目录</title>
</head>
<body>
    <?php if ($url) { ?>
        <?php if ($catalog['catalog']) { ?>
    <div>
        <div>
            <ul>
            <?php foreach ($catalog['catalog'] as $key => $value) { ?>
                <li><a href="article.php?url=<?php echo $value['url']; ?>&source_key=<?php echo $source_key; ?>"><?php echo $value['title']; ?></a></li>
            <?php } ?>
            </ul>
        </div>
        <?php if ($catalog['catalog_page']) { ?>
        <div>
            <select onchange="page_change(this)">
                <option value="">请选择</option>
                <?php foreach ($catalog['catalog_page'] as $key => $value) { ?>
                <option value="catalog.php?url=<?php echo $value['url']; ?>&source_key=<?php echo $source_key; ?>"><?php echo $value['page']; ?></option>
                <?php } ?>
            </select>
        </div>
        <?php } ?>
    </div>
        <?php } else { ?>
    <div>
        <p>获取目录失败</p>
    </div>
        <?php } ?>
    <?php } else { ?>
    <div>
        <p>参数错误</p>
    </div>
    <?php } ?>
</body>
<script>
    function page_change(obj) {
        location.href = obj.options[obj.selectedIndex].value;
    }
</script>
</html>
