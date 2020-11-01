<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300&display=swap" rel="stylesheet">
    <title>My Recipe Collection ～私のレシピ集～</title>
</head>

<body>

<div id="wrapper">

    <header>
    <nav>
            <ul class="clearfix">
                <li><a href="../index.html">戻る</a></li>
            </ul>
        </nav>
        <h1>My Recipe Collection</h1>
    </header>

    <div id="topimage" class="clearfix">
            <p>自分のレシピを記録しよう!</p>

            <img src="silverware.png" alt="テーブルウェア" height="70px" width="100px">
    </div>

    <div id="container" class="clearfix">

        <div id="centerpart">

            <div id="leftside">
                <p>メールアドレスとパスワードを記入して</p>
                <p>ログインしてください。</p>
                <br><br>
                <p>会員登録をされてない方は【<a href="entry.php">こちら</a>】から</p>
            </div>
            <div id="rightside">
                <form action="" method="post">
                    <d1>
                        <dt>メールアドレス</dt>
                        <dd>
                            <input type="email" name="email" size="35" maxlength="255" value="#" />
                            
                        </dd>
                        <dt>パスワード</dt>
                        <dd>
                            <input type="password" name="password" size="35" maxlength="255" value="#" />
                        </dd>
                        <dt>次回から自動ログインする</dt>
                        <dd>
                            <input id="save" type="checkbox" name="save" value="on">
                            <label for="save">ON</label>
                        </dd>
                    </d1>
                    <div>
                        <input type="submit" value="ログイン" />
                    </div>
                </form>
            </div>

        </div><!--centerpart end-->
    </div><!--countainer end-->
        
</div><!--wrapper end-->
<footer>

    <p><small>© 2020 ay.</small></p>

</body>

</html>
