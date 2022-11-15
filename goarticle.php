<?php require_once "source.php"; ?>

<?php
    $url = $_GET['url'] ?? '';
    $source_key = $_GET['source_key'] ?? '';
    if ($url && $source_key) {
        header("Location:article.php?url=".base64_encode($url)."&source_key=".$source_key);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>直达章节</title>
</head>
<body>
    <div>
        <form action="goarticle.php" method="get">
            <select name="source_key">
            <option value="">请选择...</option>
                <?php foreach ($source as $key => $value) { ?>
                    <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                <?php } ?>
            </select>
            <input type="text" name="url" id="url" value="">
            <br>
            <input type="submit" value="直达章节" onsubmit="changeUrl()">
        </form>
    </div>
</body>
</html>
