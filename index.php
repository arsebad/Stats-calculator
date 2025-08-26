<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stats Calculator</title>
</head>
<body>
    <form action="calcular.php" method="get">
        <table border="1">
            <tr>
                <th colspan="2">ESTADISTICA</th>
            </tr>
            <tr>
                <td>
                    EDAD
                </td>
                <td>
                    <input type="number" name="pjedad" id="edadpj">
                    <label for="pjedad">Años</label>
                </td>
            </tr>
            <tr>
                <td>
                    ALTURA
                </td>
                <td>
                    <input type="number" name="pjestatura" id="estaturapj" min="150">
                    <label for="pjestatura">Centimetros</label>
                </td>
            </tr>
            <tr>
                <td>
                    PESO
                </td>
                <td>
                    <input type="number" name="pjpeso" id="pesopj" >
                    <label for="pjpeso">Kilogramos</label>
                </td>
            </tr>
            <tr>
                <td>
                    % DE ENTRENAMIENTO
                </td>
                <td>
                    <input type="number" name="pjPDE" id="PDEpj" min="5" max="50">
                    <label for="pjPDE">5-50%</label>
                </td>
            </tr>
        </table>
        <input type="submit" value="CALCULAR">
    </form>
</body>
</html>