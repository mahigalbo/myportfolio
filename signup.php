<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
</head>
<style>
    body {
        background-color: lightblue; 
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .top-section {
        width: 100%;
        height: 10%;
        background-color: beige;
        position: absolute;
        top: 0;
        left: 0;
    }
    .container {
        text-align: center;
        
    }
    .top-left {
        position: absolute;            
        top: 20px;
        left: 10px;
        font-size: 1.5em;
        font-weight: bold;
    }
    .error-message {
        color: red;
        font-size: 1.0em;
        position: absolute;
        top: 55%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    form {
            background-color: #fff; /* フォームの背景色 */
            padding: 30px; /* 内側の余白を追加 */
            border-radius: 10px; /* 角を丸める */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* 影を追加 */
            width: 200px; /* フォームの幅を固定 */
    }
    input[type="submit"] {
            background-color: #FFC0CB; /* ボタンの背景色 */
            color: white; /* ボタンの文字色 */
            border: none;
            border-radius: 5px; /* ボタンの角を丸める */
            padding: 10px; /* ボタンの内側の余白 */
            margin-top: 10px; /* ボタンの上に余白を追加 */
            transition: background-color 0.3s; /* ホバー時のトランジション */
    }
    input[type="submit"]:hover {
            background-color: #fb8c00; /* ホバー時の色 */
    }

</style>
<body>
    <div class="top-section"></div>
    <div class="top-left">  
    Travel Routes
    </div>
    <img src="Designer_Background Removal.png" alt="Travel Routes" style="position: absolute; top: -8px; left: 165px; width: 100px; height: auto;">
    <div class="container">
        <h2 style="font-size: 1.2em;">新規登録</h2>
        <form action="" method="post">
            <input type="text" name="mail" placeholder="メールアドレス" value="">
            <input type="password" name="pass" placeholder="パスワード" value="">
            <input type="submit" name="submit1" value="登録">
        </form>
        <p>すでに登録済みの方は<a href="login.php">こちら</a></p>
        <img src="Designer_Background Removal.png" alt="Travel Routes" style="max-width: 200px; margin-top: auto;">
    </div>

   

    <?php
   
        $dsn = 'mysql:dbname=データベース名;host=localhost';
        $user = 'ユーザー名';
        $password = 'パスワード';
        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        
        if (!empty($_POST["mail"]) && !empty($_POST["pass"])) {
           
            $address = $_POST["mail"];
            $input_password = $_POST["pass"];
            
            //メールアドレスが既に存在するか確認
            $sql_check = "SELECT * FROM login_table WHERE email = :email";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->bindParam(':email', $address, PDO::PARAM_STR);
            $stmt_check->execute();
            $result = $stmt_check->fetch();

            if ($result) {
                //メールアドレスが既に存在する場合のエラーメッセージ
                echo "<div class='error-message'>エラー: このメールアドレスは既に登録されています。</div>";
            } else {

                //存在しない場合、データを挿入
                $sql = "INSERT INTO login_table (email, password) VALUES (:email, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $address, PDO::PARAM_STR);
                $stmt->bindParam(':password', $input_password, PDO::PARAM_STR);
                $stmt->execute();
    
                //登録成功後にリダイレクト
                header("Location: homepage.php");  // リダイレクトするURLを指定
                exit();  // リダイレクト後に残りのコードを実行しないようにする

            }
            
        }else if(isset($_POST["submit1"])) {

            //必要事項を入力せずに登録ボタンを押した場合にエラー文表示
            echo "<div class='error-message'>エラー: メールアドレスとパスワードを両方入力してください。</div>";
            
        }
        
    ?>
    
</body>
</html>