<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
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
    <div class="top-left">Travel Routes</div>
    <img src="Designer_Background Removal.png" alt="Travel Routes" style="position: absolute; top: -8px; left: 165px; width: 100px; height: auto;">
    <div class="container">
        <h2 style="font-size: 1.2em; ">ログイン</h2>
        <form action="" method="post">
            <input type="text" name="mail" placeholder="メールアドレス" value=>
            <input type="password" name="pass" placeholder="パスワード" value=>
            <input type="submit" name="submit1" value="ログイン">
        </form>
        <p>新規登録の方は<a href="signup.php">こちら</a></p>
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
             
            $sql = 'SELECT * FROM login_table WHERE email=:email';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $address, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(); // 結果を1行だけ取得
            
            if ($user) {
            
                if ($user['password'] == $input_password) {
            
                    echo "ログイン成功！";
                
                    header("Location: homepage.php"); // リダイレクト先を指定
                    exit();
                }else{

                    //パスワードが間違っている場合にエラー文表示
                    echo "<div class='error-message'>エラー: パスワードが間違っています。</div>";
                }
            
            }else{

                //メールアドレスが登録されていない場合にエラー文表示
                echo "<div class='error-message'>エラー: このメールアドレスは登録されていません。</div>";
        
            }
            
        }else if (isset($_POST["submit1"])) {

            //必要事項を入力せずにログインボタンを押した場合にエラー文表示
            echo "<div class='error-message'>エラー: メールアドレスとパスワードを両方入力してください。</div>";
        
        }
                  
    ?>
    
</body>
</html>