<?php

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}


if (isset($this->dados['servico'])) {
    $servico = $this->dados['servico'];
} else {
    $servico = [];
}

if (isset($this->dados['semanas'])) {
    $semanas = $this->dados['semanas'];
} else {
    $semanas = [];
}

if (isset($this->dados['horarios'])) {
    $horarios = $this->dados['horarios'];
} else {
    $horarios = [];
}

if (isset($this->dados['servicos'])) {
    $servicos = $this->dados['servicos'];
} else {
    $servicos = [];
}

?>


<?php require_once("app/Views/menu_footer/menu.php"); ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <a href="<?php echo URL . 'home2/index' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
        >
        <a href="<?php echo URL . 'home2/onShow' ?>" class="menu-link"><span>MARCAÇÃO DE SERVIÇO</span></a>

        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <strong> Cadastro de Pagamentos</strong>
                <div class="float-right">
                    <a href="<?php echo URL . 'home2/index' ?>" class="btn btn-light">VOLTAR</a>
                </div>
            </div>
            <form class="row g-3 needs-validation" method="POST" action="<?php echo URL . 'home2/onSave' ?>">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-12 text-left control-label col-form-label">Horario: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                        <?php if ($semanas) {
                            foreach ($semanas as $s) {
                        ?>
                                <div class="col-sm-2 col-lg-2">
                                    <div class="form-group row">
                                        <label class="col-sm-12 text-left control-label col-form-label"><?php echo $s->dia; ?></label>
                                        <div class="col-sm-12  has-validation">
                                            <?php if ($horarios) {
                                                foreach ($horarios as $h) {
                                                    if ($h->semana_id == $s->id) { ?>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio" id="horario" name="horario" value="<?= $h->id; ?>" required 
                                                                <?php echo isset($servico->horarios_id) ? (($h->id == $servico->horarios_id) ? 'checked' : '') : ""; ?>>
                                                                <?php echo isset($h->horario) ? $h->horario  : ""; ?>
                                                            </label>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                </div>

                        <?php }
                        } ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group row">
                                <label class="col-sm-12 text-left control-label col-form-label">Procedimentos: <span style="color: red;" data-uw-styling-context="true">*</span></label>

                                <?php

                                if (isset($servico->servicos)) {
                                    $arr = explode(";", $servico->servicos);
                                }

                                if ($servicos) {
                                    foreach ($servicos as $s) {
                                ?>
                                        <div class="form-check form-check-inline">
                                            <label class="">
                                                <input class="form-check-input" type="checkbox" name="id_<?php echo $s->id; ?>" id="inlineCheckbox" value="<?php echo $s->id; ?>" <?php echo isset($servico->servicos) ? ((in_array($s->id, $arr)) ? 'checked' : '') : ""; ?>>
                                                <b><?php echo $s->nome . " - " . number_format($s->valor, 2, ",", "."); ?></b>
                                            </label>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($servico->id) ? $servico->id : ""; ?>">


                        <!-- <textarea rows="20" class="form-control" id="id" name="id">
                        </textarea> -->

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary mr-2">SALVAR</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<?php require_once("app/Views/menu_footer/footer.php"); ?>