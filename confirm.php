<?php
// 送られてきたデータを変数に入れる（三項演算子で未入力時のエラーを防ぐ）
$name     = isset($_POST['name']) ? trim($_POST['name']) : '';
$age      = isset($_POST['age']) ? trim($_POST['age']) : '';
$phone    = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$email    = isset($_POST['email']) ? trim($_POST['email']) : '';
$address  = isset($_POST['address']) ? trim($_POST['address']) : '';
$question = isset($_POST['question']) ? trim($_POST['question']) : '';
$gender   = isset($_POST['gender']) ? trim($_POST['gender']) : '';

// エラーメッセージを入れる配列
$errors = [];

// --- バリデーションチェック ---

// 名前：ひらがな、カタカナ、漢字、英字のみ
if ($name === '') {
    $errors[] = "name : 名前を入力してください。";
} elseif (!preg_match('/^[ぁ-んァ-ヶー一-龠a-zA-Zａ-ｚＡ-Ｚ]+$/u', $name)) {
    $errors[] = "name : 名前はひらがな、カタカナ、漢字、英字のみ使用できます。";
}

// 年齢：0から150の間
if ($age === '') {
    $errors[] = "age : 年齢を入力してください。";
} elseif (!ctype_digit($age) || (int)$age < 0 || (int)$age > 150) {
    $errors[] = "age : 年齢は0から150の間で入力してください。";
}

// 電話番号：半角数字とハイフンのみ
if ($phone === '') {
    $errors[] = "phone : 電話番号を入力してください。";
} elseif (!preg_match('/^[0-9-]+$/', $phone)) {
    $errors[] = "phone : 電話番号は半角数字とハイフンのみ使用できます。";
}

// メールアドレス：形式チェック
if ($email === '') {
    $errors[] = "email : メールアドレスを入力してください。";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "email : メールアドレスの形式が正しくありません。";
}

// 住所：ひらがな、カタカナ、漢字、英字、半角数字、ハイフンのみ
if ($address === '') {
    $errors[] = "address : 住所を入力してください。";
} elseif (!preg_match('/^[ぁ-んァ-ヶー一-龠a-zA-Z0-9-ー]+$/u', $address)) {
    $errors[] = "address : 住所はひらがな、カタカナ、漢字、英字、半角数字、ハイフンのみ使用できます。";
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
            <!-- エラーがあった場合（指摘通りの形式エラーメッセージもここに出力されます） -->
            <h1>入力エラー</h1>
            <div style="color: red; padding: 20px; text-align: left;">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endforeach; ?>
            </div>
            <p><a href="form.php">戻る</a></p>
            
        <?php else: ?>
            <!-- 条件通りに入力された場合 -->
            <h1>入力内容確認</h1>
            <div class="confirm-content" style="text-align: left;">
                <p>名前: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
                <p>年齢: <?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?></p>
                <p>電話番号: <?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?></p>
                <p>メールアドレス: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
                <p>住所: <?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?></p>
                <p>質問: <?php echo htmlspecialchars($question, ENT_QUOTES, 'UTF-8'); ?></p>
                <p>性別: <?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <p><a href="form.php">戻る</a></p>
        <?php endif; ?>
    </div>
</body>
</html>
