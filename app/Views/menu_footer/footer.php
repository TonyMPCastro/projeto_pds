<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo URL . 'app/assets/vendors/js/vendor.bundle.base.js'; ?>"></script>
<!-- endinject -->

<!-- inject:js -->
<script src="<?php echo URL . 'app/assets/js/off-canvas.js'; ?>"></script>
<script src="<?php echo URL . 'app/assets/js/hoverable-collapse.js'; ?>"></script>
<script src="<?php echo URL . 'app/assets/js/misc.js'; ?>"></script>
<script src="<?php echo URL . 'app/assets/js/settings.js'; ?>"></script>
<script src="<?php echo URL . 'app/assets/js/todolist.js'; ?>"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?php echo URL . 'app/assets/js/dashboard.js'; ?>"></script>


<!-- End custom js for this page -->
</body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
  $(document).ready(function() {


    toastr.options = {
      "closeButton": true,
      "newestOnTop": false,
      "progressBar": true,
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "600",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    <?php

    if (isset($table)) {
    ?>
      $('#example<?= $table; ?>').DataTable({
        "order": [],
        "columnDefs": [{
          "targets": 'no-sort',
          "orderable": false
        }],
        "language": {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Exibir _MENU_ registros por página",
          "sZeroRecords": "Nenhum resultado encontrado",
          "sEmptyTable": "Nenhum resultado encontrado",
          "sInfo": "Exibindo do _START_ até _END_ de um total de _TOTAL_ registros",
          "sInfoEmpty": "Exibindo do 0 até 0 de um total de 0 registros",
          "sInfoFiltered": "(Filtrado de um total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Próximo",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Ativar para ordenar a columna de maneira ascendente",
            "sSortDescending": ": Ativar para ordenar a columna de maneira descendente"
          }
        }
      });
    <?php }  ?>
  });
</script>

<?php

if (isset($this->dados['status'])) {

  if ($this->dados['status'] == 's') {
    echo "<script>
        toastr.success('Salvo com sucesso');
      </script>";
  }

  if ($this->dados['status'] == 'a') {
    echo "<script>
        toastr.success('Alterado com sucesso');
      </script>";
  }

  if ($this->dados['status'] == 'd') {
    echo "<script>
        toastr.success('Deletado com sucesso');
      </script>";
  }

  if ($this->dados['status'] == 'd_n') {
    echo "<script>
          toastr.warning('Erro: Não foi possivel deletar');
        </script>";
  }

  if ($this->dados['status'] == 's_n') {
    echo "<script>
          toastr.warning('Erro: Não foi possivel salvar');
        </script>";
  }

  if ($this->dados['status'] == 'a_n') {
    echo "<script>
          toastr.warning('Erro: Não foi possivel alterar');
        </script>";
  }

  if ($this->dados['status'] == 'e') {
    echo "<script>
          toastr.warning('Erro');
        </script>";
  }
}

?>

</html>