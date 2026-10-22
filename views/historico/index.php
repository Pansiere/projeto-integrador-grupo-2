<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<h1>Histórico</h1>

<table>
    <tr>
        <th>Produto</th>
        <th>Unidade</th>
        <th>Tipo</th>
        <th>Quantidade</th>
        <th>Mínimo</th>
        <th>Preço</th>
    </tr>
    <?php foreach ($movimentacoes as $movimentacao) { ?>
        <tr>
            <td>
                <?= $movimentacao['nome'] ?>
                <?php if ($movimentacao['quantidade'] <= $movimentacao['minimo']) { ?>
                    <strong>Acabando</strong>
                <?php } ?>
            </td>
            <td><?= $movimentacao['unidade'] ?></td>
            <td><?= $movimentacao['tipo'] ?></td>
            <td><?= $movimentacao['quantidade'] ?></td>
            <td><?= $movimentacao['minimo'] ?></td>
            <td>R$ <?= number_format($movimentacao['preco'], 2, ',', '.') ?></td>
        </tr>
    <?php } ?>
</table>
<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>