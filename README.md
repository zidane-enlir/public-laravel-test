# LaravelのFeatureTest, UnitTestの練習

## Installation
```
$ git clone git@github.com:zidane-enlir/public-laravel-test.git


```
<br>
<br>

## ディレクトリ構成

```
your_directory (User)$ tree -L 1
.
├── data (MySQL)
├── laradock (docker-compose)
└── demo-test-laravel (app)
```

## Laravel

[参考にしているリファクタリングの方針](https://github.com/alexeymezenin/laravel-best-practices/blob/master/japanese.md).

<br>
<br>

#### FatModel, SkinnyController

DBに関連するすべてのロジックは  
Eloquentモデルに入れるか、  
もしクエリビルダもしくは生のSQLクエリを使用する場合は  
レポジトリークラスに入れます。  

<br>
<br>

## ローカル開発環境 (Docker内部)

- Laravel 6.18.26  
- PHP 7.3  
- MySQL 5.7  
