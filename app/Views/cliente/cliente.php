<?php

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
if (isset($this->dados['menu'])) {
    $menu = $this->dados['menu'];
}

if (isset($this->dados['lista_em_abertas'])) {
    $lista_em_abertas = $this->dados['lista_em_abertas'];
}
?>
<?php include "app/Views/menu_footer/menu.php"; 

?>

<pre>
<?php


print_r($lista_em_abertas)
?>

</pre>

<!-- partial -->


<?php include "app/Views/menu_footer/footer.php"; ?>