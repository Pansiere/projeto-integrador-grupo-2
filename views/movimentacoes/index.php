<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        color: #1b263b;
    }

    h2 {
        text-align: center;
        color: #0b1f3a;
        margin: 25px 0;
        font-size: 28px;
    }

    .boas-vindas {
        text-align: center;
        font-size: 18px;
        color: #0b1f3a;
        margin-top: 30px;
    }

    form {
        background-color: white;
        width: 90%;
        max-width: 500px;
        margin: 25px auto;
        padding: 30px;
        box-sizing: border-box;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    form p {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        color: #0b1f3a;
    }

    input,
    select {
        display: block;
        width: 100%;
        box-sizing: border-box;
        padding: 12px;
        margin-top: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: white;
        font-size: 15px;
        outline: none;
    }

    input:focus,
    select:focus {
        border-color: #dc3545;
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.2);
    }

    button {
        width: 100%;
        padding: 13px;
        background-color: #0b1f3a;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background-color: #dc3545;
    }

    .erro {
        width: 90%;
        max-width: 500px;
        box-sizing: border-box;
        margin: 20px auto;
        padding: 15px;
        background-color: #f8d7da;
        color: #842029;
        border-left: 5px solid #dc3545;
        border-radius: 6px;
    }

    @media (max-width: 600px) {
        form {
            padding: 20px;
        }

        h2 {
            font-size: 23px;
        }
    }
</style>

<p class="boas-vindas">
    Olá, bem-vindo ao registro de movimentações!
</p>

<h2>Registrar entrada ou saída</h2>

<?php if (!empty($erro) && $erro === 'estoque') { ?>
    <p class="erro">
        <strong>Não há estoque suficiente para essa saída.</strong>
    </p>
<?php } ?>

<form action="/movimentacoes" method="post">
    <p>
        <label>Produto
            <select name="produto_id" required>
                <?php foreach ($produtos as $produto) { ?>
                    <option value="<?= $produto['id'] ?>">
                        <?= htmlspecialchars($produto['nome']) ?>
                    </option>
                <?php } ?>
            </select>
        </label>
    </p>

    <p>
        <label>Tipo
            <select name="tipo" required>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>
        </label>
    </p>

    <p>
        <label>Quantidade
            <input type="number" name="quantidade" min="1" required>
        </label>
    </p>

    <button type="submit">Salvar</button>
</form>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>