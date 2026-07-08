<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/categorias', function () {
    $categorias = json_decode(json_encode([
        ["codigo" => "A02", "nombre" => "Medicamentos para el tratamiento de Trastornos causados por Ácidos"],
        ["codigo" => "A03", "nombre" => "Medicamentos contra Trastornos Funcionales Gastrointestinales"],
        ["codigo" => "A04", "nombre" => "Medicamentos Antieméticos y Antinauseosos"],
        ["codigo" => "A06", "nombre" => "Medicamentos para el Estreñimiento"],
        ["codigo" => "A07", "nombre" => "Medicamentos Antidiarreicos, Antiinflamatorios y Antiinfecciosos Intestinales"],
        ["codigo" => "A10", "nombre" => "Medicamentos usados en Diabetes"],
        ["codigo" => "A11", "nombre" => "Vitaminas"],
        ["codigo" => "A12", "nombre" => "Suplementos Minerales"],
    ]));

    $html = "<table border='1' cellpadding='8' cellspacing='0'>";
    $html .= "<tr><th>CÓDIGO</th><th>CATEGORÍA</th></tr>";

    foreach ($categorias as $categoria) {
        $html .= "<tr><td>$categoria->codigo</td><td>$categoria->nombre</td></tr>";
    }

    $html .= "</table>";

    return $html;
});

Route::get('/medicamentos', function () {
    $medicamentos = json_decode(json_encode([
        ["codigo" => "A02BA02", "n" => 1, "nombre" => "Ranitidina", "dosis" => "50 mg", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A02BA03", "n" => 2, "nombre" => "Famotidina", "dosis" => "40 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A02BC01", "n" => 3, "nombre" => "Omeprazol", "dosis" => "20 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A02BC01", "n" => 4, "nombre" => "Omeprazol", "dosis" => "40 mg", "forma" => "Sólidos parenterales", "via" => "IV"],
        ["codigo" => "A03BA01", "n" => 1, "nombre" => "Atropina (Sulfato)", "dosis" => "0.5–1 mg/mL", "forma" => "Líquidos parenterales", "via" => "SC/IM/IV"],
        ["codigo" => "A03BA03", "n" => 2, "nombre" => "Hiosciamina (bromuro de n-butil hioscina)", "dosis" => "10 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A03BA03", "n" => 3, "nombre" => "Hiosciamina (bromuro de n-butil hioscina)", "dosis" => "20 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A03FA01", "n" => 4, "nombre" => "Metoclopramida (clorhidrato)", "dosis" => "5 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A03FA01", "n" => 5, "nombre" => "Metoclopramida (clorhidrato)", "dosis" => "10 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA01", "n" => 1, "nombre" => "Ondansetron", "dosis" => "8 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA01", "n" => 2, "nombre" => "Ondansetron", "dosis" => "2 mg/mL", "forma" => "Líquidos parenterales", "via" => "IV"],
        ["codigo" => "A04AA02", "n" => 3, "nombre" => "Granisetron", "dosis" => "1 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA02", "n" => 4, "nombre" => "Granisetron", "dosis" => "1 mg/mL", "forma" => "Líquidos parenterales", "via" => "IV"],
        ["codigo" => "R06AA11", "n" => 5, "nombre" => "Dimenhidrinato", "dosis" => "50 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "R06AA11", "n" => 6, "nombre" => "Dimenhidrinato", "dosis" => "50 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
    ]));

    $html = "<table border='1' cellpadding='8' cellspacing='0'>";
    $html .= "<tr>
                <th>Código</th>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Dosis</th>
                <th>Forma farmacéutica</th>
                <th>Vía de administración</th>
              </tr>";

    foreach ($medicamentos as $med) {
        $html .= "<tr>
                    <td>$med->codigo</td>
                    <td>$med->n</td>
                    <td>$med->nombre</td>
                    <td>$med->dosis</td>
                    <td>$med->forma</td>
                    <td>$med->via</td>
                  </tr>";
    }

    $html .= "</table>";

    return $html;
});

Route::get('/clientes/vip', function () {
    $clientes = [
        (object)['id' => 1, 'nombre' => 'Karen Criollo', 'telefono' => '+503 789789', 'puntos_acumulados' => 15],
        (object)['id' => 2, 'nombre' => 'Hellen Guzman', 'telefono' => '+503 666006', 'puntos_acumulados' => 5],
        (object)['id' => 3, 'nombre' => 'Maria Lopez', 'telefono' => '+503 1122233', 'puntos_acumulados' => 3],
    ];

    $html = '
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Puntos Acumulados</th>
            </tr>
    ';

    foreach ($clientes as $cliente) {
        $html .= "
            <tr>
                 <td>{$cliente->id}</td>
                 <td>{$cliente->nombre}</td>
                 <td>{$cliente->telefono}</td>
                 <td>{$cliente->puntos_acumulados}</td>
            </tr>
        ";
    }

    $html .= '
        </tbody>
    </table>
    ';

     //Pintamos enla ventana del navegador de la tabla
    echo $html;
});

Route::get('/proveedores/internacionales', function () {

    $proveedores = [
        (object)['empresa' => 'Farmacias Similares', 'pais_origen' => 'México', 'medicamento_principal' => 'acetaminofén', 'tiempo_entrega_dias' => 15],
        (object)['empresa' => 'Farmacias Camila', 'pais_origen' => 'El Salvador', 'medicamento_principal' => 'ibuprofeno', 'tiempo_entrega_dias' => 22],
        (object)['empresa' => 'FarmaNic', 'pais_origen' => 'Nicaragua', 'medicamento_principal' => 'amoxicilina', 'tiempo_entrega_dias' => 7]
    ];

    $html = '
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>País de origen</th>
                <th>Medicamento principal</th>
                <th>Tiempo de entrega (días)</th>
            </tr>
        </head>
    ';

    foreach ($proveedores as $proveedor) {
        $advertencia = $proveedor->tiempo_entrega_dias > 15 ? ' <strong>(Demora Crítica)</strong>' : '';
        $html .= "
            <tr>
                <td>{$proveedor->empresa}</td>
                <td>{$proveedor->pais_origen}</td>
                <td>{$proveedor->medicamento_principal}</td>
                 <td>{$proveedor->tiempo_entrega_dias}{$advertencia}</td>
            </tr>
        ";
    }

    $html .= '
        </tbody>
    </table>
    ';

    echo $html;
});

Route::get('/lotes/inventario', function () {

    $lotes = [
        (object)['codigo_lote' => 'L01', 'nombre_medicamento' => 'Insulina Glargina', 'cantidad_cajas' => 110, 'temperatura_requerida_celsius' => 4],
        (object)['codigo_lote' => 'L02', 'nombre_medicamento' => 'ibuprofeno', 'cantidad_cajas' => 30, 'temperatura_requerida_celsius' => 20],
        (object)['codigo_lote' => 'L03', 'nombre_medicamento' => 'Vacuna influenza', 'cantidad_cajas' => 112, 'temperatura_requerida_celsius' => 2]
    ];

    $html = '
    <table border = "1" cellpading="0">
        <thead>
            <tr>
                <th>Códig
                o de Lote</th>
                <th>Nombre del Medicamento</th>
                <th>Cantidad de Cajas</th>
                <th>Temperatura Requerida en celsius (°C)</th>
            </tr>
        </thead>
        <tbody>
    ';

    foreach ($lotes as $lote) {
        $etiqueta = $lote->temperatura_requerida_celsius <= 5 ? ' <strong>[Requiere Cadena de Frío]</strong>' : '';

        $html .= "
            <tr>
                <td>{$lote->codigo_lote}</td>
                <td>{$lote->nombre_medicamento}{$etiqueta}</td>
                <td>{$lote->cantidad_cajas}</td>
                <td>{$lote->temperatura_requerida_celsius}</td>
            </tr>
        ";
    }

    $html .= '
        </tbody>
    </table>
    ';

    echo $html;
});
require __DIR__.'/settings.php';
