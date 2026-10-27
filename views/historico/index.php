```php
<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<?php
    $totalMovimentacoes = count($movimentacoes);
    $totalEntradas = 0;
    $totalSaidas = 0;
    $valorMovimentado = 0;

    foreach ($movimentacoes as $mov) {
        if (strtolower($mov['tipo']) === 'entrada') {
            $totalEntradas++;
        } elseif (strtolower($mov['tipo']) === 'saída' ||
                  strtolower($mov['tipo']) === 'saida') {
            $totalSaidas++;
        }

        $valorMovimentado +=
            (float) $mov['quantidade'] * (float) $mov['preco'];
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
    }

    .icone-azul {
        background: #e7efff;
        color: #2457a7;
    }

    .icone-verde {
        background: #e4f8ec;
        color: #198754;
    }

    .icone-vermelho {
        background: #fff0f0;
        color: #dc3545;
    }

    .icone-roxo {
        background: #f0eaff;
        color: #7048a8;
    }

    .resumo-label {
        color: #718096;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .resumo-valor {
        color: #0b1f3a;
        font-size: 24px;
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

    .tabela-historico {
        width: 100%;
        margin: 0;
        vertical-align: middle;
        white-space: nowrap;
    }

    .tabela-historico thead th {
        background: #f7f9fc;
        color: #64748b;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .7px;
        font-weight: 750;
        padding: 17px 20px;
        border-bottom: 1px solid #e8edf3;
    }

    .tabela-historico tbody td {
        padding: 18px 20px;
        border-bottom: 1px solid #f0f2f6;
        font-size: 14px;
    }

    .tabela-historico tbody tr {
        transition: background .2s;
    }

    .tabela-historico tbody tr:hover {
        background: #f7faff;
    }

    .tabela-historico tbody tr:last-child td {
        border-bottom: none;
    }

    .nome-produto {
        font-weight: 700;
        color: #1b263b;
    }

    .badge-tipo {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 11px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
    }

    .badge-entrada {
        background: #e4f8ec;
        color: #198754;
    }

    .badge-saida {
        background: #fff0f0;
        color: #dc3545;
    }

    .quantidade {
        font-weight: 750;
        color: #0b1f3a;
    }

    .preco {
        color: #64748b;
    }

    .total {
        color: #198754;
        font-weight: 750;
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

        .tabela-historico thead th,
        .tabela-historico tbody td {
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

                <h1>Histórico de movimentações</h1>

                <p>Acompanhe todas as entradas e saídas do estoque.</p>
            </div>

            <i class="bi bi-clock-history icone-cabecalho"></i>
        </div>
    </div>

    <!-- Cards de resumo -->
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-resumo">
                <div class="icone-resumo icone-azul">
                    <i class="bi bi-arrow-left-right"></i>
                </div>

                <div class="resumo-label">Total de movimentações</div>
                <div class="resumo-valor">
                    <?= $totalMovimentacoes ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-resumo">
                <div class="icone-resumo icone-verde">
                    <i class="bi bi-box-arrow-in-down"></i>
                </div>

                <div class="resumo-label">Entradas</div>
                <div class="resumo-valor">
                    <?= $totalEntradas ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-resumo">
                <div class="icone-resumo icone-vermelho">
                    <i class="bi bi-box-arrow-up"></i>
                </div>

                <div class="resumo-label">Saídas</div>
                <div class="resumo-valor">
                    <?= $totalSaidas ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-resumo">
                <div class="icone-resumo icone-roxo">
                    <i class="bi bi-currency-dollar"></i>
                </div>

                <div class="resumo-label">Valor movimentado</div>
                <div class="resumo-valor">
                    R$ <?= number_format($valorMovimentado, 2, ',', '.') ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabela -->
    <div class="titulo-secao">
        <i class="bi bi-list-ul me-2"></i>Registro de atividades
    </div>

    <div class="caixa-tabela">

        <div class="topo-tabela">
            <h3>Movimentações registradas</h3>
            <small class="text-secondary">
                Histórico de entradas e saídas de produtos.
            </small>
        </div>

        <div class="table-responsive">
            <table class="table tabela-historico">

                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Preço unitário</th>
                        <th>Valor total</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($movimentacoes)) { ?>

                        <tr>
                            <td colspan="5" class="vazio">
                                <i class="bi bi-clock-history fs-1 d-block mb-2"></i>

                                <strong>Nenhuma movimentação registrada</strong>

                                <div class="mt-2">
                                    As entradas e saídas aparecerão aqui.
                                </div>
                            </td>
                        </tr>

                    <?php } else { ?>

                        <?php foreach ($movimentacoes as $movimentacao) { ?>
                            <?php
                                $tipo = strtolower(trim($movimentacao['tipo']));
                                $ehEntrada = $tipo === 'entrada';
                            ?>

                            <tr>
                                <td>
                                    <span class="nome-produto">
                                        <?= htmlspecialchars(
                                            $movimentacao['nome'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>
                                    </span>
                                </td>

                                <td>
                                    <?php if ($ehEntrada) { ?>

                                        <span class="badge-tipo badge-entrada">
                                            <i class="bi bi-arrow-down-circle"></i>
                                            Entrada
                                        </span>

                                    <?php } else { ?>

                                        <span class="badge-tipo badge-saida">
                                            <i class="bi bi-arrow-up-circle"></i>
                                            Saída
                                        </span>

                                    <?php } ?>
                                </td>

                                <td class="quantidade">
                                    <?= htmlspecialchars(
                                        (string) $movimentacao['quantidade'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </td>

                                <td class="preco">
                                    R$ <?= number_format(
                                        (float) $movimentacao['preco'],
                                        2,
                                        ',',
                                        '.'
                                    ) ?>
                                </td>

                                <td class="total">
                                    R$ <?= number_format(
                                        (float) $movimentacao['quantidade']
                                        * (float) $movimentacao['preco'],
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
            <?= $totalMovimentacoes ?> movimentação(ões) registrada(s).
        </div>

    </div>

</div>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>