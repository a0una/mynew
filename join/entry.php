<?php
	session_start();
	require('../dbconnect.php');

	if(!empty($_POST)){
		if($_POST['name'] ===''){
			$error['name']='blank';
		}
		if($_POST['email'] ===''){
			$error['email']='blank';
		}
		if(strlen($_POST['password'] )<4){
			$error['password']='length';
        }
        if(!is_numeric($_POST['password'])){
            $error['password']='numeric';
        }
		if($_POST['password'] ===''){
			$error['password']='blank';
		}
		//アカウントの重複をcheck
		if(empty($error)){
			$member=$db->prepare('SELECT COUNT(*) AS cnt FROM user_data WHERE email=?');
			$member->execute(array($_POST['email']));
			$record=$member->fetch();
			if($record['cnt'] >0){
				$error['email']='duplicate';
			}
        }
        
        //check.phpに移動する
		if(empty($error)){
			$_SESSION['join']=$_POST;
			header('Location: check.php');
			exit();
		}
	}
	if($_REQUEST['action']=='rewrite' && isset($_SESSION['join'])){
		$_POST=$_SESSION['join'];
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
    <h3>各項目を記入してください</h3>
        <div id="centerpart">
            <div id="leftside">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="submit" />
                    <dl>
                        <dt>お名前</dt>
                        <dd>
                            <input type="text" name="name" size="35" maxlength="255" value="<?php print(htmlspecialchars($_POST['name'],ENT_QUOTES)); ?>" />
                            <?php if ($error['name'] === 'blank'): ?>
                            <p class="error">*お名前を入力してください</p>
                            <?php endif; ?>
                        </dd>
                        <dt>メールアドレス</dt>
                        <dd>
                            <input type="email" name="email" size="35" maxlength="255" value="<?php print(htmlspecialchars($_POST['email'],ENT_QUOTES)); ?>" />
                            <?php if ($error['email'] === 'blank'): ?>
                                <p class="error">*メールアドレスを入力してください</p>
                                <?php endif; ?>
                            <?php if ($error['email'] === 'duplicate'): ?>
                            <p class="error">*すでに登録されているメールアドレスです</p>
                            <?php endif; ?>
                        </dd>
                        <dt>パスワード<span class="caution">　*必須</span><br>&lang;4文字以上の半角英数字でご入力ください&rang;</dt>
                        <dd>
                            <input type="password" name="password" size="10" maxlength="20" value="<?php print(htmlspecialchars($_POST['password'],ENT_QUOTES)); ?>" />
                            <?php if ($error['password'] === 'blank'): ?>
                            <p class="error">*passwordを入力してください</p>
                            <?php endif; ?>
                            <?php if ($error['password'] === 'length' || $error['password'] === 'numeric'): ?>
                            <p class="error">*passwordを4文字以上の半角英数字で入力してください</p>
                            <?php endif; ?>
                        </dd>
                    </dl>
                    <br>
                        <input type="submit" value="入力内容を確認する" />
                </form>
                <br>
            </div><!--leftside end-->
        </div><!--centerpart end-->
    </div><!--countainer end-->
</div><!--wrapper end-->
<footer>

    <p><small>© 2020 ay.</small></p>

</body>

</html>
