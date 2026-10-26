
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
        width: 95%;
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
        padding: 15px 10px;
        text-align: center;
    }

    td {
        padding: 13px 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f0f3f8;
    }

    .produto-img {
        width: 85px;
        height: 85px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e0e5ec;
    }

    .aviso-estoque {
        display: inline-block;
        background-color: #dc3545;
        color: white;
        padding: 5px 9px;
        margin-left: 8px;
        border-radius: 5px;
        font-size: 12px;
    }

    .valor-estoque {
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

    .acoes {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .acoes .btn {
        min-width: 32px;
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

        .produto-img {
            width: 55px;
            height: 55px;
        }

        .aviso-estoque {
            margin: 4px 0 0;
        }

        .valor-estoque {
            width: 95%;
            font-size: 16px;
        }
    }
</style>

<h1>GELA QUE É SUCESSO</h1>
<h1>Painel do estoque</h1>

<table>
    <thead>
        <tr>
            <th>Imagem</th>
            <th>Produto</th>
            <th>Unidade</th>
            <th>Quantidade</th>
            <th>Mínimo</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($produtos as $produto) { ?>
            <tr>
                <td>
                    <img
                        class="produto-img"
                        src="/assets/<?= htmlspecialchars($produto['imagem'] ?? '') ?>"
                        alt="<?= htmlspecialchars($produto['nome']) ?>"
                        loading="lazy"
                    >
                </td>

                <td>
                    <?= htmlspecialchars($produto['nome']) ?>

                    <?php if ($produto['quantidade'] <= $produto['minimo']) { ?>
                        <span class="aviso-estoque">Acabando!</span>
                    <?php } ?>
                </td>

                <td><?= htmlspecialchars($produto['unidade']) ?></td>
                <td><?= $produto['quantidade'] ?></td>
                <td><?= $produto['minimo'] ?></td>

                <td>
                    R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                </td>

                <td>
                    <div class="acoes">

                        <!-- Botão editar -->
                        <a
                            href="/produtos/editar?id=<?= (int) $produto['id'] ?>"
                            title="Editar produto"
                            class="btn btn-primary btn-sm"
                        >
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <!-- Botão excluir -->
                        <a
                            href="/produtos/excluir?id=<?= (int) $produto['id'] ?>"
                            title="Excluir produto"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Tem certeza que deseja excluir este produto?')"
                        >
                            <i class="bi bi-trash3"></i>
                        </a>

                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div class="valor-estoque">
    Valor do estoque: R$ <?= number_format($total, 2, ',', '.') ?>
</div>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>
