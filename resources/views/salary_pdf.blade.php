<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recibo de pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Recibo de pago</h1>
    <table>
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Salario bruto</td>
                <td>{{ $salary }}</td>
            </tr>
            @foreach ($discounts as $discount)
            <tr>
                <td>{{ $discount['name'] }}</td>
                <td>{{ $discount['total_discounted'] }}</td>
            </tr>
            @endforeach

            {{-- <tr>
                <td>Total neto</td>
                <td>{{ $salary - $total_taxes   }}</td>
            </tr> --}}
        </tbody>
    </table>
	<p>Otros detalles:</p>
	<ul>
		<li>Nombre del empleado: {{ $user->name }}</li>
		<li>Número de identificación: {{ $user->identification }}</li>
		<li>Fecha de pago: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</li>
	</ul>
</body>
</html>