<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        color: #1b263b;
        margin: 0;
    }

    h1 {
        text-align: center;
        color: #0b1f3a;
        margin: 25px 0;
    }

    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    th {
        background-color: #0b1f3a;
        color: white;
        padding: 15px;
        text-align: center;
    }

    td {
        padding: 13px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f0f3f8;
    }

    strong {
        display: inline-block;
        background-color: #dc3545;
        color: white;
        padding: 5px 9px;
        margin-left: 8px;
        border-radius: 5px;
        font-size: 12px;
    }

    p {
        width: 90%;
        margin: 25px auto;
        padding: 18px;
        box-sizing: border-box;
        background-color: #0b1f3a;
        color: white;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        border-left: 6px solid #dc3545;
        border-radius: 8px;
    }

    @media (max-width: 600px) {
        table {
            width: 100%;
            font-size: 12px;
        }

        th, td {
            padding: 8px 4px;
        }

        h1 {
            font-size: 23px;
        }

        strong {
            margin: 4px 0 0;
        }
    }
</style>

<h1>GELA QUE É SUCESSO</h1>

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
                <?= htmlspecialchars($produto['nome']) ?>

                <?php if ($produto['quantidade'] <= $produto['minimo']) { ?>
                    <strong>Acabando</strong>
                <?php } ?>
            </td>

            <td><?= htmlspecialchars($produto['unidade']) ?></td>
            <td><?= $produto['quantidade'] ?></td>
            <td><?= $produto['minimo'] ?></td>
            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
        </tr>
    <?php } ?>
</table>

<p>
    Valor do estoque: R$ <?= number_format($total, 2, ',', '.') ?>
</p>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>