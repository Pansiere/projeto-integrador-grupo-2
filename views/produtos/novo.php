<?php require dirname(__DIR__) . '/partials/topo.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        color: #1b263b;
    }

    h1 {
        text-align: center;
        color: #0b1f3a;
        margin: 30px 0;
        font-size: 32px;
    }

    form {
        background-color: white;
        width: 90%;
        max-width: 500px;
        margin: 30px auto;
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

    input {
        display: block;
        width: 100%;
        box-sizing: border-box;
        padding: 12px;
        margin-top: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        outline: none;
    }

    input:focus {
        border-color: #dc3545;
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.3);
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

    @media (max-width: 600px) {
        form {
            padding: 20px;
        }

        h1 {
            font-size: 26px;
        }
    }
</style>

<h1>Cadastrar produto</h1>

<form action="/produtos" method="post">
    <p>
        <label>Nome
            <input type="text" name="nome" required>
        </label>
    </p>

    <p>
        <label>Unidade
            <input type="text" name="unidade" required>
        </label>
    </p>

    <p>
        <label>Quantidade
            <input type="number" name="quantidade" min="0" required>
        </label>
    </p>

    <p>
        <label>Mínimo
            <input type="number" name="minimo" min="0" required>
        </label>
    </p>

    <p>
        <label>Preço
            <input type="text" name="preco" placeholder="Ex: 4,75" required>
        </label>
    </p>

    <button type="submit">Salvar</button>
</form>

<?php require dirname(__DIR__) . '/partials/rodape.php'; ?>