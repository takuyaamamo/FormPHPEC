<?php session_start();
// →→→→→→→→→→→→→→→→→→→→→→トークンセット2→→→→→→→→→→→→→→→→→→→→→→
      if( empty($_SESSION['token2']) ){
        $_SESSION['token2'] = bin2hex(openssl_random_pseudo_bytes(16));
      };
      var_dump($_POST);
      if( isset($_POST['token1'])){
        if( $_POST['token1'] === $_SESSION['token1']){
          var_dump($_SESSION['token1']);
          unset($_POST['token1'], $_SESSION['token1']);
        }else{
          echo "<p>不正の可能性があります、再度お試しください。</p>";
          exit;
        };
      };
      if( isset($_POST['token2'])){
        if( $_POST['token2'] === $_SESSION['token2']){
          var_dump($_SESSION['token2']);
          unset($_POST['token2'], $_SESSION['token2']);
        }else{
          echo "<p>不正の可能性があります、再度お試しください。</p>";
          exit;
        };
      };
      ?>
<!DOCTYPE html>
<html  lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <meta name="format-detection" content="telephone=no">
  <title>ヤマサン商品確定住所入力</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<!-- ~~~~~~~~~~~~~~~~~~~~~~郵便番号から住所自動入力~~~~~~~~~~~~~~~~~~~~~~ -->
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</head>
<body>
<!-- テレポートヘッダー -->
  <header>
    <table>
      <tr>
        <th><a class="" href="index.php#top">ヤマサン</a></th>
        <th><a class="" href="index.php#om">オーダーメイド</a></th>
        <th><a class="" href="index.php#fn">開運ネックレス</a></th>
        <th><a class="" href="index.php#ac">アクセス</a></th>
        <th><a class="" href="index.php#qs">お問い合わせ</a></th>
      </tr>
    </table>
  </header>



<!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓商品購入ボタン押された！！↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
<?php if($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST["braceletBuy"]) || isset($_POST["braceletForm"]) || isset($_POST["necklaceBuy"]) || isset($_POST["braceletPrice"]) || isset($_POST["braceletDestress"]) || isset($_POST["braceletStone"]))){ ?>
<?php require_once('dataSet.php'); ?>
<div class="">
  <h2 class="">①下記の内容でよろしいですか？</h2>


<!-- →→→→→→→→→→→→→→→→→→→→→→オーダーメードブレスレット→→→→→→→→→→→→→→→→→→→→→→ -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~エラーがある場合先に進むボタンを表示させない~~~~~~~~~~~~~~~~~~~~~~ -->
  <?php if(isset($_POST["braceletBuy"])){
    $BraceletOrder = array(
      'year' => $_POST['year'],
      'month' => $_POST['month'],
      'day' => $_POST['day'],
      'distress' => inputRequired(h($_POST['悩み'])),
      'hope' => h($_POST['希望']));
    if(isset($_POST['金額'])) {
      $BraceletOrder['price'] = $_POST['金額'];
    }else{
      $BraceletOrder['price'] = '必須項目です';
    };
      var_dump($err);
      ?>
      <section class="">
        <table>
          <tr><td class=""><h3>生年月日：</h3></td><td class=""><?php echo $BraceletOrder['year']."年 ".$BraceletOrder['month']."月 ".$BraceletOrder['day']."日";?></td></tr>
          <tr><td class=""><h3>悩み：</h3></td><td class=""><?php echo $BraceletOrder['distress']; ?></td></tr>
          <tr><td class=""><h3>希望：</h3></td><td class=""><?php echo $BraceletOrder['hope']; ?></td></tr>
          <tr><td class=""><h3>価格：</h3></td><td class=""><?php if($BraceletOrder['price'] === '必須項目です'){
            echo $BraceletOrder['price'];
          }else{
            echo number_format($BraceletOrder['price']);
          };?>円</td></tr>
        </table>
      </section>
<!-- →→→→→→→→→→→→→→→→→→→→→→最終確認画面にデータを飛ばすフォーム→→→→→→→→→→→→→→→→→→→→→→ -->
      <form class="" action="entry.php" method="post">
<?php $birth = $BraceletOrder['year'].'年'.$BraceletOrder['month'].'月'.$BraceletOrder['day'].'日';
      $distress = $BraceletOrder['distress'];
      $hope = $BraceletOrder['hope'];
      $price = $BraceletOrder['price'];?>
        <input type="hidden" name="選択商品" value="ordermadeBracelet">
        <input type="hidden" name="誕生日" value="<?php echo $birth ?>">
        <input type="hidden" name="悩み" value="<?php echo $distress ?>">
        <input type="hidden" name="希望" value="<?php echo $hope ?>">
        <input type="hidden" name="金額" value="<?php echo $price ?>">
<?php }; ?>



<!-- →→→→→→→→→→→→→→→→→→→→→→ブレスレット（金額）→→→→→→→→→→→→→→→→→→→→→→ -->
<?php if(isset($_POST["braceletPrice"])) {
        switch ($_POST["braceletPrice"]) {
          case 'BraceletPrice3':
            $price = $BraceletPrice3 -> getPrice();
            echo '<table><tr><td><h3>選択されたブレスレットの金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'BraceletPrice5':
            $price = $BraceletPrice5 -> getPrice();
            echo '<table><tr><td><h3>選択されたブレスレットの金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'BraceletPrice7':
            $price = $BraceletPrice7 -> getPrice();
            echo '<table><tr><td><h3>選択されたブレスレットの金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'BraceletPrice10':
            $price = $BraceletPrice10 -> getPrice();
            echo '<table><tr><td><h3>選択されたブレスレットの金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'BraceletPrice30':
            $price = $BraceletPrice30 -> getPrice();
            echo '<table><tr><td><h3>選択されたブレスレットの金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'BraceletPrice100':
            $price = $BraceletPrice100 -> getPrice();
            echo '<table><tr><td><h3>選択されたブレスレットの金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          default:
            echo '正しい操作ではありません。';
            break;
        } ?>
<!-- →→→→→→→→→→→→→→→→→→→→→→最終確認画面にデータを飛ばすフォーム→→→→→→→→→→→→→→→→→→→→→→ -->
        <form class="" action="entry.php" method="post">
          <input type="hidden" name="選択商品" value="priceBracelet">
          <input type="hidden" name="金額" value="<?php echo $price; ?>">
<?php }; ?>



<!-- →→→→→→→→→→→→→→→→→→→→→→ブレスレット（悩み）→→→→→→→→→→→→→→→→→→→→→→ -->
<?php if(isset($_POST["braceletDestress"])):
        switch ($_POST["braceletDestress"]) {
          case 'fromLove':
            $price = $BraceletLove -> getPrice();
            $distress = $BraceletLove -> getDestress();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$distress.'です。</p></td></tr>
                  <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'fromGold':
            $price = $BraceletGold -> getPrice();
            $distress = $BraceletGold -> getDestress();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$distress.'です。</p></td></tr>
                  <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'fromFight':
            $price = $BraceletFight -> getPrice();
            $distress = $BraceletFight -> getDestress();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$distress.'です。</p></td></tr>
                  <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'fromHealth':
            $price = $BraceletHealth -> getPrice();
            $distress = $BraceletHealth-> getDestress();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$distress.'です。</p></td></tr>
                  <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          case 'fromPurify':
            $price = $BraceletPurify -> getPrice();
            $distress = $BraceletPurify -> getDestress();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$distress.'です。</p></td></tr>
                  <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
            break;
          default:
            echo '正しい操作ではありません。';
            break;
        } ?>
<!-- →→→→→→→→→→→→→→→→→→→→→→最終確認画面にデータを飛ばすフォーム→→→→→→→→→→→→→→→→→→→→→→ -->
      <form class="" action="entry.php" method="post">
        <input type="hidden" name="選択商品" value="distressBracelet">
        <input type="hidden" name="悩み" value="<?php echo $distress ?>">
        <input type="hidden" name="金額" value="<?php echo $price ?>">
<?php endif; ?>



<!-- →→→→→→→→→→→→→→→→→→→→→→ブレスレット（誕生月）→→→→→→→→→→→→→→→→→→→→→→ -->
<?php if(isset($_POST["braceletStone"])):
        switch ($_POST["braceletStone"]) {
          case 'fromJanuary':
            $price = $BraceletJanuary -> getPrice();
            $image = $BraceletJanuary -> getImage();
            $BirthMonth = $BraceletJanuary -> getBirthMonth();
            $stone = $BraceletJanuary -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromFebruary':
            $price = $BraceletFebruary -> getPrice();
            $image = $BraceletFebruary -> getImage();
            $BirthMonth = $BraceletFebruary -> getBirthMonth();
            $stone = $BraceletFebruary -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromMarch':
            $price = $BraceletMarch -> getPrice();
            $image = $BraceletMarch -> getImage();
            $BirthMonth = $BraceletMarch -> getBirthMonth();
            $stone = $BraceletMarch -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromApril':
            $price = $BraceletApril -> getPrice();
            $image = $BraceletApril -> getImage();
            $BirthMonth = $BraceletApril -> getBirthMonth();
            $stone = $BraceletApril -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromMay':
            $price = $BraceletMay -> getPrice();
            $image = $BraceletMay -> getImage();
            $BirthMonth = $BraceletMay -> getBirthMonth();
            $stone = $BraceletMay -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromJune':
            $price = $BraceletJune -> getPrice();
            $image = $BraceletJune -> getImage();
            $BirthMonth = $BraceletJune -> getBirthMonth();
            $stone = $BraceletJune -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromJuly':
            $price = $BraceletJuly -> getPrice();
            $image = $BraceletJuly -> getImage();
            $BirthMonth = $BraceletJuly -> getBirthMonth();
            $stone = $BraceletJuly -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromAugust':
            $price = $BraceletAugust -> getPrice();
            $image = $BraceletAugust -> getImage();
            $BirthMonth = $BraceletAugust -> getBirthMonth();
            $stone = $BraceletAugust -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromSeptember':
            $price = $BraceletSeptember -> getPrice();
            $image = $BraceletSeptember -> getImage();
            $BirthMonth = $BraceletSeptember -> getBirthMonth();
            $stone = $BraceletSeptember -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromOctober':
            $price = $BraceletOctober -> getPrice();
            $image = $BraceletOctober -> getImage();
            $BirthMonth = $BraceletOctober -> getBirthMonth();
            $stone = $BraceletOctober -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromNovember':
            $price = $BraceletNovember -> getPrice();
            $image = $BraceletNovember -> getImage();
            $BirthMonth = $BraceletNovember -> getBirthMonth();
            $stone = $BraceletNovember -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
          case 'fromDecember':
            $price = $BraceletDecember -> getPrice();
            $image = $BraceletDecember -> getImage();
            $BirthMonth = $BraceletDecember -> getBirthMonth();
            $stone = $BraceletDecember -> getStone();
            echo '<table><tr><td><h3>あなたのブレスレットは:</h3></td><td><p>'.$BirthMonth.'月の'.$stone.'です。</p></td></tr>
            <tr><td><img src="'.$image.'" alt="商品"></td></tr>
            <tr><td><h3>金額は:</h3></td><td><p>'.number_format($price).'円です。</P></tr></table>';
          break;
            default:
            echo '正しい操作ではありません。';
            break;
          } ?>
<!-- →→→→→→→→→→→→→→→→→→→→→→最終確認画面にデータを飛ばすフォーム→→→→→→→→→→→→→→→→→→→→→→ -->
      <form class="" action="entry.php" method="post">
        <input type="hidden" name="選択商品" value="stoneBracelet">
        <input type="hidden" name="金額" value="<?php echo $price ?>">
        <input type="hidden" name="画像" value="<?php echo $image ?>">
        <input type="hidden" name="誕生月" value="<?php echo $BirthMonth ?>">
        <input type="hidden" name="誕生石" value="<?php echo $stone ?>">
<?php endif; ?>



<!-- →→→→→→→→→→→→→→→→→→→→→→ネックレス→→→→→→→→→→→→→→→→→→→→→→ -->

<!-- →→→→→→→→→→→→→→→→→→→→→→ネックレス3→→→→→→→→→→→→→→→→→→→→→→ -->
<?php if (isset($_POST["necklaceBuy"]) == "ネックレス3"):
      require_once('dataSet.php');
      $image = $NecklacePrice3->getImage();
      $price = $NecklacePrice3->getPrice();?>
      <section class="">
        <div class="">
          <div class="">
            <img src="<?php echo $image ?>" alt="商品">
          </div>
          <div class="">
            <p><i class="fas fa-yen-sign"></i><?php echo number_format($price) ?>円(税抜)</p>
            <p><?php echo $NecklacePrice3->getP1() ?></p>
            <p><?php echo $NecklacePrice3->getP2() ?></p>
          </div>
        </div>
      </section>
<!-- →→→→→→→→→→→→→→→→→→→→→→最終確認画面にデータを飛ばすフォーム→→→→→→→→→→→→→→→→→→→→→→ -->
      <form class="" action="entry.php" method="post">
        <input type="hidden" name="選択商品" value="necklace">
        <input type="hidden" name="金額" value="<?php echo $price ?>">
        <input type="hidden" name="画像" value="<?php echo $image ?>">

<!-- →→→→→→→→→→→→→→→→→→→→→→ネックレス6→→→→→→→→→→→→→→→→→→→→→→ -->
<?php elseif (isset($_POST["necklaceBuy"]) == "ネックレス6"):
      require_once('dataSet.php');
      $image = $NecklacePrice6->getImage();
      $price = $NecklacePrice6->getPrice();?>
      <section class="">
        <div class="">
          <div class="">
            <img src="<?php echo $image ?>" alt="商品">
          </div>
          <div class="">
            <p><i class="fas fa-yen-sign"></i><?php echo number_format($price) ?>円(税抜)</p>
            <p><?php echo $NecklacePrice6->getP1() ?></p>
            <p><?php echo $NecklacePrice6->getP2() ?></p>
          </div>
        </div>
      </section>
<!-- →→→→→→→→→→→→→→→→→→→→→→最終確認画面にデータを飛ばすフォーム→→→→→→→→→→→→→→→→→→→→→→ -->
      <form class="" action="entry.php" method="post">
        <input type="hidden" name="選択商品" value="necklace">
        <input type="hidden" name="金額" value="<?php echo $price ?>">
        <input type="hidden" name="画像" value="<?php echo $image ?>">

<!-- →→→→→→→→→→→→→→→→→→→→→→ネックレス15→→→→→→→→→→→→→→→→→→→→→→ -->
<?php elseif(isset($_POST["necklaceBuy"]) == "ネックレス15"):
      require_once('dataSet.php');
      $image = $NecklacePrice15->getImage();
      $price = $NecklacePrice15->getPrice();?>
      <section class="">
        <div class="">
          <div class="">
            <img src="<?php echo $image ?>" alt="商品">
          </div>
          <div class="">
            <p><i class="fas fa-yen-sign"></i><?php echo number_format($price) ?>円(税抜)</p>
            <p><?php echo $NecklacePrice15->getP1() ?></p>
            <p><?php echo $NecklacePrice15->getP2() ?></p>
          </div>
        </div>
      </section>
<!-- →→→→→→→→→→→→→→→→→→→→→→最終確認画面にデータを飛ばすフォーム→→→→→→→→→→→→→→→→→→→→→→ -->
      <form class="" action="entry.php" method="post">
        <input type="hidden" name="選択商品" value="necklace">
        <input type="hidden" name="金額" value="<?php echo $price ?>">
        <input type="hidden" name="画像" value="<?php echo $image ?>">
<?php endif; ?>
      <button type="button" onclick="history.back()">商品を選び直す</button>
<?php }?>



<!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓送付先入力↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
<?php $page_flag = 0;//商品注文確認ページ設定
  if(isset($_POST['btn_confirm'])) {
    $page_flag = 1;
  }elseif(isset($_POST['btn_submit'])) {
    $page_flag = 2;

// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓メール送信実装↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

// →→→→→→→→→→→→→→→→→→→→→→変数とタイムゾーンを初期化→→→→→→→→→→→→→→→→→→→→→→
    $header = null;
  	$auto_reply_subject = null;
  	$auto_reply_text = null;
    $admin_reply_subject = null;
    $admin_reply_text  = null;
  	date_default_timezone_set('Asia/Tokyo');

// →→→→→→→→→→→→→→→→→→→→→→ヘッダー情報を設定→→→→→→→→→→→→→→→→→→→→→→
    $header = "MIME-Version: 1.0\n";
    $header .= "From: YAMASAN <iamaama703@gmail.com>\n";
    $header .= "Reply-To: YAMASAN <iamaama703@gmail.com>\n";

// →→→→→→→→→→→→→→→→→→→→→→件名を設定→→→→→→→→→→→→→→→→→→→→→→
    $auto_reply_subject = '商品のご注文ありがとうございます。';

// →→→→→→→→→→→→→→→→→→→→→→本文を設定→→→→→→→→→→→→→→→→→→→→→→
  	$auto_reply_text = "この度は、商品をご注文頂き誠にありがとうございます。
  下記の内容でご注文を受け付けました。\n\n";
  	$auto_reply_text .= "ご注文日時：" . date("Y-m-d H:i") . "\n";
  	$auto_reply_text .= "商品：" . $_POST["選択商品"] . "\n";
    if (isset($_POST["誕生日"])) $auto_reply_text .= "誕生日：" . $_POST["誕生日"] . "\n";
    if (isset($_POST["悩み"])) $auto_reply_text .= "悩み：" . $_POST["悩み"] . "\n";
    if (isset($_POST["希望"])) $auto_reply_text .= "希望：" . $_POST["希望"] . "\n" ;
    if (isset($_POST["金額"])) $auto_reply_text .= "金額：" . $_POST["金額"] . "\n" ;
    if (isset($_POST["size"])) $auto_reply_text .= "サイズ：" . $_POST["size"] . "\n" ;
  	$auto_reply_text .= "郵送先\n";
  	$auto_reply_text .= "氏名：" . $_POST['name1'] . $_POST['name2'] . "\n";
  	$auto_reply_text .= "〒：" . $_POST['zip11'] . "\n";
  	$auto_reply_text .= "住所：" . $_POST['addr11'] . "\n";
  	$auto_reply_text .= "電話番号：" . $_POST['num'] . "\n";
  	$auto_reply_text .= "メールアドレス：" . $_POST['mail'] . "\n\n";
  	$auto_reply_text .= "ヤマサン";

// →→→→→→→→→→→→→→→→→→→→→→メール送信→→→→→→→→→→→→→→→→→→→→→→
    mb_send_mail( $_POST['mail'], $auto_reply_subject, $auto_reply_text);

// →→→→→→→→→→→→→→→→→→→→→→運営側へ送るメールの件名→→→→→→→→→→→→→→→→→→→→→→
    $admin_reply_subject = "商品の注文を受付ました";

// →→→→→→→→→→→→→→→→→→→→→→本文を設定→→→→→→→→→→→→→→→→→→→→→→
    $admin_reply_text = "下記の内容で商品注文がありました。\n\n";
    $admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
    $admin_reply_text .= "商品：" . $_POST["選択商品"] . "\n";
    if (isset($_POST["誕生日"])) $admin_reply_text .= "誕生日：" . $_POST["誕生日"] . "\n" ;
    if (isset($_POST["悩み"])) $admin_reply_text .= "悩み：" . $_POST["悩み"] . "\n" ;
    if (isset($_POST["希望"])) $admin_reply_text .= "希望：" . $_POST["希望"] . "\n" ;
    if (isset($_POST["金額"])) $admin_reply_text .= "金額：" . $_POST["金額"] . "\n" ;
    if (isset($_POST["size"])) $admin_reply_text .= "サイズ：" . $_POST["size"] . "\n" ;
  	$admin_reply_text .= "郵送先\n";
  	$admin_reply_text .= "氏名：" . $_POST['name1'] . $_POST['name2'] . "\n";
  	$admin_reply_text .= "〒：" . $_POST['zip11'] . "\n";
  	$admin_reply_text .= "住所：" . $_POST['addr11'] . "\n";
  	$admin_reply_text .= "電話番号：" . $_POST['num'] . "\n";
  	$admin_reply_text .= "メールアドレス：" . $_POST['mail'] . "\n\n";

// →→→→→→→→→→→→→→→→→→→→→→運営側へメール送信→→→→→→→→→→→→→→→→→→→→→→
    mb_send_mail( 'iamataku@me.com', $admin_reply_subject, $admin_reply_text, $header);
  }?>



<!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓商品「確認」画面かつ住所「入力」画面↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
<?php if($page_flag === 0){
  echo $page_flag;?>
<?php if (isset($_POST["選択商品"])) { ?>
  <h1 class="">再度ご注文内容を確認し購入確定ボタンを押して下さい</h1>
<!-- →→→→→→→→→→→→→→→→→→→→→→商品確認画面→→→→→→→→→→→→→→→→→→→→→→ -->
<form class="" action="entry.php" method="post">
  <h2>お選びいただいた商品</h2>
  <table>
<?php switch ($_POST["選択商品"]) {
      case 'ordermadeBracelet':?>
      <tr><th><h3>ブレスレットのオーダーメード</h3></th></tr>
      <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
      case 'priceBracelet':?>
      <tr><th><h3>金額から選ぶ</h3></th></tr>
      <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
      case 'distressBracelet':?>
      <tr><th><h3>悩みから選ぶ</h3></th></tr>
      <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
      case 'stoneBracelet':?>
      <tr><th><h3>誕生石から選ぶ</h3></th></tr>
      <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
      case 'necklace':?>
      <tr><th><h3>開運ネックレス</h3></th></tr>
      <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
      default:
      echo "<h2>ページが異なります</h2>";
      break;
} ?>
<?php   if (isset($_POST["誕生日"])): ?>
      <tr><th><h3>誕生日：</h3></th><td><p><?php echo $_POST["誕生日"] ?></p></td></tr>
      <input type="hidden" name="誕生日" value="<?php echo $_POST["誕生日"] ?>">
<?php   endif; ?>
<?php   if (isset($_POST["悩み"])): ?>
      <tr><th><h3>悩み：</h3></th><td><p><?php echo $_POST["悩み"] ?></p></td></tr>
      <input type="hidden" name="悩み" value="<?php echo $_POST["悩み"] ?>">
<?php   endif; ?>
<?php   if (isset($_POST["希望"])): ?>
      <tr><th><h3>希望：</h3></th><td><p><?php echo $_POST["希望"] ?></p></td></tr>
      <input type="hidden" name="希望" value="<?php echo $_POST["希望"] ?>">
<?php   endif; ?>
<?php   if (isset($_POST["金額"])): ?>
      <tr><th><h3>価格：</h3></th><td><p><?php echo number_format($_POST["金額"]) ?>円(税抜)</p></td></tr>
      <input type="hidden" name="金額" value="<?php echo $_POST["金額"] ?>">
<?php   endif; ?>
<?php   if (isset($_POST["画像"])): ?>
      <tr><th colspan="2"><img src="<?php echo $_POST["画像"] ?>" alt="商品"></th></tr>
      <input type="hidden" name="画像" value="<?php echo $_POST["画像"] ?>">
<?php   endif; ?>
  </table>
  <button type="submit" formaction="index.php">商品を選び直すよ</button>
<?php  } ?>

<!-- →→→→→→→→→→→→→→→→→→→→→→住所入力フォーム→→→→→→→→→→→→→→→→→→→→→→ -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~Require項目が空白の場合以下フォーム、確定ボタンは表示されない~~~~~~~~~~~~~~~~~~~~~~ -->
<?php   if ( (empty($_POST['悩み']) || empty($_POST['金額'])) && isset($_POST["braceletBuy"])) {
          echo "上記必須項目を入力して下さい。";
        }else{?>
      <h2 class="">②入力内容がよろしければ以下の送付先を入力してください</h2>
      <section class="">
        <div class="">
          <table>
            <tr><th><label class="tag" for="size">・サイズ</label></th>
              <td><select required name="size"><option value="">-</option>
<?php for($size = 4;$size <= 30;$size++){
  if(isset($_POST["size"]) && $_POST["size"] == $size){
    echo '<option value="'.$size.'" selected="selected">'.$size.'</option>';
  }else{
    echo '<option value="'.$size.'" >'.$size.'</option>';
  }
}?></select>　cm</td></tr>
            <tr><th><label class="tag" for="surname">・氏名</label></th>
              <td><label for="surname">姓:<input required id="surname" type="text" name="name1" value="<?php if(isset($_POST["name1"])) echo $_POST["name1"]; ?>"></label>
                <label for="firstname">名:<input required id="firstname" type="text" name="name2" value="<?php if(isset($_POST["name2"])) echo $_POST["name2"]; ?>"></label></td>
              </tr>
              <tr>
                <th><label class="" for="post3">・郵便番号</label></th>
<!-- ~~~~~~~~~~~~~~~~~~~~~~郵便番号から住所自動入力~~~~~~~~~~~~~~~~~~~~~~ -->
                <td><input id="post3" type="text" name="zip11" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" value="<?php if(isset($_POST["zip11"])) echo $_POST["zip11"]; ?>"></td>
              </tr>
              <tr>
                <th><label class="" for="address">・住所</label></th>
                <td><input required id="address" type="text" name="addr11" size="60" value="<?php if(isset($_POST["addr11"])) echo $_POST["addr11"]; ?>"></td>
              </tr>
              <tr>
                <th><label class="" for="number">・電話番号</label></th>
                <td><input id="number" type="text" name="num" value="<?php if(isset($_POST["num"])) echo $_POST["num"]; ?>"></td>
              </tr>
              <tr>
                <th><label class="" for="mail">・メールアドレス</label></th>
                <td><input required id="mail" type="email" name="mail" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"]; ?>"></td>
              </tr>
              <tr>
                <th><button type="submit" name="btn_confirm" value="入力確認ボタン">入力内容を確認する</button></th>
              </tr>
            </table>
            <input type="hidden" name="token2" value="<?php echo $_SESSION['token2']; ?>">
          </form>
        </div>
      </div>
    </section>
<?php }?>


<!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓商品「表示」かつ住所「確認」画面↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~商品再選択ボタンは消失~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~$page_flag === 1の場合表示~~~~~~~~~~~~~~~~~~~~~~ -->
<?php }elseif($page_flag === 1){
  require_once('dataSet.php');
  echo $page_flag;?>
    <h1 class="">ご注文内容を確認し購入確定ボタンを押して下さい</h1>
<?php if (isset($_POST["選択商品"])) { ?>
  <form class="" action="entry.php" method="post">
    <h2>お選びいただいた商品</h2>
    <table>
<?php switch ($_POST["選択商品"]) {
        case 'ordermadeBracelet':?>
        <tr>
          <th><h3>ブレスレットのオーダーメード</h3></th>
        </tr>
        <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
        case 'priceBracelet':?>
        <tr>
          <th><h3>金額から選ぶ</h3></th>
        </tr>
        <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
        case 'distressBracelet':?>
        <tr>
          <th><h3>悩みから選ぶ</h3></th>
        </tr>
        <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
        case 'stoneBracelet':?>
        <tr>
          <th><h3>誕生石から選ぶ</h3></th>
        </tr>
        <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
        case 'necklace':?>
        <tr>
          <th><h3>開運ネックレス</h3></th>
        </tr>
        <input type="hidden" name="選択商品" value="<?php echo $_POST["選択商品"] ?>">
<?php   break;
        default:
        echo "<h2>ページが異なります</h2>";
        break;
} ?>
<?php   if (isset($_POST["誕生日"])): ?>
        <tr>
          <th><h3>誕生日：</h3></th><td><p><?php echo $_POST["誕生日"] ?></p></td>
        </tr>
        <input type="hidden" name="誕生日" value="<?php echo $_POST["誕生日"] ?>">
<?php   endif; ?>
<?php   if (isset($_POST["悩み"])): ?>
        <tr>
          <th><h3>悩み：</h3></th><td><p><?php echo $_POST["悩み"] ?></p></td>
        </tr>
        <input type="hidden" name="悩み" value="<?php echo $_POST["悩み"] ?>">
<?php   endif; ?>
<?php   if (isset($_POST["希望"])): ?>
        <tr>
          <th><h3>希望：</h3></th><td><p><?php echo $_POST["希望"] ?></p></td>
        </tr>
        <input type="hidden" name="希望" value="<?php echo $_POST["希望"] ?>">
<?php   endif; ?>
<?php   if (isset($_POST["金額"])): ?>
        <tr>
          <th><h3>価格：</h3></th><td><p><?php echo number_format($_POST["金額"]) ?>円(税抜)</p></td>
        </tr>
        <input type="hidden" name="金額" value="<?php echo $_POST["金額"] ?>">
<?php   endif; ?>
<?php   if (isset($_POST["画像"])): ?>
        <tr>
          <th><img src="<?php echo $_POST["画像"] ?>" alt="商品"></th>
        </tr>
        <input type="hidden" name="画像" value="<?php echo $_POST["画像"] ?>">
<?php   endif; ?>
    </table>
<?php   }else {
        echo "<h2>商品が選ばれていません</h2>";
      }?>
<!-- →→→→→→→→→→→→→→→→→→→→→→住所入力確認→→→→→→→→→→→→→→→→→→→→→→ -->
    <h2>ご注文者様送付先</h2>
    <section class="">
      <div class="">
          <table>
              <tr><th><label class="tag" for="size">・サイズ</label></th>
                <td><?php echo inputRequired($_POST["size"]) ?>　cm</td>
                <input type="hidden" name="size" value="<?php echo $_POST["size"] ?>">
              </tr>
              <tr>
                <th><label class="tag" for="surname">・氏名</label></th>
                <td><label for="surname">姓: <span><?php echo inputRequired(h($_POST["name1"])) ?></span></label>
                  <label for="firstname">名: <span><?php echo inputRequired(h($_POST["name2"])) ?></span></label></td>
                  <input type="hidden" name="name1" value="<?php echo h($_POST["name1"]) ?>">
                  <input type="hidden" name="name2" value="<?php echo h($_POST["name2"]) ?>">
              </tr>
              <tr>
                <th><label class="" for="post3">・郵便番号</label></th>
<!-- ~~~~~~~~~~~~~~~~~~~~~~郵便番号から住所自動入力~~~~~~~~~~~~~~~~~~~~~~ -->
                <td><p><?php echo postalCodeValidation(h($_POST["zip11"])) ?></p></td>
                <input type="hidden" name="zip11" value="<?php echo h($_POST["zip11"]) ?>">
              </tr>
              <tr>
                <th><label class="" for="address">・住所</label></th>
                <td><?php echo inputRequired(h($_POST["addr11"])) ?></td>
                <input type="hidden" name="addr11" value="<?php echo h($_POST["addr11"]) ?>">
              </tr>
              <tr>
                <th><label class="" for="number">・電話番号</label></th>
                <td><?php echo phoneNumValidation(h($_POST["num"])) ?></td>
                <input type="hidden" name="num" value="<?php echo h($_POST["num"]) ?>">
              </tr>
              <tr>
                <th><label class="" for="mail">・メールアドレス</label></th>
                <td><?php echo mailValidation(h($_POST["mail"])) ?></td>
                <input type="hidden" name="mail" value="<?php echo h($_POST["mail"]) ?>">
              </tr>
              <tr>
                <th><button type="submit" formaction="entry.php">住所を書き直すよ</button></th>

<!-- ~~~~~~~~~~~~~~~~~~~~~~Require項目が空白の場合以下購入確定ボタンを表示させない~~~~~~~~~~~~~~~~~~~~~~ -->
                <?php if(empty($_POST["size"]) || empty(h($_POST["name1"])) || empty(h($_POST["name2"])) || empty(h($_POST["addr11"])) || empty(h($_POST["num"])) || empty(h($_POST["mail"])) ){
                  echo '<th><h2>上記必須項目を入力してください</h2></th>';
                }else{
                  echo '<th><button type="submit" name="btn_submit">購入確定ボタン</button></th>';
                }?>
              </tr>
            </table>
          </form>
        </div>
      </section>


<!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ここから注文終了画面↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~$page_flag === 2の場合表示~~~~~~~~~~~~~~~~~~~~~~ -->
<?php }elseif($page_flag === 2){
  echo $page_flag;?>
  <h1 class="">ご注文ありがとうございます。</h1>
<?php } ?>

  <footer>
    <div class="">ヤマサン</div>
    <div class="">
      <a class="" href="index.php#ac" target="_blank">アクセス</a>
      <a class="" href="index.php#qs" target="_blank">お問い合わせ</a>
    </div>
  </footer>

</body>
</html>
