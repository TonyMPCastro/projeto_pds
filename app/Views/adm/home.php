<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}

if (isset($this->dados['semanas'])) {
  $semanas = $this->dados['semanas'];
} else {
  $semanas = [];
}


if (isset($this->dados['agendamentos'])) {
  $agendamentos = $this->dados['agendamentos'];
} else {
  $agendamentos = [];
}
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

?>

<?php include "app/Views/menu_footer/menu.php"; ?>


<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
  <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i>Home</a>
    <br>
    <br>

    <h2 style="border: solid #d9d3c7 ; background-color: #ffdcc5;" class="mb-1 mb-sm-0"><label class="col-sm-12 text-center control-label col-form-label">Horários</label></h2>

    <div class="card-body" >

      <div class="row" style="background-color:#ffdcc5;">

        <?php 
        if ($semanas) {
          foreach ($semanas as $s) {
            $d_semana = mb_strtoupper(utf8_encode(strftime("%A", strtotime(date("Y-m-d")))), 'UTF-8');
            $d = mb_strtoupper($s->dia, 'UTF-8');
        ?>
            <div class="col-sm-6 col-lg-2" <?php if ($d_semana == $d) {
                                              echo 'style="background-color: #d9d3c7;"';
                                            } ?>>
              <div class="form-group row">
                <label class="col-sm-12 text-left control-label col-form-label"><?php echo $d; ?></label>
                <div class="col-sm-12  has-validation">
                  <?php 
                    foreach ($agendamentos as $a) {
                      $d_semana2 = mb_strtoupper(utf8_encode(strftime("%A", strtotime($a->horario_agendado))), 'UTF-8');

                      if($d_semana2 == $d) { ?>
                        <div class="form-check">
                          <label class="form-check-label" style="border: solid;">
                            <?php echo $a->nome_user."<br>".date("d/m/Y H:i",strtotime($a->horario_agendado)) ; ?>
                          </label>
                        </div>
                  <?php
                      
                    }
                  } ?>
                </div>
              </div>
            </div>

        <?php }
        } ?>
      </div>
    </div>

  </div>
</div>

<?php include "app/Views/menu_footer/footer.php"; ?>

<script>
  //toastr.success("Hello World!");
</script>