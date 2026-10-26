<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<div class="container mt-4">
    <h1 class="text-center mb-4">Editar produto</h1>

    <form action="/produtos/atualizar" method="POST">
        <input type="hidden" name="id"
               value="<?= htmlspecialchars($produto['id']) ?>">

        <label>Nome do produto</label>
        <input class="form-control mb-3" type="text" name="nome"
               value="<?= htmlspecialchars($produto['nome']) ?>" required>

        <label>Unidade</label>
        <input class="form-control mb-3" type="text" name="unidade"
               value="<?= htmlspecialchars($produto['unidade']) ?>" required>

        <label>Quantidade</label>
        <input class="form-control mb-3" type="number" name="quantidade"
               value="<?= $produto['quantidade'] ?>" required>

        <label>Estoque mínimo</label>
        <input class="form-control mb-3" type="number" name="minimo"
               value="<?= $produto['minimo'] ?>" required>

        <label>Preço</label>
        <input class="form-control mb-3" type="text" name="preco"
               value="<?= $produto['preco'] ?>" required>

        <button class="btn btn-primary" type="submit">
            <i class="bi bi-check-circle"></i> Salvar alterações
        </button>

        <a href="/" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>