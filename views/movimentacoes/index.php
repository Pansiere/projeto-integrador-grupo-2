<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<p>Olá, bem-vindo ao registro de movimentações!</p>


<h2>Registrar entrada ou saída</h2>

<?php if (!empty($erro) && $erro === 'estoque') { ?>
    <p><strong>Não há estoque suficiente para essa saída.</strong></p>
<?php } ?>

<form action="/movimentacoes" method="post">
    <p>
        <label>Produto
            <select name="produto_id" required>
                <?php foreach ($produtos as $produto) { ?>
                    <option value="<?= $produto['id'] ?>"><?= $produto['nome'] ?></option>
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
        <label>Quantidade <input type="number" name="quantidade" min="1" required></label>
    </p>
    <button type="submit">Salvar</button>
</form>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>