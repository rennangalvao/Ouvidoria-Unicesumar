<?php
include('classes/dados_service.php');
include('classes/dados_model.php');
include('includes/conexao.php');

$dadosUsuario = new DadosUsuario();

$dadosUsuario->__set('protocolo', $_POST['protocolo']);

$conexao = new Conexao();

$importaDados= new importaDados($conexao, $dadosUsuario);

$result = $importaDados->consultar($_POST['protocolo']);


if ($result['resposta']) {
    $respondido = true;
    $resposta = $result['resposta'];
    $bgcolor = 'p-3 mb-2 bg-success text-white';
    $dataResposta = new \DateTime($result['dataResposta']);
    $dataRespostaFormatada = $dataResposta->format('d/m/Y H:i:s');
} else {
    $respondido = false;
    $resposta = 'Ainda sem resposta';
    $bgcolor = 'p-3 mb-2 bg-warning text-white';
    $dataResposta = new \DateTime($result['dataResposta']);
    $dataRespostaFormatada = $dataResposta->format('d/m/Y H:i:s');
} 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ouvidoria UniCesumar</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <script type="text/javascript" src="dist/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="dist/bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="text-center" style="margin-top: 20px">
        <img src="unicesumar.png" />

        <h2 style="margin-top:20px">Ouvidoria</h2>
        <p class="lead">Caso necessário entre em contato conosco.<br />Estamos à disposição para mais esclarecimentos sobre a utilização do serviço.</p>
      </div>

      <div class="row">
          
        <div class="col-md-12">
            <h4>Consultar Manifestação</h4>
            
            <div class="card">
              <div class="card-header">Resposta da Manifestação</div>
                <p class="<?php echo $bgcolor?>">
                    <?php echo $resposta ?>
                    <br /><strong><?php echo $dataRespostaFormatada ?></strong>
                </p>
            </div>
            
            <div class="card">
              <div class="card-header">Detalhes da Manifestação</div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="text-right">Protocolo</th>
                            <td><?php echo $result['protocolo']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Nome</th>
                            <td><?php echo $result['nome']?></td>
                            <th class="text-right">Email</th>
                            <td><?php echo $result['email']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">CPF</th>
                            <td><?php echo $result['cpf']?></td>
                            <th class="text-right">RG</th>
                            <td><?php echo $result['rg']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Logradouro / Número</th>
                            <td>
                                <?php echo $result['logradouro']?>
                                 - 
                                <?php echo $result['numero']?>
                            </td>
                            <th class="text-right">CEP</th>
                            <td><?php echo $result['rg']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Complemento</th>
                            <td><?php echo $result['complemento']?></td>
                            <th class="text-right">Bairro</th>
                            <td><?php echo $result['bairro']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Cidade</th>
                            <td><?php echo $result['cidade']?></td>
                            <th class="text-right">Estado / País</th>
                            <td>
                                <?php echo $result['uf']?>
                                 - 
                                <?php echo $result['pais']?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-right">Telefone</th>
                            <td>
                                (<?php echo $result['telefone_ddd']?>)
                                 <?php echo $result['telefone_numero']?>
                            </td>
                            <th class="text-right">Celular</th>
                            <td>
                                (<?php echo $result['celular_ddd']?>)
                                 <?php echo $result['celular_numero']?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-right">Mensagem</th>
                            <td colspan="3">
                                <?php echo $result['mensagem']?>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
          
      </div>
        
    </div><!-- container -->
  </body>
</html>
