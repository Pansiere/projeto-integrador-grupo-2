<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<h1>GELA QUE SUCESSO</h1>

  <h1>Painel do estoque</h1>

  <table>
    <tr>
        <th>Produto</th>
        <th>Unidade</th>
        <th>Quantidade</th>
        <th>Mínimo</th>
        <th>Preço</th>
    </tr>
    <?php foreach ($produtos as $produto) { ?>
        <tr>
            <td>
                <?= $produto['nome'] ?>
                <?php if ($produto['quantidade'] <= $produto['minimo']) { ?>
                    <strong>Acabando</strong>
                <?php } ?>
            </td>
            <td><?= $produto['unidade'] ?></td>
            <td><?= $produto['quantidade'] ?></td>
            <td><?= $produto['minimo'] ?></td>
            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
        </tr>
    <?php } ?>
</table>

<p>Valor do estoque: R$ <?= number_format($total, 2, ',', '.') ?></p>


<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>
