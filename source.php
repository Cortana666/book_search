<?php
    // 书源
    $source = array(
        'xqqxs8' => array(
            'name' => 'xqqxs8',
            'encoding' => 'UTF-8',
            'search_url' => 'https://m2.xqqxs8.com/search.php?keyword={{$keyword}}',
            'search_html' => '/<a href="(\/\d+\/\d+\/)"><p class="title">([\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+)<\/p><p class="author">作者：<a href="\/author\/\d+\/">([\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+)<\/a>/u',
            'catalog_url' => 'https://m2.xqqxs8.com{{$url}}all.html',
            'catalog_html' => '/<p><a href="(\/\d+\/\d+\/\d+\.html)">([\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+)<\/a><\/p>/u',
            'catalog_prev' => '',
            'catalog_next' => '',
            'catalog_page' => '',
            'article_url' => 'https://m2.xqqxs8.com{{$url}}',
            'article_html' => '/<div id="chaptercontent" class="Readarea ReadAjax_content">(.*)<\/div>/',
            'article_prev' => '/<a href="(\/\d+\/\d+\/[0-9_]+.html)" id="pt_prev" class="Readpage_up">/',
            'article_next' => '/<a href="(\/\d+\/\d+\/[0-9_]+.html)" id="pt_next" class="Readpage_down js_page_down">/',
            'article_catalog' => '/<a href="(\/\d+\/\d+\/)" id="pt_mulu" class="Readpage_up">/',
        ),
        'fyrsks' => array(
            'name' => 'fyrsks',
            'encoding' => 'UTF-8',
            'search_url' => 'http://www.fyrsks.com/ar.php?keyWord={{$keyword}}',
            'search_html' => '/<a href="(\/bqg\/\d+\/)">([\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+)<\/a> +<\/span> +<span class="s3"><a href="\/bqg\/\d+\/\d+\.html">[\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+<\/a><\/span> +<span class="s4">([\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+)<\/span>/u',
            'catalog_url' => 'http://www.fyrsks.com{{$url}}',
            'catalog_html' => '/<a style="" href="(\/bqg\/\d+\/\d+\.html)">([\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+)<\/a>/u',
            'catalog_prev' => '',
            'catalog_next' => '',
            'catalog_page' => '',
            'article_url' => 'http://www.fyrsks.com{{$url}}',
            'article_html' => '/<div class="content" id="content">(.*)<a href="javascript:;" onclick="javascript:addBookMark\(\);" class="btn-addbs">/',
            'article_prev' => '/<div class="section-opt"> +<a href="(\/bqg\/\d+\/[0-9_]+\.html|\d+\.html)">[\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+<\/a>                                                <span class="xs-hidden">/u',
            'article_next' => '/<span class="xs-hidden">→<\/span> +<a href="(\/bqg\/\d+\/[0-9_]+\.html|\d+\.html)">[\x{4e00}-\x{9fa5}_\-a-zA-Z0-9 、，,。.（(）)！!？?：:]+<\/a>(	| )+<a href="\/txt\/\d+\/">TXT下载<\/a>/u',
            'article_catalog' => '/<span class="xs-hidden">← <\/span> +<a href="(\/bqg\/\d+\/)">章节列表<\/a> +<span class="xs-hidden">→<\/span>/',
        ),
    );

    // 抓取数据
    function getHtml($url, $source) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($curl);
        if ($source['encoding'] != 'UTF-8') {
            $encode = mb_detect_encoding($html, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
            $html = mb_convert_encoding($html, 'UTF-8', $encode);
        }
        $html = str_replace("\n", "", $html);
        $html = str_replace("\r\n", "", $html);
        $html = str_replace("\r", "", $html);
        return $html;
    }

    // 获取搜索结果
    function getSearch($book, $html, $source) {
        preg_match_all($source['search_html'], $html, $res);
        if ($res) {
            foreach ($res[0] as $key => $value) {
                $book[] = array(
                    'source_key' => $source['name'],
                    'url' => base64_encode(str_replace('{{$url}}', $res[1][$key], $source['catalog_url'])),
                    'title' => $res[2][$key],
                    'author' => $res[3][$key],
                );
            }
        }
        return $book;
    }

    // 获取目录
    function getCatalog($catalog, $html, $source) {
        preg_match_all($source['catalog_html'], $html, $res);
        if ($res) {
            foreach ($res[0] as $key => $value) {
                $catalog[] = array(
                    'url' => base64_encode(str_replace('{{$url}}', $res[1][$key], $source['article_url'])),
                    'title' => $res[2][$key],
                );
            }
        }
        return $catalog;
    }

    // 获取文章
    function getArticle($article, $html, $source) {
        preg_match_all($source['article_prev'], $html, $article['prev']);
        preg_match_all($source['article_next'], $html, $article['next']);
        preg_match_all($source['article_catalog'], $html, $article['catalog']);
        preg_match_all($source['article_html'], $html, $article['content']);
        if ($article['prev']) {
            if (substr($article['prev'][1][0], 0, 1) != '/') {
                $article['prev'] = base64_encode(str_replace('{{$url}}', $article['catalog'][1][0].$article['prev'][1][0], $source['article_url']));
            } else {
                $article['prev'] = base64_encode(str_replace('{{$url}}', $article['prev'][1][0], $source['article_url']));
            }
        }
        if ($article['next']) {
            if (substr($article['next'][1][0], 0, 1) != '/') {
                $article['next'] = base64_encode(str_replace('{{$url}}', $article['catalog'][1][0].$article['next'][1][0], $source['article_url']));
            } else {
                $article['next'] = base64_encode(str_replace('{{$url}}', $article['next'][1][0], $source['article_url']));
            }
        }
        if ($article['catalog']) {
            $article['catalog'] = base64_encode(str_replace('{{$url}}', $article['catalog'][1][0], $source['catalog_url']));
        }
        if ($article['content']) {
            $article['content'] = $article['content'][1][0];
        }
        return $article;
    }
?>