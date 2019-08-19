<?php
require_once('menu.php');

// ここからはブレスレットの金額から選ぶ
$BraceletPrice3 = new BraceletMenu('BraceletPrice3',3000,'','','','');
$BraceletPrice5 = new BraceletMenu('BraceletPrice5',5000,'','','','');
$BraceletPrice7 = new BraceletMenu('BraceletPrice7',7000,'','','','');
$BraceletPrice10 = new BraceletMenu('BraceletPrice10',10000,'','','','');
$BraceletPrice30 = new BraceletMenu('BraceletPrice30',30000,'','','','');
$BraceletPrice100 = new BraceletMenu('BraceletPrice100',100000,'','','','');
$BraceletPriceMenus = array($BraceletPrice3,$BraceletPrice5,$BraceletPrice7,$BraceletPrice10,$BraceletPrice30,$BraceletPrice100);
// ここからはブレスレットの悩みから選ぶ
$BraceletLove = new BraceletMenu('fromLove',10000,'','恋愛運アップ','','');
$BraceletGold = new BraceletMenu('fromGold',10000,'','金運アップ','','');
$BraceletFight = new BraceletMenu('fromFight',10000,'','勝負運アップ','','');
$BraceletHealth = new BraceletMenu('fromHealth',10000,'','健康運アップ','','');
$BraceletPurify = new BraceletMenu('fromPurify',10000,'','浄化','','');
$BraceletDestressMenus = array($BraceletLove,$BraceletGold,$BraceletFight,$BraceletHealth,$BraceletPurify);
//ここからはブレスレットの誕生石から選ぶ
$BraceletJanuary = new BraceletMenu('fromJanuary',10000,'image/029-garnet2.png','',1,'ガーネット');
$BraceletFebruary = new BraceletMenu('fromFebruary',10000,'image/011-amethyst2.png','',2,'アメジスト');
$BraceletMarch = new BraceletMenu('fromMarch',10000,'image/003-aquamarine2.png','',3,'アクアマリン');
$BraceletApril = new BraceletMenu('fromApril',10000,'image/quartz-art-cate-266.jpg','',4,'水晶');
$BraceletMay = new BraceletMenu('fromMay',10000,'image/164-jade2.png','',5,'翡翠（ヒスイ）');
$BraceletJune = new BraceletMenu('fromJune',10000,'image/050-moonstone2.jpg','',6,'ムーンストーン');
$BraceletJuly = new BraceletMenu('fromJuly',10000,'image/023-carnelian2.png','',7,'カーネリアン');
$BraceletAugust = new BraceletMenu('fromAugust',10000,'image/063-sard-onyx2.png','',8,'オニキス');
$BraceletSeptember = new BraceletMenu('fromSeptember',10000,'image/rapis-art-cate-403.jpg','',9,'ラピスラズリ');
$BraceletOctober = new BraceletMenu('fromOctober',10000,'image/055-rose-quartz2.jpg','',10,'ローズクォーツ');
$BraceletNovember = new BraceletMenu('fromNovember',10000,'image/028-citrine2.png','',11,'シトリン');
$BraceletDecember = new BraceletMenu('fromDecember',10000,'image/072-turquoise2.png','',12,'ターコイズ');
$BraceletMonthMenus = array($BraceletJanuary,$BraceletFebruary,$BraceletMarch,$BraceletApril,$BraceletMay,$BraceletJune,$BraceletJuly,$BraceletAugust,$BraceletSeptember,$BraceletOctober,$BraceletNovember,$BraceletDecember);
// ここからはネックレスメニュー
$NecklacePrice3 = new NecklaceMenu(30000,'image/gahag-0091622384-1.jpg','心を込めてお作りしています。','一番安いプラン','ネックレス3');
$NecklacePrice6 = new NecklaceMenu(60000,'image/gahag-0091622384-1.jpg','心を込めてお作りしています。','中間のプラン','ネックレス6');
$NecklacePrice15 = new NecklaceMenu(150000,'image/gahag-0091622384-1.jpg','心を込めてお作りしています。','一番高いプラン','ネックレス15');
$NecklaceMenus = array($NecklacePrice3,$NecklacePrice6,$NecklacePrice15);




// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ここから関数定義↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓金額に単位をつける関数↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function putOnSenMan($price){
    if(isset($price) && ctype_digit($price)){
      $digit = strlen($price);
      if($digit == 4){
        $price = ($price / 1000).'千';
        return $price;
      }elseif($digit >= 5){
        $price = ($price / 10000).'万';
        return $price;
      }else{
        return $price;
      }
    }
}

// ~~~~~~~~~~~~~~~~~~~~~~金額に点をつける関数　number_format — 数字を千位毎にグループ化してフォーマットする　英語での表記 (デフォルト)　$english_format_number = number_format($number);　ー＞1,235~~~~~~~~~~~~~~~~~~~~~~

// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓XSSエスケープ処理、注意contactSendにも記述あり↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function h($form_text){
  if(isset($form_text)){
    $form_text = htmlspecialchars($form_text, ENT_QUOTES, 'UTF-8');
    return $form_text;
  }
}
// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓必須入力項目エラー表示↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
$err = null;
function inputRequired($text){
  if($text){
    return $text;
  }else{
    $err = '必須項目です';
    return $err;
  }
}



// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓バリデーション関数↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

// →→→→→→→→→→→→→→→→→→→→→→メール必須項目付き→→→→→→→→→→→→→→→→→→→→→→
function mailValidation($text){
  if(empty($text)) {
		$err = "「メールアドレス」は必ず入力してください。";
    return $err;
	}elseif(!preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $text)) {
		$err = "「メールアドレス」は正しい形式で入力してください。";
    return $err;
	}else{
    return $text;
  }
}

// →→→→→→→→→→→→→→→→→→→→→→電話番号必須項目付き→→→→→→→→→→→→→→→→→→→→→→
function phoneNumValidation($text){
  if(empty($text)) {
		$err = "「電話番号」は必ず入力してください。";
    return $err;
	}elseif(!preg_match("/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/", $text)) {
		$err = "「電話番号」は正しい形式で入力してください。";
    return $err;
	}else{
    return $text;
  }
}

// →→→→→→→→→→→→→→→→→→→→→→郵便番号必須項目付き→→→→→→→→→→→→→→→→→→→→→→
function postalCodeValidation($text){
  if(empty($text)) {
		$err = "「郵便番号」は必ず入力してください。";
    return $err;
	}elseif(!preg_match("/^([0-9]{3}-[0-9]{4})?$|^[0-9]{7}+$/", $text)) {
		$err = "「郵便番号」は正しい形式で入力してください。";
    return $err;
	}else{
    return $text;
  }
}


?>
