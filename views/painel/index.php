
<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

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
        background: linear-gradient(135deg, #0b1f3a, #203f6b);
        color: white;
        padding: 35px;
        border-radius: 18px;
        margin-bottom: 30px;
        box-shadow: 0 8px 25px rgba(11, 31, 58, .15);
    }

    .cabecalho h1 {
        font-weight: 800;
        font-size: 30px;
        margin: 0 0 8px;
        letter-spacing: 1px;
    }

    .cabecalho p {
        color: #d6dfed;
        margin: 0;
    }

    .icone-cabecalho {
        font-size: 65px;
        color: rgba(255, 255, 255, .18);
    }

    .titulo-secao {
        font-size: 22px;
        font-weight: 750;
        color: #0b1f3a;
        margin-bottom: 20px;
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

    .icone-vermelho {
        background: #fff0f0;
        color: #dc3545;
    }

    .icone-verde {
        background: #e4f8ec;
        color: #198754;
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

    .caixa-tabela {
        background: white;
        border-radius: 16px;
        border: 1px solid #e8edf3;
        box-shadow: 0 4px 18px rgba(11, 31, 58, .05);
        overflow: hidden;
    }

    .topo-tabela {
        padding: 22px 24px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .topo-tabela h3 {
        margin: 0;
        font-size: 19px;
        font-weight: 750;
        color: #0b1f3a;
    }

    .area-ferramentas {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .campo-pesquisa {
        position: relative;
        width: 260px;
        max-width: 100%;
    }

    .campo-pesquisa > i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #718096;
        pointer-events: none;
    }

    .campo-pesquisa input {
        height: 39px;
        width: 100%;
        padding: 8px 38px;
        border: 1px solid #dce3ed;
        border-radius: 9px;
        font-size: 13px;
        background: #fff;
        box-shadow: none;
    }

    .campo-pesquisa input:focus {
        border-color: #2563eb;
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .12);
    }

    .campo-pesquisa button {
        position: absolute;
        right: 9px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #718096;
        cursor: pointer;
        padding: 5px;
    }

    .campo-pesquisa button:hover {
        color: #dc3545;
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
        background: #f7faff;
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

    .nome-produto {
        font-weight: 700;
        color: #1b263b;
    }

    .badge-estoque {
        display: inline-block;
        margin-top: 6px;
        padding: 5px 9px;
        background: #fff0f0;
        color: #c62828;
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
        color: #198754;
    }

    .acoes {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .btn-acao {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        text-decoration: none;
        transition: .2s;
    }

    .btn-editar {
        background: #e8f0ff;
        color: #2457a7;
    }

    .btn-editar:hover {
        background: #2457a7;
        color: white;
    }

    .btn-excluir {
        background: #fff0f0;
        color: #dc3545;
    }

    .btn-excluir:hover {
        background: #dc3545;
        color: white;
    }

    .rodape-tabela {
        padding: 17px 24px;
        background: #fbfcfe;
        border-top: 1px solid #edf0f5;
        color: #718096;
        font-size: 13px;
    }

    .vazio {
        text-align: center;
        padding: 45px 15px !important;
        color: #718096;
    }

    .mensagem-pesquisa {
        display: none;
        text-align: center;
        padding: 35px 15px;
        color: #718096;
    }

    .mensagem-pesquisa i {
        font-size: 30px;
        display: block;
        margin-bottom: 10px;
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

        .topo-tabela {
            padding: 18px;
            align-items: stretch;
        }

        .area-ferramentas {
            width: 100%;
        }

        .campo-pesquisa {
            width: 100%;
            flex: 1 1 100%;
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
                    Sistema de gerenciamento
                </div>

                <h1>GELA QUE É SUCESSO</h1>
                <p>Controle seus produtos e acompanhe seu estoque.</p>
            </div>

            <i class="bi bi-box-seam icone-cabecalho"></i>
        </div>
    </div>

    <?php
        $totalProdutos = count($produtos);
        $produtosBaixos = 0;

        foreach ($produtos as $item) {
            if ($item['quantidade'] <= $item['minimo']) {
                $produtosBaixos++;
            }
        }
    ?>

    <!-- Indicadores -->
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card-resumo">
                <div class="icone-resumo icone-azul">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div class="resumo-label">Produtos cadastrados</div>
                <div class="resumo-valor">
                    <?= $totalProdutos ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card-resumo">
                <div class="icone-resumo icone-vermelho">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>

                <div class="resumo-label">Produtos com estoque baixo</div>
                <div class="resumo-valor">
                    <?= $produtosBaixos ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card-resumo">
                <div class="icone-resumo icone-verde">
                    <i class="bi bi-currency-dollar"></i>
                </div>

                <div class="resumo-label">Valor total do estoque</div>
                <div class="resumo-valor">
                    R$ <?= number_format($total, 2, ',', '.') ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Título -->
    <div class="titulo-secao">
        <i class="bi bi-grid me-2"></i>Visão geral dos produtos
    </div>

    <!-- Tabela -->
    <div class="caixa-tabela">

        <div class="topo-tabela">
            <div>
                <h3>Produtos em estoque</h3>
                <small class="text-secondary">
                    Consulte e gerencie seus produtos cadastrados.
                </small>
            </div>

            <div class="area-ferramentas">

                <!-- Pesquisa -->
                <div class="campo-pesquisa">
                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        id="pesquisaProduto"
                        class="form-control"
                        placeholder="Buscar produto..."
                        aria-label="Buscar produto pelo nome"
                        autocomplete="off"
                    >

                    <button
                        type="button"
                        id="limparPesquisa"
                        title="Limpar pesquisa"
                        aria-label="Limpar pesquisa"
                        hidden
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <a href="/produtos/novo"
                   class="btn btn-primary btn-sm px-3 py-2">
                    <i class="bi bi-plus-lg me-1"></i>
                    Novo produto
                </a>

            </div>
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
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>

                <tbody id="corpoProdutos">

                    <?php if (empty($produtos)) { ?>

                        <tr id="linhaVazia">
                            <td colspan="7" class="vazio">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                <strong>Nenhum produto cadastrado</strong>
                                <div class="mt-2">
                                    Cadastre seu primeiro produto para começar.
                                </div>
                            </td>
                        </tr>

                    <?php } else { ?>

                        <?php foreach ($produtos as $produto) { ?>

                            <tr class="linha-produto">
                                <td>
                                    <img
                                        class="produto-img"
                                        src="/assets/<?= htmlspecialchars($produto['imagem'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>"
                                        loading="lazy"
                                        onerror="this.style.display='none'"
                                    >
                                </td>

                                <td>
                                    <div class="nome-produto">
                                        <?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>
                                    </div>

                                    <?php if ($produto['quantidade'] <= $produto['minimo']) { ?>
                                        <span class="badge-estoque">
                                            <i class="bi bi-exclamation-circle me-1"></i>
                                            Estoque baixo
                                        </span>
                                    <?php } ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($produto['unidade'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td class="quantidade">
                                    <?= htmlspecialchars((string) $produto['quantidade']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars((string) $produto['minimo']) ?>
                                </td>

                                <td class="preco">
                                    R$ <?= number_format((float) $produto['preco'], 2, ',', '.') ?>
                                </td>

                                <td>
                                    <div class="acoes">
                                        <a
                                            href="/produtos/editar?id=<?= (int) $produto['id'] ?>"
                                            title="Editar produto"
                                            aria-label="Editar produto"
                                            class="btn-acao btn-editar"
                                        >
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a
                                            href="/produtos/excluir?id=<?= (int) $produto['id'] ?>"
                                            title="Excluir produto"
                                            aria-label="Excluir produto"
                                            class="btn-acao btn-excluir"
                                            onclick="return confirm('Tem certeza que deseja excluir este produto?')"
                                        >
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                    <?php } ?>

                </tbody>
            </table>
        </div>

        <!-- Mensagem quando a busca não encontra produtos -->
        <div id="semResultadoPesquisa" class="mensagem-pesquisa">
            <i class="bi bi-search"></i>
            <strong>Nenhum produto encontrado</strong>
            <div class="small mt-1">
                Tente pesquisar usando outro nome.
            </div>
        </div>

        <div class="rodape-tabela">
            <i class="bi bi-info-circle me-1"></i>
            <span id="contadorProdutos">
                <?= $totalProdutos ?> produto(s) cadastrado(s) no sistema.
            </span>
        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const pesquisa = document.getElementById('pesquisaProduto');
    const limpar = document.getElementById('limparPesquisa');
    const linhas = document.querySelectorAll('.linha-produto');
    const mensagem = document.getElementById('semResultadoPesquisa');
    const contador = document.getElementById('contadorProdutos');

    const totalInicial = linhas.length;

    function pesquisarProdutos() {
        const termo = pesquisa.value
            .trim()
            .toLocaleLowerCase('pt-BR');

        let encontrados = 0;

        limpar.hidden = termo === '';

        linhas.forEach(function (linha) {
            const nome = linha.querySelector('.nome-produto');

            const texto = nome.textContent
                .trim()
                .toLocaleLowerCase('pt-BR');

            const corresponde = texto.includes(termo);

            linha.style.display = corresponde ? '' : 'none';

            if (corresponde) {
                encontrados++;
            }
        });

        mensagem.style.display =
            termo !== '' && encontrados === 0 ? 'block' : 'none';

        if (termo !== '') {
            contador.textContent =
                encontrados + ' produto(s) encontrado(s).';
        } else {
            contador.textContent =
                totalInicial + ' produto(s) cadastrado(s) no sistema.';
        }
    }

    pesquisa.addEventListener('input', pesquisarProdutos);

    limpar.addEventListener('click', function () {
        pesquisa.value = '';
        pesquisarProdutos();
        pesquisa.focus();
    });
});
</script>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>
