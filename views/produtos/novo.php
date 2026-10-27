
<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        color: #1b263b;
        margin: 0;
    }

    .pagina-produto {
        padding: 25px 20px 50px;
    }

    .cabecalho-produto {
        text-align: center;
        margin: 10px 0 30px;
    }

    .cabecalho-produto .icone {
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

    .cabecalho-produto h1 {
        color: #0b1f3a;
        font-size: 30px;
        margin: 0 0 8px;
    }

    .cabecalho-produto p {
        color: #687386;
        font-size: 14px;
        margin: 0;
    }

    .form-produto {
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

    .campo input {
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

    .campo input:focus {
        background: white;
        border-color: #dc3545;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.10);
    }

    .campo input[type="file"] {
        padding: 10px;
        cursor: pointer;
    }

    .campo input[type="file"]::file-selector-button {
        background: #0b1f3a;
        color: white;
        border: none;
        padding: 8px 12px;
        margin-right: 10px;
        border-radius: 6px;
        cursor: pointer;
    }

    .ajuda {
        display: block;
        color: #7b8494;
        font-size: 12px;
        margin-top: 7px;
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
        .pagina-produto {
            padding: 20px 12px 35px;
        }

        .form-produto {
            padding: 22px 18px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .campo.completo {
            grid-column: auto;
        }

        .cabecalho-produto h1 {
            font-size: 25px;
        }

        .botoes {
            flex-direction: column;
        }
    }
</style>

<div class="pagina-produto">

    <div class="cabecalho-produto">
        <div class="icone">
            <i class="bi bi-box-seam"></i>
        </div>

        <h1>Cadastrar produto</h1>
        <p>Adicione um novo produto ao estoque da Gela Que É Sucesso.</p>
    </div>

    <form class="form-produto"
          action="/produtos"
          method="post"
          enctype="multipart/form-data">

        <div class="form-grid">

            <div class="campo completo">
                <label for="nome">Nome do produto</label>
                <input type="text" id="nome" name="nome"
                       placeholder="Ex: Refrigerante" required>
            </div>

            <div class="campo">
                <label for="unidade">Unidade</label>
                <input type="text" id="unidade" name="unidade"
                       placeholder="Ex: Garrafa, caixa, lata" required>
            </div>

            <div class="campo">
                <label for="quantidade">Quantidade inicial</label>
                <input type="number" id="quantidade" name="quantidade"
                       min="0" placeholder="Ex: 50" required>
            </div>

            <div class="campo">
                <label for="minimo">Estoque mínimo</label>
                <input type="number" id="minimo" name="minimo"
                       min="0" placeholder="Ex: 10" required>
                <span class="ajuda">Aviso quando o estoque estiver baixo.</span>
            </div>

            <div class="campo">
                <label for="preco">Preço unitário (R$)</label>
                <input type="text" id="preco" name="preco"
                       placeholder="Ex: 4,75" required>
            </div>

            <div class="campo completo">
                <label for="imagem">Imagem do produto</label>
                <input type="file" id="imagem" name="imagem"
                       accept="image/*" required>
                <span class="ajuda">Selecione uma imagem para identificar o produto.</span>
            </div>

        </div>

        <div class="botoes">
            <a href="/" class="botao botao-voltar">
                <i class="bi bi-arrow-left"></i>
                Voltar
            </a>

            <button type="submit" class="botao botao-salvar">
                <i class="bi bi-check-circle"></i>
                Salvar produto
            </button>
        </div>

    </form>
</div>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>
