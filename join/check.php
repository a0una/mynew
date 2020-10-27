<?php

session_start();
require('../dbconnect.php');

if (!isset($_SESSION['join'])) {
    header('Location: entry.php');
    exit();
}

if (!empty($_POST)) {
    $statment = $db->prepare('INSERT INTO user_data SET name=?, email=?, password=?, created=NOW()');
    $statment->execute(array(
    $_SESSION['join']['name'],
    $_SESSION['join']['email'],
    sha1($_SESSION['join']['password'])
    ));
    unset($_SESSION['join']);

    //thanks.php作る
    header('Location: thanks.php');
    exit();
}
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="checkstyle.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300&display=swap" rel="stylesheet">
    <title>My Recipe Collection ～私のレシピ集～</title>
</head>

<body>

<div id="wrapper">

    <header class="clearfix">
        <h1>My Recipe Collection</h1>
        
    </header>

    <div id="topimage" class="clearfix">
            <p>自分のレシピを記録しよう!</p>

            <img src="silverware.png" alt="テーブルウェア" height="70px" width="100px">
    </div>

    <div id="container" class="clearfix">
    <p>記入した内容を確認して下さい。</p>
        <div id="centerpart">
            <div id="leftside">
                <form action="" method="post">
                    <input type="hidden" name="action" value="submit" />
                    <dl>
                        <dt>ニックネーム</dt>
                        <dd>
                        <?php print(htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES)); ?>
                        </dd>
                        <dt>メールアドレス</dt>
                        <dd>
                        <?php print(htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES)); ?>
                        </dd>
                        <dt>パスワード</dt>
                        <dd>
                        【表示されません】
                        </dd>
                    </dl>
                        
                    <div>
                        <input type="button" value="書き直す" onClick="location.href='entry.php?action=rewrite'">｜<input type="submit" value="登録"　/>
                    </div>
                    <br><br><br>
                    <div>
                        
                    </div>
                </form>
            </div>

        </div><!--centerpart end-->
    </div><!--countainer end-->
    <h3><a href="../index.html">戻る</a></h3>
</div><!--wrapper end-->
<footer>

    <p><small>© 2020 ay.</small></p>

</body>

</html>
