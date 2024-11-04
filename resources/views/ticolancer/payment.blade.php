<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
    <!-- Puedes incluir CSS o frameworks de estilo aquí -->
</head>
<body>
    <h1>Formulario de Pago</h1>
    <form method="POST">
        @csrf <!-- Token CSRF para proteger contra ataques -->
        <div>
            <label for="amount">Monto a Pagar:</label>
            <input type="text" id="amount" name="amount" required>
        </div>
        <div>
            <label for="payment_method">Método de Pago:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card">Tarjeta de Crédito</option>
                <option value="paypal">PayPal</option>
                <!-- Otros métodos de pago -->
            </select>
        </div>
        <button type="submit">Realizar Pago</button>
    </form>
</body>
</html>
