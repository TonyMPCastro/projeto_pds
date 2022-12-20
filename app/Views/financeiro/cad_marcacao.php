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

if (isset($this->dados['servico'])) {
    $servico = $this->dados['servico'];
} else {
    $servico = [];
}

if (isset($this->dados['users'])) {
    $users = $this->dados['users'];
} else {
    $users = [];
}

if (isset($this->dados['forma_pagamentos'])) {
    $forma_pagamentos = $this->dados['forma_pagamentos'];
} else {
    $forma_pagamentos = [];
}



?>

<?php include "app/Views/menu_footer/menu.php"; ?>

<style>
    .js-example-basic-single {
        border: 1px solid black;
    }
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
        >
        <a href="<?php echo URL . 'agendados/onShow' ?>" class="menu-link"><span>AGENDAMENTO DE HORÁRIO</span></a>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <strong> AGENDAMENTO DE HORÁRIO</strong>
                <div class="float-right">
                    <a href="<?php echo URL . 'agendados/index' ?>" class="btn btn-light">VOLTAR</a>
                </div>
            </div>

            <form class="row g-3 needs-validation" method="POST" action="<?php echo URL . 'agendados/onSave' ?>">
                <div class="card-body">


                    <div class="row">
                        <label class="col-sm-12 text-left control-label col-form-label">Cliente: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-12 input-group has-validation">
                                    <select class="form-control js-example-basic-single" name="cliente" id="select-busca1">
                                        <?php if ($users) {
                                            foreach ($users as $user) { ?>
                                                <option value="<?= $user->id_user ?>" <?php echo isset($servico->user_id) ? (($servico->user_id == $user->id_user) ? "selected" : "") : ""; ?>><?= $user->nome_user ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-4 col-lg-4">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Forma Pagamento: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                                <div class="col-sm-12 input-group has-validation">
                                    <select class="form-control js-example-basic-single" name="forma_pagamento_id" id="select-busca2">

                                        <?php if ($forma_pagamentos) {
                                            foreach ($forma_pagamentos as $f_pag) { ?>
                                                <option value="<?= $f_pag->id ?>" <?php echo isset($servico->forma_pagamento_id) ? (($servico->forma_pagamento_id == $f_pag->id) ? "selected" : "") : ""; ?>><?= $f_pag->nome ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 text-left control-label col-form-label">Status:</label>
                                <div class="col-sm-12 input-group has-validation">
                                    <select class="form-control js-example-basic-single" name="status" id="select-busca3">
                                        <option value="1" <?php echo isset($servico->status) ? (($servico->status ==  1) ? "selected" : "") : ""; ?>>AGURDANDO</option>
                                        <option value="2" <?php echo isset($servico->status) ? (($servico->status ==  2) ? "selected" : "") : ""; ?>>AGENDADO</option>
                                        <option value="3" <?php echo isset($servico->status) ? (($servico->status ==  3) ? "selected" : "") : ""; ?>>CONCLUIDO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Data e Hora do Antendimento: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                                <div class="col-sm-12 input-group has-validation">
                                    <input type="datetime-local" class="form-control" id="horario_agendado" name="horario_agendado" value="<?php echo isset($servico->horario_agendado) ?$servico->horario_agendado : ""; ?>" placeholder="" required>

                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($servico->id) ? $servico->id : ""; ?>">
                    </div>


                    <div class="row">
                        <label class="col-sm-12 text-left control-label col-form-label">Horários: <span style="color: red;" data-uw-styling-context="true">*</span></label>
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
                                                                <input class="form-check-input" type="radio" id="horario" name="horario" value="<?= $h->id; ?>" required <?php echo isset($servico->horarios_id) ? (($h->id == $servico->horarios_id) ? 'checked' : '') : ""; ?>>
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
                        <label class="col-sm-12 text-left control-label col-form-label">Procedimentos: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group row">

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
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary mr-2">SALVAR</button>
                    </div>
                </div>
            </form>
            <h2 style=" background-color: #ffdcc5;" class="mb-1 mb-sm-0"><label class="col-sm-12 text-center control-label col-form-label">Horários</label></h2>

            <div class="card-body">

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

                                            if ($d_semana2 == $d) { ?>
                                                <div class="form-check">
                                                    <label class="form-check-label" style="border: solid;">
                                                        <?php echo $a->nome_user . "<br>" . date("d/m/Y H:i", strtotime($a->horario_agendado)); ?>
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
</div>


<?php include "app/Views/menu_footer/footer.php"; ?>



<script>
    $(document).ready(function() {
        $('#select-busca1').select2();
        $('#select-busca2').select2();
        $('#select-busca3').select2();
    });
</script>