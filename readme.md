# 作成したサービス内容  
「プログラミング用のタイピングゲーム」
覚えたいプログラミングの構文などを登録し、それを制限時間内に速く正確に打つことができたかを計るゲーム。  
最大１０問。  
表示されたプログラミングの構文を１文字ずつ打ち込む。正解すれば次の文字へ行き、失敗すれば正解するまで次の文字には行かない。  
制限時間に達すると強制的に終了。そのご、点数が出る。点数が高ければ、制限時間内に速く、正確に問題をこなすことができたことになる。  

## なぜこのサービスをつくったか
私がプログラミングを勉強していくなかで、タイピングの速さや、思いついた基本的な構文を正確に瞬時に書くことができると、勉強がより効率的になると
思うことが多々あった。タイピング練習のサイトは多くあるが、自分で問題を登録して練習ができるサイトは見当たらなかった。そこで、
自分が曖昧だと思う構文を自分で登録し、練習できるようになれば、私のようなプログラミング初心者の勉強効率が上がるのではないかと考えたため、このサービスを作成した。



## 使用しているフレームワーク・データベース
Laravel 5.8.37  
Vue.js 2.5.17  
MAMP 5.5

## 実装した機能
ユーザー登録機能  
ログイン機能  
ログアウト機能  
問題登録機能  
問題編集機能  
問題一覧表示機能  
問題削除機能  
問題練習機能  
マイページ  
認証機能  
ページネーション機能  

## どのようにしたらつかえるか（Mac版）＊Windowsはわかりません。申し訳ありません。  
①MAMPをインストールし、その中のhtdocsの中に今回私が作ったLaravelプロジェクトを作る。  
インストールの仕方は、下記を参考↓  
https://qiita.com/kuro-wassan/items/1cb32995acc07a4b4cc6  
  
Laravelプロジェクトの作成方法は下記を参考↓  
https://readouble.com/laravel/5.8/ja/installation.html  
  
②DBを作成  
⑴ターミナルでMAMPの中のbinまで移動  
```$xslt
cd /Applications/MAMP/Library/bin/
```
  
⑵mysqlコマンドを実行  
```$xslt
./mysql -u root -@
```
⑶DB作成  
```$xslt
CREATE DATABASE データベース名（なんでもいい）
```
（例）  
```$xslt
CREATE DATABASE laravel_sample
```
⑷ .envファイルを変更  
```$xslt
B_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=作成したDB名(例に従ったのであれば、laravel_sample）
DB_USERNAME=root
DB_PASSWORD=root
```
⑸ config/database.php ファイルも変更  
```$xslt
'mysql' => [
  //省略
  'database' => env('DB_DATABASE', 作成したDB名),
  'username' => env('DB_USERNAME', 'root'),
  'password' => env('DB_PASSWORD', 'root'),
  'unix_socket' => env('DB_SOCKET', '/Applications/MAMP/tmp/mysql/mysql.sock'),
```
この'unix_socket'は、mysqlコマンドを実行した状態で、
```$xslt
SHOW VARIABLES LIKE '%sock%';
```
を実行すると分かる。これでDB周りの設定は終わり。  

  
④マイグレーションを作成し、  
（方法は下記参照↓）  
https://readouble.com/laravel/5.8/ja/migrations.html  

```
php artisan migrate
```
を実行  
  
⑤Vueを使えるようにするために、ターミナルにて、作成したLaravelプロフェクトのディレクトリ上で  
```$xslt
npm install
```
を実行。  

npm installが成功したら、Vueを反映させるために、  
```$xslt
npm run dev
```
も実行。
  
⑥最後に、ターミナル上で（ディレクトリはそのまま）  
```$xslt
php artisan serve
```
を実行。  
その後、ターミナルに  
```$xslt
http://127.0.0.1:8000
```
と表示されるため、ブラウザでそのURLを入力。すると、laravelで作成したアプリがブラウザに現れる。  
①〜⑥が成功すればこのアプリを使うことができる。


