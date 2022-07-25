<?php
    // 书源
    $source = array(
        // 'xqqxs8' => array(
        //     'name' => 'xqqxs8',
        //     'encoding' => 'UTF-8',
        //     'search_url' => 'https://m2.xqqxs8.com/search.php?keyword={{$keyword}}',
        //     'search_html' => '/<a href="(\/\d+\/\d+\/)"><p class="title">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/p> +<p class="author"> +作者：<a href="\/author\/\d+\/">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/a>/u',
        //     'catalog_url' => 'https://m2.xqqxs8.com{{$url}}all.html',
        //     'catalog_html' => '/<p><a href="(\/\d+\/\d+\/\d+.html)">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/a><\/p>/u',
        //     'catalog_page' => '',
        //     'catalog_page_url' => '',
        //     'catalog_page_html' => '',
        //     'article_url' => 'https://m2.xqqxs8.com{{$url}}',
        //     'article_html' => '/<div id="chaptercontent" class="Readarea ReadAjax_content">(.*)<\/div>/',
        //     'article_prev' => '/<a href="((\/\d+\/\d+\/)|\/\d+\/\d+\/[0-9_]+.html)" id="pt_prev" class="Readpage_up">/',
        //     'article_next' => '/<a href="((\/\d+\/\d+\/)|\/\d+\/\d+\/[0-9_]+.html)" id="pt_next" class="Readpage_down js_page_down">/',
        //     'article_catalog' => '/<a href="(\/\d+\/\d+\/)" id="pt_mulu" class="Readpage_up">/',
        // ),
        'yetianlian' => array(
            'name' => 'yetianlian',
            'search_encoding' => 'GBK',
            'html_encoding' => 'UTF-8',
            'search_url' => 'http://m.yetianlian.com/s.php?q={{$keyword}}&submit=',
            'search_html' => '/<a href="(\/yt\d+\/)"><h2>([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/h2><\/a><\/p><p>[\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+<\/p><p>([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/p>/u',
            'catalog_url' => 'http://m.yetianlian.com{{$url}}',
            'catalog_html' => '/<li><a href="(\/yt\d+\/\d+.html)">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/a><\/li>/u',
            'catalog_page' => 'select',
            'catalog_page_url' => 'http://m.yetianlian.com{{$url}}',
            'catalog_page_html' => '/<option value="(\/yt\d+\/|\/yt\d+\/index_\d+.html)" (selected="selected"|)>([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/option>/u',
            'article_url' => 'http://m.yetianlian.com{{$url}}',
            'article_html' => '/<div id="nr1">(.*)<\/div> +<\/div>/',
            'article_prev' => '/<a id="pb_prev" href="(\/yt\d+\/\d+.html|\/yt\d+\/\d+_\d+.html)">/',
            'article_next' => '/<a id="pb_next" href="(\/yt\d+\/\d+.html|\/yt\d+\/\d+_\d+.html)">/',
            'article_catalog' => '/<a id="pb_mulu" href="(\/yt\d+\/)">/',
        ),
        // 'fyrsks' => array(
        //     'name' => 'fyrsks',
        //     'encoding' => 'UTF-8',
        //     'search_url' => 'http://www.fyrsks.com/ar.php?keyWord={{$keyword}}',
        //     'search_html' => '/<ahref="(\/bqg\/\d+\/)">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/a><\/span><spanclass="s3"><ahref="\/bqg\/\d+\/\d+.html">[\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+<\/a><\/span><spanclass="s4">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/span>/u',
        //     'catalog_url' => 'http://www.fyrsks.com{{$url}}',
        //     'catalog_html' => '/<astyle=""href="(\/bqg\/\d+\/\d+.html)">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/a>/u',
        //     'catalog_page' => '',
        //     'catalog_page_url' => '',
        //     'catalog_page_html' => '',
        //     'article_url' => 'http://www.fyrsks.com{{$url}}',
        //     'article_html' => '/<divclass="content"id="content">(.*)<ahref="javascript:;"onclick="javascript:addBookMark\(\);"class="btn-addbs">/',
        //     'article_prev' => '/<divclass="section-opt"><ahref="(\/bqg\/\d+\/[0-9_]+.html|\d+.html)">[\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+<\/a><spanclass="xs-hidden">/u',
        //    'article_next' => '/<spanclass="xs-hidden">→<\/span><ahref="(\/bqg\/\d+\/[0-9_]+.html|\d+.html)">[\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+<\/a><ahref="\/txt\/\d+\/">TXT下载<\/a>/u',
        //     'article_catalog' => '/<spanclass="xs-hidden">←<\/span><ahref="(\/bqg\/\d+\/)">章节列表<\/a><spanclass="xs-hidden">→<\/span>/',
        // ),
        // 'xbiqugela' => array(
        //     'name' => 'xbiqugela',
        //     'encoding' => 'UTF-8',
        //     // 'search_url' => 'https://m2.xqqxs8.com/search.php?keyword={{$keyword}}',
        //     // 'search_html' => '/<a href="(\/\d+\/\d+\/)"><p class="title">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/p><p class="author">作者：<a href="\/author\/\d+\/">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/a>/u',
        //     'catalog_url' => 'https://m.xbiqugela.com{{$url}}all.html',
        //     'catalog_html' => '/<li><ahref="(\/book_\d+\/\d+.html)">([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/a><\/li>/u',
        //     'catalog_page' => 'select',
        //     'catalog_page_url' => 'https://m.xbiqugela.com{{$url}}',
        //     'catalog_page_html' => '/<optionvalue="(\/book_\d+\/all.html\?sort=1&page=\d+)"()>([\x{4e00}-\x{9fa5}_\-\+a-zA-Z0-9 、，,。.（(《》）)！!？?：:]+)<\/option>/u',
        //     'article_url' => 'https://m.xbiqugela.com{{$url}}',
        //     'article_html' => '/<divid="nr1">(.*)<\/div><pclass="showbq">/',
        //     'article_prev' => '/<ahref="(\/book_\d+\/\d+.html|\/book_\d+\/\d+\/\d+.html)"id="pb_prev"class="Readpage_up">/',
        //     'article_next' => '/<ahref="(\/book_\d+\/\d+.html|\/book_\d+\/\d+\/\d+.html)"id="pb_next"class="Readpage_downjs_page_down">/',
        //     'article_catalog' => '/<ahref="(\/book_\d+\/)"id="pb_mulu"class="Readpage_up">/',
        // ),
    );

    // 抓取数据
    function getHtml($url, $source) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($curl);
        curl_close($curl);
        // var_dump($html);die;
        if ($source['html_encoding'] != 'UTF-8') {
            $encode = mb_detect_encoding($html, array("ASCII", "GB2312", "GBK", "BIG5"));
            $html = mb_convert_encoding($html, 'UTF-8', $encode);
        }
        $html = str_replace("\n", "", $html);
        $html = str_replace("\r\n", "", $html);
        $html = str_replace("\r", "", $html);
        // var_dump($html);die;
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

        if ($source['catalog_page'] == 'select') {
            preg_match_all($source['catalog_page_html'], $html, $res);
            if ($res) {
                foreach ($res[0] as $key => $value) {
                    $catalog_page[] = array(
                        'url' => base64_encode(str_replace('{{$url}}', $res[1][$key], $source['catalog_page_url'])),
                        'page' => $res[3][$key],
                    );
                }
            }
        }
        
        return ['catalog' => $catalog, 'catalog_page' => $catalog_page ?? []];
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