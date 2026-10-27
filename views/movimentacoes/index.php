
<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        color: #1b263b;
        margin: 0;
    }

    .pagina-movimentacao {
        padding: 25px 20px 50px;
    }

    .cabecalho-movimentacao {
        text-align: center;
        margin: 10px 0 30px;
    }

    .cabecalho-movimentacao .icone {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 65px;
        height: 65px;
        background: #0b1f3a;
        color: white;
        border-radius: 18px;
        font-size: 28px;
        margin-bottom: 12px;
    }

    .cabecalho-movimentacao h1 {
        color: #0b1f3a;
        font-size: 30px;
        margin: 0 0 8px;
    }

    .cabecalho-movimentacao p {
        color: #687386;
        font-size: 14px;
        margin: 0;
    }

    .form-movimentacao {
        background: white;
        width: 100%;
        max-width: 650px;
        margin: 0 auto;
        padding: 32px;
        box-sizing: border-box;
        border-radius: 16px;
        border-top: 5px solid #dc3545;
        box-shadow: 0 6px 24px rgba(11, 31, 58, 0.08);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .campo {
        margin: 0;
        min-width: 0;
    }

    .campo.completo {
        grid-column: 1 / -1;
    }

    .campo label {
        display: block;
        color: #0b1f3a;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 9px;
    }

    .campo input,
    .campo select {
        display: block;
        width: 100%;
        box-sizing: border-box;
        padding: 13px 14px;
        background: #f8f9fc;
        border: 1px solid #dce1e8;
        border-radius: 9px;
        font-size: 14px;
        color: #1b263b;
        outline: none;
        transition: 0.2s;
    }

    .campo input:focus,
    .campo select:focus {
        background: white;
        border-color: #dc3545;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.10);
    }

    .ajuda {
        display: block;
        color: #7b8494;
        font-size: 12px;
        margin-top: 7px;
    }

    .erro {
        width: 100%;
        max-width: 650px;
        box-sizing: border-box;
        margin: 0 auto 20px;
        padding: 15px 18px;
        background: #fff0f1;
        color: #842029;
        border: 1px solid #f5c2c7;
        border-left: 5px solid #dc3545;
        border-radius: 10px;
        font-size: 14px;
    }

    .botoes {
        display: flex;
        gap: 12px;
        margin-top: 28px;
    }

    .botao {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 13px 18px;
        border-radius: 9px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .botao-salvar {
        flex: 1;
        background: #0b1f3a;
        color: white;
        border: 1px solid #0b1f3a;
    }

    .botao-salvar:hover {
        background: #dc3545;
        border-color: #dc3545;
    }

    .botao-voltar {
        background: white;
        color: #0b1f3a;
        border: 1px solid #dce1e8;
    }

    .botao-voltar:hover {
        background: #f4f6f9;
    }

    @media (max-width: 600px) {
        .pagina-movimentacao {
            padding: 20px 12px 35px;
        }

        .form-movimentacao {
            padding: 22px 18px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .campo.completo {
            grid-column: auto;
        }

        .cabecalho-movimentacao h1 {
            font-size: 25px;
        }

        .botoes {
            flex-direction: column;
        }
    }
</style>

<div class="pagina-movimentacao">

    <div class="cabecalho-movimentacao">
        <div class="icone">
            <i class="bi bi-arrow-left-right"></i>
        </div>

        <h1>Registrar movimentação</h1>
        <p>Registre entradas e saídas dos produtos do estoque.</p>
    </div>

    <?php if (!empty($erro) && $erro === 'estoque') { ?>
        <div class="erro">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <strong> Estoque insuficiente!</strong>
            Não há quantidade suficiente para realizar essa saída.
        </div>
    <?php } ?>

    <form class="form-movimentacao"
          action="/movimentacoes"
          method="post">

        <div class="form-grid">

            <div class="campo completo">
                <label for="produto_id">Produto</label>

                <select id="produto_id" name="produto_id" required>
                    <option value="">Selecione um produto</option>

                    <?php foreach ($produtos as $produto) { ?>
                        <option value="<?= $produto['id'] ?>">
                            <?= htmlspecialchars($produto['nome']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="campo">
                <label for="tipo">Tipo de movimentação</label>

                <select id="tipo" name="tipo" required>
                    <option value="entrada">Entrada</option>
                    <option value="saida">Saída</option>
                </select>
            </div>

            <div class="campo">
                <label for="quantidade">Quantidade</label>

                <input type="number"
                       id="quantidade"
                       name="quantidade"
                       min="1"
                       placeholder="Ex: 10"
                       required>

                <span class="ajuda">
                    Informe a quantidade movimentada.
                </span>
            </div>

        </div>

        <div class="botoes">
            <a href="/" class="botao botao-voltar">
                <i class="bi bi-arrow-left"></i>
                Voltar
            </a>

            <button type="submit" class="botao botao-salvar">
                <i class="bi bi-check-circle"></i>
                Salvar movimentação
            </button>
        </div>

    </form>

</div>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>
