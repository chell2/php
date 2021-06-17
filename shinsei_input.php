<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>申請登録画面</title>
  <style>
    body {
      font-family: Roboto, "Yu Gothic Medium", "游ゴシック Medium", YuGothic, "游ゴシック体", "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
      padding: auto 0.5rem;
    }

    h1 {
      color: #666;
      font-size: 1.2rem;
      text-align: center;
    }

    fieldset {
      border-color: #5b94e5;
      border-radius: 1rem;
    }

    legend {
      color: #5b94e5;
      font-weight: bold;
    }

    form {
      margin: 1rem auto;
      padding: auto;
    }

    form dl dt {
      width: 6rem;
      padding: 0.2rem;
      float: left;
      clear: both;
    }

    form dl dd {
      padding: 0.2rem;
    }

    textarea {
      resize: vertical;
      min-height: 16px;
      max-height: 200px;
    }

    input,
    textarea {
      width: 8.2rem;
      font-size: 90%;
    }

    button {
      display: block;
      margin: 0 auto 1rem;
    }

    .wrapForm {
      width: 290px;
      margin: auto;
      display: flex;
      justify-content: center;
      flex-direction: column;
    }

    .selectImg {
      background-color: #EEEEEE;
      border: solid 0.8px;
      border-radius: 3px;
      margin: auto;
      padding: 0.1px;
      text-align: center;
      font-size: small;
      width: 7rem;
    }

    .selectImg:hover {
      background-color: #E3E3E3;
      border: solid 0.8px;
    }

    img {
      max-width: 290px;
      max-height: 290px;
    }
  </style>
</head>

<body>
  <header>
    <div>
      <a href="shinsei_graph.php">確認画面</a>
    </div>
  </header>
  <main>
    <div>
      <h1>罹災証明および補助事業利用登録</h1>
    </div>
    <form action="shinsei_create.php" method="POST">
      <fieldset>
        <legend>■ 罹災報告</legend>
        <div class="wrapForm">
          <dl>
            <dt>地区:</dt>
            <dd><select name="shiten" id="shiten">
                <option hidden>--- ※ 地区を選択 ---</option>
                <option value="E">東部</option>
                <option value="W">西部</option>
                <option value="S">南部</option>
                <option value="N">北部</option>
              </select></dd>
            <dt>申請No:</dt>
            <?php
            echo "<dd><input type=\"number\" value=\"" . date("ymdHis");
            echo "\" name=\"reqNo\" id=\"reqNo\"></dd>";
            ?>
            <dt>罹災原因:</dt>
            <dd><input type="date" name="cause" value="2020-07-06">の<br>大雨/台風によるもの</dd>
            <dt>氏名:</dt>
            <dd><input type="text" name="name" id="name"></dd>
            <dt>ふりがな:</dt>
            <dd><input type="text" name="kana" id="kana"></dd>
            <dt>生年月日:</dt>
            <dd><input type="date" name="birth" value="1970-01-01"></dd>
            <dt>TEL:</dt>
            <dd><input type="tel" name="tel"></dd>
            <dt>品目:</dt>
            <!-- <dd><select name="item[]" multiple> -->
            <!-- <option value="" disabled selecte>--- ※複数選択可能 ---</option> -->
            <!-- 複数選択で配列にして飛ばしたいけどうまくいかない。後で考える。 -->
            <dd><select name="item">
                <option hidden>--- ※ 品目を選択 ---</option>
                <option value="小松菜">小松菜</option>
                <option value="サラダ菜">サラダ菜</option>
                <option value="リーフレタス">リーフレタス</option>
                <option value="ほうれんそう">ほうれんそう</option>
                <option value="その他軟弱">その他軟弱野菜</option>
                <option value="いちご">いちご</option>
                <option value="トマト">トマト</option>
                <option value="きゅうり">きゅうり</option>
                <option value="その他軟弱">その他野菜</option>
                <option value="菊">菊</option>
                <option value="その他花卉">その他花卉花木</option>
                <option value="その他園芸">その他園芸作物</option>
              </select></dd>
            <dt>圃場住所:</dt>
            <dd><input type="text" name="fieldAdd" value="久留米市"></dd>
            <dt>面積:</dt>
            <dd><input type="number" min="0" step="0.01" name="area">a</dd>
            <dt>浸水深:</dt>
            <dd><input type="number" min="0" step="0.5" name="levels">cm</dd>
            <dt>被害項目:</dt>
            <!-- <dd><select name="damages[]" multiple> -->
            <!-- <option value="" disabled selecte>--- ※複数選択可能 ---</option> -->
            <!-- 複数選択で配列にして飛ばしたいけどうまくいかない。後で考える。 -->
            <dd><select name="damages">
                <option hidden>--- ※ 項目を選択 ---</option>
                <option value="作物">作物</option>
                <option value="ハウス">ハウス</option>
                <option value="附帯施設">附帯施設</option>
                <option value="機械">農業用機械</option>
                <option value="その他">その他</option>
              </select></dd>
            <dt>被害額:</dt>
            <dd><input type="number" min="0" step="1" name="amounts">円</dd>
            <dt>状況詳細:</dt>
            <dd><textarea name="memo" row="4"></textarea></dd>
          </dl>
          <button id="submit">Submit</button>
        </div>
      </fieldset>
    </form>
    <!-- <button id="getFNo">ファイルNoを取得</button> -->
    <form action="image_post.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>■ 被害状況がわかる写真</legend>
        <div class="wrapForm">
          <div id="fNo"></div>
          <div>
            <label for="fileImg">
              <p>
              <div class="selectImg">
                ＋写真を選択
              </div>
              </p>
              <input type="file" name="image" id="fileImg" style="display:none;">
            </label>
            <!-- multipleでファイル複数アップできるがAndroidなどでは使用不可 -->
          </div>
          <button>Upload</button>
        </div>
      </fieldset>
    </form>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
  </script>
  <!-- ふりがなのスクリプト -->
  <script src="jquery.autoKana.js" type="text/javascript"></script>
  <script>
    $(function() {
      $.fn.autoKana('#name', '#kana');
    });

    // 画像UP時に誰のものか判別できるよう付番したいけれど。うまくいかないので後で考える。
    // $('#getFNo').on('click', function() {
    //   console.log("ok");
    //   const noA = document.getElementById("#shiten").value;
    //   const noB = document.getElementById("#reqNo").value;
    //   document.getElementById("#fNo").innerHTML = "<input type = \"text\" value=\"noA" + "noB name=\"fNo\">";
    // });

    $(function() {
      $('input[type=file]').after('<span></span>');

      // アップロードするファイルを選択
      $('input[type=file]').change(function() {
        var file = $(this).prop('files')[0];

        // 画像以外は処理を停止
        if (!file.type.match('image.*')) {
          // クリア
          $(this).val('');
          $('span').html('');
          return;
        }

        // 画像表示
        var reader = new FileReader();
        reader.onload = function() {
          var img_src = $('<img>').attr('src', reader.result);
          $('span').html(img_src);
        }
        reader.readAsDataURL(file);
      });
    });
  </script>

</body>

</html>