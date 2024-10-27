<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>検索</title>
</head>
<style>
    body {
        background-color: lightblue;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start; 
        height: auto; 
            
    }
    .top-section {
        width: 100%;
        height: 10%;
        background-color: beige;
        position: absolute;
        top: 0;
        left: 0;
    }
    .top-left {
        position: absolute;            
        top: 20px;
        left: 10px;
        font-size: 1.5em;
        font-weight: bold;
    }
    .form-container {
        margin-top: 110px; 
        text-align: center;
    }
    .error-message {
        color: red;
        font-size: 1.0em;
        position: absolute;
        top: 52%;
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
    .result-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: left; /* 左寄せ */
        width: 100%;
        margin-top: 30px;
    }
    .result-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;
        width: 100%;
        max-width: 1200px;
        transition: transform 0.3s;
    }
    .result-card p {
        font-size: 1.1em;
        line-height: 1.2px;
        margin-bottom: 5%;
    }
</style>
<body>
    <div class="top-section"></div>
    <div class="top-left">Travel Routes</div>
    <img src="Designer_Background Removal.png" alt="Travel Routes" style="position: absolute; top: -8px; left: 165px; width: 100px; height: auto;">
    <div class="form-container">
    <h2 style="font-size: 1.2em; ">検索する</h2>
    <form  action="" method="post">
        <select name="place" style="width: 220px; padding: 5px;">
        <option value="">検索したい都道府県</option>
        <option value="北海道">北海道</option>
        <option value="青森県">青森県</option>
        <option value="岩手県">岩手県</option>
        <option value="宮城県">宮城県</option>
        <option value="秋田県">秋田県</option>
        <option value="山形県">山形県</option>
        <option value="福島県">福島県</option>
        <option value="茨城県">茨城県</option>
        <option value="栃木県">栃木県</option>
        <option value="群馬県">群馬県</option>
        <option value="埼玉県">埼玉県</option>
        <option value="千葉県">千葉県</option>
        <option value="東京都">東京都</option>
        <option value="神奈川県">神奈川県</option>
        <option value="新潟県">新潟県</option>
        <option value="富山県">富山県</option>
        <option value="石川県">石川県</option>
        <option value="福井県">福井県</option>
        <option value="山梨県">山梨県</option>
        <option value="長野県">長野県</option>
        <option value="岐阜県">岐阜県</option>
        <option value="静岡県">静岡県</option>
        <option value="愛知県">愛知県</option>
        <option value="三重県">三重県</option>
        <option value="滋賀県">滋賀県</option>
        <option value="京都府">京都府</option>
        <option value="大阪府">大阪府</option>
        <option value="兵庫県">兵庫県</option>
        <option value="奈良県">奈良県</option>
        <option value="和歌山県">和歌山県</option>
        <option value="鳥取県">鳥取県</option>
        <option value="島根県">島根県</option>
        <option value="岡山県">岡山県</option>
        <option value="広島県">広島県</option>
        <option value="山口県">山口県</option>
        <option value="徳島県">徳島県</option>
        <option value="香川県">香川県</option>
        <option value="愛媛県">愛媛県</option>
        <option value="高知県">高知県</option>
        <option value="福岡県">福岡県</option>
        <option value="佐賀県">佐賀県</option>
        <option value="長崎県">長崎県</option>
        <option value="熊本県">熊本県</option>
        <option value="大分県">大分県</option>
        <option value="宮崎県">宮崎県</option>
        <option value="鹿児島県">鹿児島県</option>
        <option value="沖縄県">沖縄県</option>
        </select>
            <input type="submit" name="submit" value="検索">
        </form>
        <p><a href="homepage.php">ホーム</a>に戻る</p>
    </div>
    <div class="result-container">
    <?php

        $dsn = 'mysql:dbname=データベース名;host=localhost';
        $user = 'ユーザー名';
        $password = 'パスワード';
        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        
        if (!empty($_POST["place"])){

            $place = $_POST['place'];

            $sql = "SELECT * FROM post_table WHERE place = :place";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':place', $place, PDO::PARAM_STR);
            $stmt->execute();

            $results = $stmt->fetchAll();
            if ($results) {
                echo "<h3 style='font-size: 1.5em;'>検索結果:</h3>";
                foreach ($results as $row) {
                    //出力結果を表示
                    echo "<div class='result-card'>";
                    echo "<p>ID: " . $row['id'] . "<br></p>";
                    echo "<p>都道府県: " . $row['place'] . "<br></p>";
                    echo "<p>訪れた観光場所: " . $row['spot'] . "<br></p>";
                    echo "<p>訪れた飲食店: " . $row['food'] . "<br></p>";
                    echo "写真 1: <img src='" . htmlspecialchars($row['image_path1'], ENT_QUOTES, 'UTF-8') . "'  style='max-width:200px; border-radius: 15px;'>";
                    echo "写真 2: <img src='" . htmlspecialchars($row['image_path2'], ENT_QUOTES, 'UTF-8') . "'  style='max-width:200px; border-radius: 15px;'>";
                    echo "写真 3: <img src='" . htmlspecialchars($row['image_path3'], ENT_QUOTES, 'UTF-8') . "'  style='max-width:200px; border-radius: 15px;'>";
                    echo "写真 4: <img src='" . htmlspecialchars($row['image_path4'], ENT_QUOTES, 'UTF-8') . "'  style='max-width:200px; border-radius: 15px;'>";
                    echo "写真 5: <img src='" . htmlspecialchars($row['image_path5'], ENT_QUOTES, 'UTF-8') . "'  style='max-width:200px; border-radius: 15px;'><br>";
                    echo "<p>投稿日時: " . $row['date'] . "<br></p>";
                    echo "</div>";
                    
                }
            }else{
                //対象の都道府県の投稿が見つからない場合に表示
                echo "<div class='error-message', style='color: black;'>該当するデータが見つかりませんでした。</div>";
            }
        }else if(isset($_POST["submit"])) {
            
            //都道府県を選択しなかった場合にエラー文表示
            echo "<div class='error-message'>エラー: 都道府県を選択してください。</div>";
            
        }

    ?>
    </div>
</body>
</html>