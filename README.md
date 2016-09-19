# RSSフィード取得の実行時間を比較
下記のふたつの取得方法を比べます。

- [SimplePie](http://simplepie.org/)
- [simplexml_load_file](http://php.net/manual/ja/function.simplexml-load-file.php)

## デモ
[ココログの公式ブログ](http://info.cocolog-nifty.com/)の新着5件を取得します。  
ココログを使う理由は、RSS1.0、RSS2.0、Atomの全てのフィード形式で配信してくれているからです。

- [SimplePie (キャッシュ有効)](http://www.usamimi.info/~sutara/sample2/demo-compare-rss/simplepie/enable-cache.php)
- [SimpelPie (キャッシュ無効)](http://www.usamimi.info/~sutara/sample2/demo-compare-rss/simplepie/disable-cache.php)
- [SimpleXML (自作)](http://www.usamimi.info/~sutara/sample2/demo-compare-rss/simplexml_load_file/)

- - -
- ブログ: http://sutara79.hatenablog.com/entry/2016/09/18/102840