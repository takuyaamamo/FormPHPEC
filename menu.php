<?php
// ここからブレスレットを選ぶ
class BraceletMenu{
  private $name;
  private $price;
  private $image;
  private $distress;
  private $birthMonth;
  private $stone;
  public function __construct($name, $price, $image, $distress,$birthMonth,$stone){
    $this -> name = $name;
    $this -> price = $price;
    $this -> image = $image;
    $this -> distress = $distress;
    $this -> birthMonth = $birthMonth;
    $this -> stone = $stone;
  }
	public function getName(){
		return $this -> name;
	}
	public function getPrice(){
		return $this -> price;
	}
	public function getImage(){
    return $this -> image;
	}
	public function getDestress(){
    return $this -> distress;
	}
	public function getBirthMonth(){
    return $this -> birthMonth;
	}
	public function getStone(){
    return $this -> stone;
	}
}


// ここからネックレスを選ぶ
class NecklaceMenu{
  private $price;
  private $image;
  private $p1;
  private $p2;
  private $name;
  public function __construct($price, $image, $p1, $p2, $name){
    $this -> price = $price;
    $this -> image = $image;
    $this -> p1 = $p1;
    $this -> p2 = $p2;
    $this -> name = $name;
  }
  public function getPrice(){
    return $this->price;
  }
  public function getImage(){
    return $this->image;
  }
  public function getP1(){
    return $this->p1;
  }
  public function getP2(){
    return $this->p2;
  }
  public function getName(){
    return $this->name;
  }
}
?>
