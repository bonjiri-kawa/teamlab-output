# 作成したサービス内容  
「プログラミング用のタイピングゲーム」
覚えたいプログラミングの構文などを登録し、それを速く正確に打つことができたかを計るゲーム。
点数が高ければ速く、性格に打つことができた事になる。

## 〜なぜこのサービスをつくったか〜  
プログラミングを勉強していくなかで感じたことに、タイピングの速さや、思いついた基本的な構文を瞬時に書くことができると、勉強がより
効率的になるということ。そこで、自分が曖昧だと思う構文を自分で登録し、練習できるようになれば、プログラミング初心者の勉強がより捗る
のではないかと考えたため。



## 使用しているフレームワーク  
Laravel 5.8.37
Vue.js 2.5.17


#環境構築

composerをダウンロード

```
composer global require laravel/installer
```
ダウンロードしたcomposerを「user/local/bin」に移動させる
```$xslt
sudo mv composer.phar /usr/local/bin/composer
```
配置したcomposerのパーミッションを変更
```$xslt
chmod a+x /usr/local/bin/composer
```
Laravelをインストールする
```$xslt
composer global require laravel/installer
```
環境変数PATHを設定
```$xslt
echo "export PATH=\$PATH:\$HOME/.composer/vendor/bin" >> ~/.bash_profile
```
そのPATHをsourceコマンドで有効にする
```$xslt
source ~./bash_profile
```
Laravelを使ってプロジェクトを作成
```$xslt
composer create-project "laravel/laravel" --prefer-dist プロジェクト名
```
作ったプロジェクトに移動し、laravelのバージョンを確認
```$xslt
php artisan --version
```
ここで
```$xslt
Laravel Framework 5.8.35
```
などの、バージョンが出れば使用できる

そして、Vue.jsを使いたい時は、コマンドラインで
```$xslt
npm install
```
を行えば使用できる。

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
