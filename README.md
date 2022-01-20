## スケジュールマネージャー

php.iniに以下を追記
```
extension=php_fileinfo.dll
```

# 1. 動作環境

||varsion|
|-|-|
|macOS Monterey | 12.0.1 |
|PHP | 8.0.0 |
|Laravel | 8.48.1 |

# 2. PHPのインストール(Homebrewが入っている前提)

ターミナルにて、以下のコマンドを打ちます

```% php -v ```

ターミナルにバージョンが出てこなかった場合以下のコマンドを実行します

```% brew install php@8.0```

# 3. 起動

```
% php artisan serve 
Starting Laravel development server: http://127.0.0.1:8000
```
ブラウザを開き、<a href="http://127.0.0.1:8000">http://127.0.0.1:8000</a>にアクセスをする

# 4. 登録済みのデータ

#### アカウント

username : test@qmail.com

password : PassW@rd