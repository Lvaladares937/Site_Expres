<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Expres_Sorte</title>
    <link rel="stylesheet" href="./inscricao.css">
    <script>
      function validarCodigo() {
        var codigoVip = document.getElementById("codigovip").value;
        var codigosValidos = ["002312", "002313", "002314", "002315", "002316", "002317", "004201", "004202", "004203", "004204"];
        if (codigosValidos.indexOf(codigoVip) === -1) {
          alert("Código VIP inválido.");
          return false;
        }
        return true;
      }
    </script>
  </head>
  <body>
    <div class="container">
      <h1>Validação de Bilhete</h1>
      <form action="processar.php" method="post" onsubmit="return validarCodigo()">

        <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome do Cliente" required><br><br>
        <input type="text" id="cpf" name="cpf" autocomplete="off" maxlength="14" placeholder="CPF_Cliente" required ><br><br>
        <script src="./validarcpf.js"></script>
        <label for="numero_sorteio">Número de Inscrição:</label>
        <select id="numero_sorteio" name="numero_sorteio" required>
          <option value="">Selecione um número de inscrição</option>
          <?php
          $arquivo = "numeros.xlsx";
          $planilha = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
          $planilha = $planilha->load($arquivo);
          $sheet = $planilha->getActiveSheet();
          $numRows = $sheet->getHighestRow();
          for ($row = 2; $row <= $numRows; $row++) {
            $numero = $sheet->getCell('A' . $row)->getValue();
            echo "<option value=\"$numero\">$numero</option>";
          }
          ?>
        </select><br><br>
        <input type="number" id="codigovip" name="codigovip" placeholder="Código_vip_vendedor"><br><br>
        <input type="submit" value="Pagamento" onclick="window.location.href = '#';">

      </form>
    </div>
  </body>
</html>
