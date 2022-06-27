<?php 
require_once "class.php";
require_once "vetement.php";
require_once "chaussure.php";
require_once "PrixException.php";
require_once "QteException.php";

// public function __construct( $ref, $desc, $size, $prix, $qte )

$panier = [];
$panier[] =  new Vetement('REF0001', 'Jean Levis','M', 90, 3);
$panier[] = new Chaussure('REF87888', 'Converses Rouges', '38', 85, '38',6);

foreach($panier as $index=>$item){
    try{
        if ($index == 0){
            $item->setPrix (-1); 
        }else{
            $item->setQte (-1);
        }
    }catch (PrixException $e){
        echo $e->getMessage();
    }catch (QteException $e){
        echo $e->getMessage();

}
}
echo $panier[0]->afficherProduit();
echo $panier[1]->afficherProduit();

?>