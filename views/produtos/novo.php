<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<h1>Cadastrar produto</h1>

<form action="/produtos" method="post">
    <p>
        <label>Nome <input type="text" name="nome" required></label>
    </p>
    <p>
        <label>Unidade <input type="text" name="unidade" required></label>
    </p>
    <p>
        <label>Quantidade <input type="text" name="quantidade" required></label>
    </p>
    <p>
        <label>Mínimo <input type="text" name="minimo" required></label>
    </p>
    <p>
        <label>Preço <input type="text" name="preco" placeholder="Ex: 4,75" required></label>
    </p>
    <button type="submit">Salvar</button>
</form>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>
