<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>投稿</title>
</head>
<style>
    body {
        background-color: lightblue;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
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
    .content {
        margin-top: 100px; /* トップセクションの高さ分の余白 */
        width: 90%;
        max-width: 800px;
        padding: 20px;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    h2, h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    form {
        width: 100%; /* フォーム全体の幅を最大限に広げる */
        max-width: 600px; /* フォームの最大幅を600pxに制限 */
        display: flex;
        flex-direction: column; /* 要素を縦に並べる */
        align-items: center; /* 要素を中央に揃える */
    }
    select, input[type="text"], input[type="file"], input[type="submit"] {
        width: 90%; 
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1em;
    }
    input[type="submit"]{
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
    .footer-link {
            margin: 20px auto;
            text-align: center;
    }
    .footer-link a {
            font-size: 1.0em;
    }
</style>

<body>
    <div class="top-section"></div>
    <div class="top-left">Travel Routes</div>
    <img src="Designer_Background Removal.png" alt="Travel Routes" style="position: absolute; top: -8px; left: 165px; width: 100px; height: auto;">
    <div class="content">
    <h2 style="font-size: 2.0em;">投稿</h2>
        <h3 style="font-size: 1.2em;">場所</h3>
        <form action="" method="post" enctype="multipart/form-data">
        <select name="place" >
            <option value="">都道府県を選択してください</option>
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
        <input type="text" name="spot" placeholder="観光場所(〇〇,〇〇,)">
        <input type="text" name="food" placeholder="飲食店(〇〇,〇〇,)">
        <h3 style="font-size: 1.2em;">写真(最大5枚)</h3>
            <input type="file" name="image_path1">
            <input type="file" name="image_path2">
            <input type="file" name="image_path3">
            <input type="file" name="image_path4">
            <input type="file" name="image_path5">
            <input type="submit" name="submit" value="投稿">
    </form>

    <?php

    $dsn = 'mysql:dbname=データベース名;host=localhost';
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

    if (!empty($_POST["place"]) && !empty($_POST["spot"]) && !empty($_POST["food"])){

        $place = $_POST["place"];
        $spot = $_POST["spot"];
        $food = $_POST["food"];
        $date = date("Y/m/d H:i:s");

        // 各画像ファイルの変数を初期化（アップロードされなかった場合はnull）
        $image1 = $image2 = $image3 = $image4 = $image5 = null;

        // 画像ファイルの保存先ディレクトリ
        $upload_dir = "uploads/";

        // 1つ目の画像ファイルを処理
        if (isset($_FILES['image_path1']) && $_FILES['image_path1']['error'] == 0) {
            $file_name1 = $_FILES['image_path1']['name'];
            $file_tmp1 = $_FILES['image_path1']['tmp_name'];
            $target_file1 = $upload_dir . basename($file_name1);
            if (move_uploaded_file($file_tmp1, $target_file1)) {
                $image1 = $target_file1; // アップロードされたファイルのパスを変数に格納
            }

        }

        // 2つ目の画像ファイルを処理
        if (isset($_FILES['image_path2']) && $_FILES['image_path2']['error'] == 0) {
            $file_name2 = $_FILES['image_path2']['name'];
            $file_tmp2 = $_FILES['image_path2']['tmp_name'];
            $target_file2 = $upload_dir . basename($file_name2);
            if (move_uploaded_file($file_tmp2, $target_file2)) {
                $image2 = $target_file2; // アップロードされたファイルのパスを変数に格納
            }
        }

        // 3つ目の画像ファイルを処理
        if (isset($_FILES['image_path3']) && $_FILES['image_path3']['error'] == 0) {
            $file_name3 = $_FILES['image_path3']['name'];
            $file_tmp3 = $_FILES['image_path3']['tmp_name'];
            $target_file3 = $upload_dir . basename($file_name3);
            if (move_uploaded_file($file_tmp3, $target_file3)) {
                $image3 = $target_file3; // アップロードされたファイルのパスを変数に格納
            }
   
        }

        // 4つ目の画像ファイルを処理
        if (isset($_FILES['image_path4']) && $_FILES['image_path4']['error'] == 0) {
            $file_name4 = $_FILES['image_path4']['name'];
            $file_tmp4 = $_FILES['image_path4']['tmp_name'];
            $target_file4 = $upload_dir . basename($file_name4);
            if (move_uploaded_file($file_tmp4, $target_file4)) {
                $image4 = $target_file4; // アップロードされたファイルのパスを変数に格納
            }

        }

        // 5つ目の画像ファイルを処理
        if (isset($_FILES['image_path5']) && $_FILES['image_path5']['error'] == 0) {
            $file_name5 = $_FILES['image_path5']['name'];
            $file_tmp5 = $_FILES['image_path5']['tmp_name'];
            $target_file5 = $upload_dir . basename($file_name5);
            if (move_uploaded_file($file_tmp5, $target_file5)) {
                $image5 = $target_file5; // アップロードされたファイルのパスを変数に格納
            }
        }

        $sql = "INSERT INTO post_table (place, spot, food, image_path1, image_path2, image_path3, image_path4, image_path5, date) VALUES (:place, :spot, :food, :image_path1, :image_path2, :image_path3, :image_path4, :image_path5, :date)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':place', $place, PDO::PARAM_STR);
        $stmt->bindParam(':spot', $spot, PDO::PARAM_STR); 
        $stmt->bindParam(':food', $food, PDO::PARAM_STR);
        $stmt->bindParam(':image_path1', $image1, PDO::PARAM_STR);
        $stmt->bindParam(':image_path2', $image2, PDO::PARAM_STR);
        $stmt->bindParam(':image_path3', $image3, PDO::PARAM_STR);
        $stmt->bindParam(':image_path4', $image4, PDO::PARAM_STR);
        $stmt->bindParam(':image_path5', $image5, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();

    }else if(isset($_POST["submit"])) {
        
        //必要事項を入力せずに投稿ボタンを押した場合にエラー文表示
        echo "<span style='color: red;'>エラー: 都道府県と観光場所と飲食店をすべて(なければなしと)入力してください。</span><br>";
        
    }
    ?>
    </div>
    <div class="footer-link">
        <p><a href="homepage.php">ホーム</a>に戻る</p>
    </div>
</body>
</html>