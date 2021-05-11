<?php 


// 親クラス・基底クラス・ベースクラス・スーパークラス
class BaseProduct {

    public function echoProduct() {
        echo "親クラスです";
    }

    // オーバライド(上書き)
    public function getProduct() {
        echo "親クラスの関数です";

    }

}


// 子クラス・派生クラス・サブクラス
class Product extends BaseProduct {


    // アクセス修飾子, private, public, protected(自分と継承したクラス)

    // 変数
    private $product = [];

    // 関数
    // クラスを呼び出した初回　__construct
    // $this = このクラスの中の... 例 $this -> product このクラスの中のproduct
    function __construct($product){

        $this-> product = $product;
    }

    public function getProduct() {
        echo $this -> product;

    }

    // .= 追加する

    public function addProduct($item) {
        $this->product .= $item;
    }

    public static function getStaticProduct($str) {
        echo $str;
    }
}

$instance = new Product("テスト");

var_dump($instance);

$instance->getProduct();
echo "<br>";

// 親クラスのメソッド
$instance->echoProduct();
echo "<br>";

$instance->addProduct("追加分");
echo "<br>";

$instance->getProduct();
echo "<br>";

// 静的 クラス名::
Product::getStaticProduct("静的");
echo "<br>";