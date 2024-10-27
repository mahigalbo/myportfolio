<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ホームページ</title>
    
</head>

<style>
    
    body {
        background-color: lightblue;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
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
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 100px; /* フォームの間にスペースを追加 */
        margin-top: 20px;
    }
    .form-container form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    form {
            background-color: #fff; /* フォームの背景色 */
            padding: 20px; /* 内側の余白を追加 */
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
        <div class="form-container">
            <form action="" method="post">
            <h2 style="font-size: 1.2em;">検索する</h2>
                <input type="submit" name="submit1" value="移動">
            </form>
            
            <form action="" method="post">
            <h2 style="font-size: 1.2em;">投稿する</h2>
            <form action="" method="post">
                <input type="submit" name="submit2" value="移動">
            </form>
</div>
    </div>
    
    <?php

        if(isset($_POST["submit1"])){

            header("Location: search.php");  // リダイレクトするURLを指定
            exit();  // リダイレクト後に残りのコードを実行しないようにする
    
        }

        if(isset($_POST["submit2"])){

            header("Location: post.php");  // リダイレクトするURLを指定
            exit();  // リダイレクト後に残りのコードを実行しないようにする

        }
        

    
    ?>

</body>
</html>