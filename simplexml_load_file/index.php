<h1>simplexml_load_fileを利用した自作の処理</h1>
<?php
// 計測開始時刻を記録
$time_start = microtime(true);

// 3種類のフィードURLを登録
$urls = array(
  'RSS1.0' => 'http://info.cocolog-nifty.com/info/index.rdf',
  'RSS2.0' => 'http://info.cocolog-nifty.com/info/rss.xml',
  'Atom' => 'http://info.cocolog-nifty.com/info/atom.xml'
);

foreach ($urls as $name => $url) {
  echo '<hr>';
  echo '<h2>' . $name . '</h2>';

  $rss = simplexml_load_file($url);
  /**
   * atomの場合
   */
  if ($rss->entry) {
    $i = 0;
    foreach ($rss->entry as $entry) {
      if ($i++ >= 5) {break;}
      echo '<h4>' . date('Y.m.d', strtotime($entry->published)) . '</h4>';
      echo '<p><a href="' . $entry->link['href'] . '" target="_blank">' . $entry->title . '</a></p>';
      echo '<p>' . $entry->summary . '</p>';
    }
  }
  /**
   * rss1.0の場合
   */
  elseif ($rss->item) {
    $i = 0;
    foreach ($rss->item as $entry) {
      if ($i++ >= 5) {break;}
      echo '<h4>' . date('Y.m.d', strtotime($entry->children('http://purl.org/dc/elements/1.1/')->date)) . '</h4>';
      echo '<p><a href="' . $entry->link . '" target="_blank">' . $entry->title . '</a></p>';
      echo '<p>' . $entry->description . '</p>';
    }
  }
  /**
   * rss2.0の場合
   */
  elseif ($rss->channel->item) {
    $i = 0;
    foreach ($rss->channel->item as $entry) {
      if ($i++ >= 5) {break;}
      echo '<h4>' . date('Y.m.d', strtotime($entry->pubDate)) . '</h4>';
      echo '<p><a href="' . $entry->link . '" target="_blank">' . $entry->title . '</a></p>';
      echo '<p>' . $entry->description . '</p>';
    }
  }
}

// 実行時間を算出
$time = microtime(true) - $time_start;
echo "<hr><h2>{$time} 秒</h2>";