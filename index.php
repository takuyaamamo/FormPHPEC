<?php session_start();
// →→→→→→→→→→→→→→→→→→→→→→entry.phpのトークン除去→→→→→→→→→→→→→→→→→→→→→→
if( isset($_SESSION['token1']) || isset($_SESSION['token2']) ){
  unset( $_SESSION['token1'],$_SESSION['token2'] );
};
// →→→→→→→→→→→→→→→→→→→→→→トークン生成→→→→→→→→→→→→→→→→→→→→→→
if( empty($_SESSION['token1']) ){
  $_SESSION['token1'] = bin2hex(openssl_random_pseudo_bytes(16));
};?>



<!DOCTYPE html>
<html>
<head lang="ja">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <meta name="format-detection" content="telephone=no">
  <title>ヤマサントップページ</title>
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" media="(max-width: 480px)" href="css/phonesstylesheet.css">
  <?php require_once('dataSet.php'); ?>
</head>
<body>


  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓トップ部分のロゴ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
  <div class="headerTopLogo">
    <img class="" src="image/yamasanlogotext.png" alt="ヤマサントップページのロゴ">
  </div>




  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓テレポートヘッダー↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
  <header class="PCDisplay">
    <nav>
      <ul>
        <li><a class="teleportButton" href="#top">TOP</a></li>
        <li><a class="teleportButton" href="#om">開運ブレスレット</a></li>
        <li><a class="teleportButton" href="#fn">リンク</a></li>
        <li><a class="teleportButton" href="#ac">アクセス</a></li>
        <li><a class="teleportButton" href="mailto:iamaama703&#64;gmail.com?subject=やまさんへのお問い合わせ&amp;body=お問い合わせ内容をご記入下さい。">お問い合わせ</a></li>
      </ul>
    </nav>
  </header>



  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓トップ画像↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
  <section class="topImg MaterialShadow" id="top">
    <div class="">
      <!-- →→→→→→→→→→→→→→→→→→→→→→背景→→→→→→→→→→→→→→→→→→→→→→ -->
      <!-- <img src="image/shige0713064_TP_V.jpg" alt="" width="100%"> -->
      <!-- →→→→→→→→→→→→→→→→→→→→→→テキスト→→→→→→→→→→→→→→→→→→→→→→ -->
      <div class="topText">
        <h1>世界で一つの<span>開運</span>ブレスレット</h1>
        <p>一人ひとり心を込めてお作りします</p>
        <!-- 背景ビデオの中心に配置、背景ビデオが終わると説明文 -->
      </div>
    </div>
  </section>



  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ナビ1↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
  <nav id="om">
    <div class="NavigationIcon">
      <img src="image/moremark.png" alt="下にあるよのマーク">
      <img src="image/moretext.png" alt="下にあるよのテキスト">
    </div>
    <div class="NavigationText">
      <h1>開運ブレスレット</h1>　
    </div>
  </nav>



  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓オーダーメードブレスレット↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
  <section class="Blacelet MaterialShadow">
    <header>
      <h1 class="sectionTitle"><span>「</span> 世界で一つの開運ブレスレット <span>」</span></h1>
      <p>あなたのご希望に合わせて運気を上げるオリジナルブレスレットをお作りします。</p>
      <p>金額により使用する石が異なりますが、1点1点心を込めて手作りしております。</p>
    </header>


    <!-- →→→→→→→→→→→→→→→→→→→→→→オーダーメードブレスレット→→→→→→→→→→→→→→→→→→→→→→ -->
    <div class="Ordermade">
      <!-- <h2>＜ オーダーメード ＞</h2> -->
      <h3>注文方法</h3>
      <ol class="HowToOrder">
        <li>下記項目を入力して下さい。</li>
        <li>送信ボタンを押して下さい。</li>
        <li>次のページで送付先を入力して下さい。</li>
      </ol>
      <h3>注意</h3>
      <ol class="HowToOrder">
        <li>全ての項目を埋めて下さい</li>
        <li>装着する御本人様の情報を入力して下さい</li>
        <li>商品は全て代引きでございます</li>
      </ol>


      <!-- →→→→→→→→→→→→→→→→→→→→→→オーダーメードフォーム→→→→→→→→→→→→→→→→→→→→→→ -->
      <form class="OrderForm" action="entry.php" method="post">


        <!-- →→→→→→→→→→→→→→→→→→→→→→トークンセット1→→→→→→→→→→→→→→→→→→→→→→ -->
        <input type="hidden" name="token1" value="<?php echo h($_SESSION['token1']);?>">
        <h3>生年月日（装着者）</h3>
        <div class="FormBirth"><!-- もとはpだった-->
          <div class="cp_ipselect cp_sl02">
            <select name="year">
              <option value="">-</option>
              <?php for($year = 1900;$year <= 2030;$year++){
                echo "<option value='{$year}'>{$year}</option>";
              } ?>
            </select>
          </div>
          <span>年</span>
          <div class="cp_ipselect cp_sl02">
            <select name="month">
              <option value="">-</option>
              <?php for($month = 1;$month <= 12;$month++){
                echo "<option value='{$month}'>{$month}</option>";
              } ?>
            </select>
          </div>
          <span>月</span>
          <div class="cp_ipselect cp_sl02">
            <select name="day">
              <option value="">-</option>
              <?php for($day = 1;$day <= 31;$day++){
                echo "<option value='{$day}'>{$day}</option>";
              } ?>
            </select>
          </div>
          <span>日</span>
        </div>
        <h3>悩みをたくさんお聞かせ下さい</h3>
        <textarea required name="悩み" rows="8" cols="80" placeholder="（例）主婦をしておりますが毎日毎日夕食の献立を考えるのが大変です。夫に何を食べたいか聞いても「何でも良い」としか答えてくれません。もう夕食を作りたくありません。"><?php if(isset($_POST["悩み"])) echo $_POST["悩み"]; ?></textarea>
        <h3>希望をたくさんお聞かせ下さい</h3>
        <textarea name="希望" rows="8" cols="80" placeholder="（例）献立のアイデアが毎日溢れ出てくるようなやる気の出るブレスレットが欲しいです。" ><?php if(isset($_POST["希望"])) echo $_POST["希望"]; ?></textarea>
        <h3>価格をお選び下さい</h3>
        <section class="radio" >
          <input required type="radio" name="金額" value="3000" id="price1">
          <label for="price1">3千円</label>
          <input type="radio" name="金額" value="5000" id="price2">
          <label for="price2">5千円</label>
          <input type="radio" name="金額" value="7000" id="price3">
          <label for="price3">7千円</label>
          <input type="radio" name="金額" value="10000" id="price4">
          <label for="price4">1万円</label>
          <input type="radio" name="金額" value="30000" id="price5">
          <label for="price5">3万円</label>
        </section>
        <h3>入力内容がよろしければ購入ボタンを押して下さい</h3>
        <button class="" type="submit" name="braceletBuy" value="braceletBuy">購入する</button>
      </form>
    </div>

  </section>



  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ナビ2↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
  <nav id="fn">
    <div class="NavigationIcon">
      <img src="image/moremark.png" alt="下にあるよのマーク">
      <img src="image/moretext.png" alt="下にあるよのテキスト">
    </div>
    <div class="NavigationText">
      <h1>リンク</h1>　
    </div>
  </nav>




  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓リンク↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
  <section class="MaterialShadow" >
    <h1 class="sectionTitle"><span>「</span> 親しい方のWEBサイト <span>」</span></h1>
    <div class="">
      <ul class="linkList">
        <li>
           <a class="List" href="https://www.google.com">
             <img src="image/Google.jpg" alt="Googleのサイト">
             <p>Googleのサイトです。</p>
           </a>
        </li>
        <li>
          <a class="List" href="https://www.apple.com/">
            <img src="image/Apple.jpg" alt="Appleのサイト">
            <p>Appleのサイトです。</p>
          </a>
        </li>
        <li>
          <a class="List" href="https://www.yahoo.co.jp/">
            <img src="image/Yahoo.png" alt="Yahooのサイト">
            <p>Yahooのサイトです。</p>
          </a>
        </li>
      </ul>
    </div>
  </section>



  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ナビ3↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ -->
  <nav id="ac">
    <div class="NavigationIcon">
      <img src="image/moremark.png" alt="下にあるよのマーク">
      <img src="image/moretext.png" alt="下にあるよのテキスト">
    </div>
    <div class="NavigationText">
      <h1>アクセス</h1>　
    </div>
  </nav>



  <!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓アクセス↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓-->
  <section class="MaterialShadow">
    <h1 class="sectionTitle"><span>「</span> アクセス <span>」</span></h1>
    <dl class="Address">
      <dt>郵便番号</dt>
      <dd>〒124-0002</dd>
      <dt>住所</dt>
      <dd>東京都葛飾区西亀有2-33-8メルベーユ綾瀬102</dd>
      <dt>電話番号</dt>
      <dd>080-9447-7926</dd>
    </dl>
    <div class="mapStyle">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.62931522583!2d139.83237686512723!3d35.759914780176075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188fbd5b0e3cd9%3A0x274c3dbc42b93890!2z44CSMTI0LTAwMDIg5p2x5Lqs6YO96JGb6aO-5Yy66KW_5LqA5pyJ77yS5LiB55uu77yS77yY4oiS77yYIOilv-S6gOacieS6jOS4geebruesrO-8ke-8mOOCouODkeODvOODiO-8mA!5e0!3m2!1sja!2sjp!4v1531871469293"></iframe>
    </div>
<!-- 本マップではグーグルマイマップを作成予定 -->
  <div class="trainAccess">
    <h2>●　電車でお越しの方</h2>
    <ul>
      <li>上野駅から徒歩</li>
      <li>御徒町駅から徒歩5分</li>
    </ul>
  </div>
  <div class="carAccess">
    <h2>●　車でお越しの方</h2>
    <ul>
      <li>松坂屋上野店</li>
      <p>おすすめです</p>
    </ul>
  </div>
  </section>




<!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓フッター↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓-->

  <footer>
    <nav>
      <img class="" src="image/yamasanlogotext.png" alt="ヤマサントップページのロゴ">
      <!-- <div class=""> -->
        <a class="teleportButton" href="profile.html">会社概要</a>
      <!-- </div> -->
    </nav>
  </footer>


<!-- ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ハンバーガーメニュー↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓-->

  <nav id="hamburger">
    <a id="menu-trigger">
      <span></span>
      <span></span>
      <span></span>
    </a>
    <ul id="hamburgerMenu">
      <li><a class="teleportButton" href="#top">TOP</a></li>
      <li><a class="teleportButton" href="#om">開運ブレスレット</a></li>
      <li><a class="teleportButton" href="#fn">リンク</a></li>
      <li><a class="teleportButton" href="#ac">アクセス</a></li>
      <li><a class="teleportButton" href="mailto:iamaama703&#64;gmail.com?subject=やまさんへのお問い合わせ&amp;body=お問い合わせ内容をご記入下さい。">お問い合わせ</a></li>
    </ul>
  </nav>


  <script type="text/javascript">
    'use strict';
    {
      const menuTrigger = document.getElementById('menu-trigger');
      const hamburgerMenu = document.getElementById('hamburgerMenu');

      function getScrolled() {
       return ( window.pageYOffset !== undefined ) ? window.pageYOffset: document.documentElement.scrollTop;
      }

      window.onscroll = function() {
        console.log(getScrolled());
        if( getScrolled() >= 180 ) {
          menuTrigger.classList.remove('hide');
        } else {
          menuTrigger.classList.add('hide');
        }
      };

      menuTrigger.addEventListener('click',() => {
        menuTrigger.classList.toggle('active');
        hamburgerMenu.classList.toggle('active');
      });
    }
  </script>
</body>
</html>
