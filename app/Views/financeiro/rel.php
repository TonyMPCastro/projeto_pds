<?php


if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

require_once('vendor/tcpdf/tcpdf.php');
require_once('vendor/FPDI/src/autoload.php');
require_once('vendor/FPDI/src/TcpdfFpdi.php');


use \setasign\Fpdi\FpdfTpl;
use \setasign\Fpdi\TcpdfFpdi;


class PdfTc extends TcpdfFpdi
{

    protected $_tplIdx;

    public function Header()
    {


        $this->SetXY(5, 5);

        $this->SetFont('helvetica', 'B', '14');

        $this->Cell(0, 5, "DERMACARE", '', 1, 'C');
    } //FIM HEADER()



    function Footer()
    {
    }
}

if (isset($this->dados['agendamentos'])) {
    $agendamentos = $this->dados['agendamentos'];
} else {
    $agendamentos = [];
}

if (isset($this->dados['servicos'])) {
    $servicos = $this->dados['servicos'];
} else {
    $servicos = [];
}


require_once("app/Views/menu_footer/menu.php");

?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">


        <?php
        $pdf = new PdfTc();
        $pdf->SetTopMargin(60);
        $pdf->SetLeftMargin(20);
        $pdf->SetRightMargin(10);
        $pdf->SetAutoPageBreak(TRUE, 40);

        $pdf->AddPage('L', 'A4');
        $pdf->SetXY(10, 20);
        $pdf->SetFont('helvetica', 'B', '12');
        // $pdf->Cell(180, 5, 'TESTE', '', 1, 'L');
        $pdf->SetFont('helvetica', '', '12');


        $tbl = '<table cellspacing="0" cellpadding="1" border="1">';

            $t_total = 0;

        foreach ($agendamentos as $a) {

            $arr = explode(";", $a->servicos);
            $str_serv = "<p>&nbsp;";
            $total = 0;
            foreach ($arr as $value) {
                foreach ($servicos as $ser) {
                    if ($value == $ser->id) {
                        $str_serv .= $ser->nome . " - " . number_format($ser->valor, 2, ",", ".") . "<br>&nbsp;";
                        $total += $ser->valor;
                    }
                }
            }
            $t_total += $total;

            $str_serv .= "<b>Total = " . number_format($total, 2, ",", ".") . "</b>";

            $tbl .= '

                <tr>
                    <td>&nbsp;' . $a->nome_user . '</td>
                    <td>'.$str_serv.'</p></td>
                    <td>&nbsp;COL 3 - ROW 1</td>
                </tr>
            ';
        }

        $tbl .= '
        <tr>
        <td> </td>
        <td>'. number_format($t_total, 2, ",", ".").'</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    </table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $fileN = "TESTE";

        $pdf->Output(__DIR__ . '/example.pdf', 'F');
        ?>

        <iframe src="<?php echo URL . 'app/Views/financeiro/example.pdf'; ?>" width="100%" height="100%" style="border: none;"></iframe>

    </div>
</div>

<!-- partial -->


<?php include "app/Views/menu_footer/footer.php"; ?>