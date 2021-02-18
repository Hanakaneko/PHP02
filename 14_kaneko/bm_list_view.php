<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ぬいぐるみデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_select_view.php">ぬいぐるみデータ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="bm_insert_view.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ぬいぐるみ住民票</legend>
     <label>なまえ：<input type="text" name="name"></label><br>
     <label>種類：<input type="text" name="type"></label><br>
     <label>サイズ：<input type="text" name="size"></label><br>
     <label>所在地：<input type="text" name="address"></label><br>
     <label>特徴：<textArea name="feature" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
