<?php
$url = 'https://api.example.com/pix/validar-pagamento';
$data = array(
    'chave' => 'seu-pix-chave',
    'valor' => '10.00',
    'descricao' => 'Pagamento de teste'
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result);

if ($response->status == 'ok') {
    // Pagamento válido, faça o processamento do pedido
} else {
    // Pagamento inválido, exiba uma mensagem de erro para o usuário
}
?>
