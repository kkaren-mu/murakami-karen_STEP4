<?php
// 送られてきたデータを変数に入れる
$name     = $_POST['name'];
$age      = $_POST['age'];
$phone    = $_POST['phone'];
$email    = $_POST['email'];
$address  = $_POST['address'];
$question = $_POST['question'];
$gender   = $_POST['gender'];

// エラーメッセージを入れる配列
$errors = [];

// 1) 未入力や条件のチェック（初心者風シンプル版）
if ($name == "") {
    $errors[] = "name : 名前を入力してください。";
}

if ($age == "") {
    $errors[] = "age : 年齢を入力してください。";
} elseif ($age < 0 || $age > 150) {
    // 0から150の間かチェック
    $errors[] = "age : 年齢は0から150の間で入力してください。";
}

if ($phone == "") {
    $errors[] = "phone : 電話番号を入力してください。";
}

if ($email == "") {
    $errors[] = "email : メールアドレスを入力してください。";
}

if ($address == "") {
    $errors[] = "address : 住所を入力してください。";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力内容確認</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if (count($errors) > 0): ?>
            <!-- エラーがあった場合 -->
            <h1>入力エラー</h1>
            <div style="color: red; padding: 20px;">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
            <p><a href="form.php">戻る</a></p>
            
        <?php else: ?>
            <!-- 2) 条件通りに入力された場合 -->
            <h1>入力内容確認</h1>
            <div class="confirm-content">
                <p>名前: <?php echo $name; ?></p>
                <p>年齢: <?php echo $age; ?></p>
                <p>電話番号: <?php echo $phone; ?></p>
                <p>メールアドレス: <?php echo $email; ?></p>
                <p>住所: <?php echo $address; ?></p>
                <p>質問: <?php echo $question; ?></p>
                <p>性別: <?php echo $gender; ?></p>
            </div>
            <p><a href="form.php">戻る</a></p>
        <?php endif; ?>
    </div>
</body>
</html>

