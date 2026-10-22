<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        color: #1b263b;
    }

    h1 {
        text-align: center;
        color: #0b1f3a;
        margin: 30px 0;
        font-size: 32px;
    }

    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background-color: #0b1f3a;
        color: white;
        padding: 15px;
    }

    td {
        padding: 13px;
        text-align: center;
        border-bottom: 1px solid #dddddd;
    }

    td:first-child {
        text-align: left;
    }

    tr:hover {
        background-color: #f0f3f8;
    }

    strong {
        background-color: #dc3545;
        color: white;
        padding: 5px 8px;
        border-radius: 5px;
        font-size: 12px;
        margin-left: 5px;
    }

    @media (max-width: 700px) {
        table {
            width: 100%;
            font-size: 12px;
        }

        th, td {
            padding: 8px 4px;
        }

        h1 {
            font-size: 25px;
        }
    }
</style>

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