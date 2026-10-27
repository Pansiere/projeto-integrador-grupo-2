
<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<?php
    $totalExcluidos = count($produtos);
    $valorExcluido = 0;

    foreach ($produtos as $produto) {
        $valorExcluido +=
            (float) $produto['quantidade'] * (float) $produto['preco'];
    }
?>

<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f4f6f9;
        color: #1b263b;
    }

    .painel {
        max-width: 1500px;
        margin: 0 auto;
        padding: 30px;
    }

    .cabecalho {
        background: linear-gradient(135deg, #0b1f3a, #183b65);
        color: white;
        padding: 35px;
        border-radius: 18px;
        margin-bottom: 30px;
        box-shadow: 0 8px 25px rgba(11, 31, 58, .15);
    }

    .cabecalho h1 {
        font-size: 30px;
        font-weight: 800;
        margin: 0 0 8px;
        letter-spacing: 1px;
    }

    .cabecalho p {
        color: #d6dfed;
        margin: 0;
    }

    .icone-cabecalho {
        font-size: 60px;
        color: rgba(255, 255, 255, .18);
    }

    .card-resumo {
        background: white;
        border: 1px solid #e8edf3;
        border-radius: 15px;
        padding: 22px;
        height: 100%;
        box-shadow: 0 4px 15px rgba(11, 31, 58, .04);
        transition: transform .2s, box-shadow .2s;
    }

    .card-resumo:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(11, 31, 58, .09);
    }

    .icone-resumo {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        font-size: 23px;
        margin-bottom: 15px;
        background: #fff0f0;
        color: #dc3545;
    }

    .icone-azul {
        background: #e7efff;
        color: #2457a7;
    }

    .resumo-label {
        color: #718096;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .resumo-valor {
        color: #0b1f3a;
        font-size: 25px;
        font-weight: 800;
        overflow-wrap: anywhere;
    }

    .titulo-secao {
        font-size: 22px;
        font-weight: 750;
        color: #0b1f3a;
        margin-bottom: 20px;
    }

    .caixa-tabela {
        background: white;
        border: 1px solid #e8edf3;
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(11, 31, 58, .05);
        overflow: hidden;
    }

    .topo-tabela {
        padding: 22px 24px;
        border-bottom: 1px solid #edf0f5;
    }

    .topo-tabela h3 {
        margin: 0 0 5px;
        font-size: 19px;
        font-weight: 750;
        color: #0b1f3a;
    }

    .tabela-produtos {
        width: 100%;
        margin: 0;
        vertical-align: middle;
        white-space: nowrap;
    }

    .tabela-produtos thead th {
        background: #f7f9fc;
        color: #64748b;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .7px;
        font-weight: 750;
        padding: 17px 15px;
        border-bottom: 1px solid #e8edf3;
    }

    .tabela-produtos tbody td {
        padding: 16px 15px;
        border-bottom: 1px solid #f0f2f6;
        font-size: 14px;
    }

    .tabela-produtos tbody tr {
        transition: background .2s;
    }

    .tabela-produtos tbody tr:hover {
        background: #fff9f9;
    }

    .tabela-produtos tbody tr:last-child td {
        border-bottom: none;
    }

    .produto-img {
        width: 58px;
        height: 58px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #e8edf3;
        background: #f8fafc;
    }

    .sem-imagem {
        width: 58px;
        height: 58px;
        border-radius: 12px;
        background: #f1f3f6;
        color: #94a3b8;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-size: 23px;
    }

    .nome-produto {
        font-weight: 700;
        color: #1b263b;
    }

    .badge-excluido {
        display: inline-block;
        margin-top: 6px;
        padding: 5px 9px;
        background: #fff0f0;
        color: #c62828;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
    }

    .badge-estoque {
        display: inline-block;
        margin-top: 6px;
        padding: 5px 9px;
        background: #fff4df;
        color: #946200;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
    }

    .quantidade {
        font-weight: 750;
        color: #0b1f3a;
    }

    .preco {
        font-weight: 700;
        color: #64748b;
    }

    .vazio {
        text-align: center;
        padding: 50px 15px !important;
        color: #718096;
    }

    .rodape-tabela {
        padding: 17px 24px;
        background: #fbfcfe;
        border-top: 1px solid #edf0f5;
        color: #718096;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .painel {
            padding: 15px;
        }

        .cabecalho {
            padding: 25px 20px;
        }

        .cabecalho h1 {
            font-size: 23px;
        }

        .icone-cabecalho {
            font-size: 40px;
        }

        .resumo-valor {
            font-size: 21px;
        }

        .tabela-produtos thead th,
        .tabela-produtos tbody td {
            padding: 12px 10px;
        }
    }
</style>

<div class="painel">

    <!-- Cabeçalho -->
    <div class="cabecalho">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <div>
                <div class="small text-uppercase mb-2"
                     style="letter-spacing: 2px; color: #b9cbe4;">
                    Gela que é Sucesso
                </div>

                <h1>Itens Excluídos</h1>

                <p>Consulte os produtos removidos do estoque.</p>
            </div>

            <i class="bi bi-trash3 icone-cabecalho"></i>
        </div>
    </div>

    <!-- Cards de resumo -->
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6">
            <div class="card-resumo">
                <div class="icone-resumo">
                    <i class="bi bi-trash3"></i>
                </div>

                <div class="resumo-label">Produtos excluídos</div>

                <div class="resumo-valor">
                    <?= $totalExcluidos ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="card-resumo">
                <div class="icone-resumo icone-azul">
                    <i class="bi bi-currency-dollar"></i>
                </div>

                <div class="resumo-label">Valor dos itens excluídos</div>

                <div class="resumo-valor">
                    R$ <?= number_format($valorExcluido, 2, ',', '.') ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabela -->
    <div class="titulo-secao">
        <i class="bi bi-archive me-2"></i>Produtos removidos
    </div>

    <div class="caixa-tabela">

        <div class="topo-tabela">
            <h3>Lista de itens excluídos</h3>

            <small class="text-secondary">
                Produtos armazenados nesta listagem.
            </small>
        </div>

        <div class="table-responsive">
            <table class="table tabela-produtos">

                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Unidade</th>
                        <th>Quantidade</th>
                        <th>Mínimo</th>
                        <th>Preço</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($produtos)) { ?>

                        <tr>
                            <td colspan="6" class="vazio">
                                <i class="bi bi-trash fs-1 d-block mb-2"></i>

                                <strong>Nenhum item excluído</strong>

                                <div class="mt-2">
                                    Os produtos removidos aparecerão aqui.
                                </div>
                            </td>
                        </tr>

                    <?php } else { ?>

                        <?php foreach ($produtos as $produto) { ?>
                            <tr>
                                <td>
                                    <?php if (!empty($produto['imagem'])) { ?>
                                        <img
                                            class="produto-img"
                                            src="/assets/<?= htmlspecialchars(
                                                $produto['imagem'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>"
                                            alt="<?= htmlspecialchars(
                                                $produto['nome'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>"
                                            loading="lazy"
                                        >
                                    <?php } else { ?>
                                        <span class="sem-imagem">
                                            <i class="bi bi-image"></i>
                                        </span>
                                    <?php } ?>
                                </td>

                                <td>
                                    <div class="nome-produto">
                                        <?= htmlspecialchars(
                                            $produto['nome'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>
                                    </div>

                                    <span class="badge-excluido">
                                        <i class="bi bi-trash3 me-1"></i>
                                        Excluído
                                    </span>

                                    <?php if ($produto['quantidade'] <= $produto['minimo']) { ?>
                                        <div>
                                            <span class="badge-estoque">
                                                Estoque baixo
                                            </span>
                                        </div>
                                    <?php } ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $produto['unidade'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </td>

                                <td class="quantidade">
                                    <?= htmlspecialchars(
                                        (string) $produto['quantidade'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        (string) $produto['minimo'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </td>

                                <td class="preco">
                                    R$ <?= number_format(
                                        (float) $produto['preco'],
                                        2,
                                        ',',
                                        '.'
                                    ) ?>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php } ?>
                </tbody>

            </table>
        </div>

        <div class="rodape-tabela">
            <i class="bi bi-info-circle me-1"></i>
            <?= $totalExcluidos ?> item(ns) nesta listagem.
        </div>

    </div>

</div>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>
