<h1>SimplePie(キャッシュ有効)</h1>
<?php
// 計測開始時刻を記録
$time_start = microtime(true);

// 3種類のフィードURLを登録
$urls = array(
  'RSS1.0' => 'http://info.cocolog-nifty.com/info/index.rdf',
  'RSS2.0' => 'http://info.cocolog-nifty.com/info/rss.xml',
  'Atom' => 'http://info.cocolog-nifty.com/info/atom.xml'
);

// SimplePieを利用して新着記事5件を取得して表示する
require_once('simplepie-1.3.1/SimplePie.compiled.php');
$feed = new SimplePie();
$feed->set_cache_location('./cache');

foreach ($urls as $name => $url) {
  echo '<hr>';
  echo '<h2>' . $name . '</h2>';

  $feed->set_feed_url($url);
  $feed->init();
  $items=$feed->get_items(0, 5);
  foreach ($items as $item) {
    echo '<h4>' . $item->get_date('Y.m.d') . '</h4>';
    echo '<p><a href="' . $item->get_permalink() . '" target="_blank">' . $item->get_title() . '</a></p>';
    echo '<p>' . $item->get_description() . '</p>';
  }
}

// 実行時間を算出
$time = microtime(true) - $time_start;
echo "<hr><h2>{$time} 秒</h2>";