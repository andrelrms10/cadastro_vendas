<?php
$output = ob_get_clean();
if (headers_sent()) {
    echo $output;
}
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Relatório Diário</title>
    <link href="../assets/css/relatorio.css" rel="stylesheet">
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="../assets/images/logo-tray.png">
        </div>
        <h1>RELATÓRIO DE VENDAS DIÁRIAS</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="id_vendedor">ID</th>
                    <th class="nome">VENDEDOR</th>
                    <th>EMAIL</th>
                    <th>COMISSÃO</th>
                    <th>VALOR</th>
                    <th>DATA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($totalVendas as $item) : ?>
                    <tr>
                        <td class="id_vendedor"><?php echo $item['id_vendedor']; ?></td>
                        <td class="nome"><?php echo $item['nome']; ?></td>
                        <td class="email"><?php echo $item['email']; ?></td>
                        <td class="comissao">R$ <?php echo number_format($item['comissao'], 2, ',', '.'); ?></td>
                        <td class="valor">R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?></td>
                        <td class="data_venda"><?php echo $item['data_venda']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="colspan-4">
                    <td class="grand total"></td>
                    <td class="grand total"></td>
                    <td class="grand total">TOTAL</td>
                    <td class="grand total">R$<?php echo $somaComissaoDiaria; ?></td>
                    <td class="grand total">R$<?php echo $somaVendasDiarias; ?></td>
                    <td class="grand total"></td>
                </tr>
            </tbody>
        </table>
    </main>
    <footer>
        Tray - Relatório diário de vendas
    </footer>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

$output = ob_get_clean();
if (headers_sent()) {
    echo $output;
}

use Dompdf\Dompdf;


require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();
$dompdf->set_base_path('assets/');
$dompdf->load_Html($html);
$dompdf->setPaper("A4", "landscape");
$dompdf->render();
$output = $dompdf->output();

$dompdf->stream("relatoriodiario.pdf", ["Attachment" => true]);
//$dompdf->file_put_contents("C:\xampp sendmail\htdocs\cadastro_vendas/relatoriodiario.pdf",output);
//druplal_exit();
