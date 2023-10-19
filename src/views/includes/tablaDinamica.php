<?php

function generateTable($data) {
    if (empty($data)) {
        return "No hay datos disponibles";
    }

    $columns = array_keys($data[0]);
    
    $table = "<table id='tablaDocs' class='table table-hover table-bordered table-striped'>";
    $table .= "<thead class='thead-dark'><tr>";

    foreach ($columns as $column) {
        $table .= "<th>{$column}</th>";
    }

    $table .= "</tr></thead>";
    $table .= "<tbody>";

    foreach ($data as $row) {
        $table .= "<tr>";
        foreach ($row as $columnName => $cell) {
            if ($columnName == "Acciones") {
                $table .= "<td class='text-center'>";
                $table .= "<a href='{$cell}' target='_blank'>";
                $table .= "<i class='fas fa-file-pdf fa-2x text-danger'></i>";
                $table .= "</a>";
                $table .= "</td>";
            } else {
                $table .= "<td>{$cell}</td>";
            }
        }
        $table .= "</tr>";
    }

    $table .= "</tbody>";
    $table .= "</table>";

    return $table;
}



/*function generateTable($data) {
    if (empty($data)) {
        return "<div class='card-body'>No hay datos disponibles</div>";
    }

    $columns = array_keys($data[0]);
    
    $table = "<div class='card-body'>";
    $table .= "<table id='tablaDocs' class='table table-hover table-bordered table-striped'>";
    
    // Encabezados
    $table .= "<thead class='thead-dark'><tr>";
    foreach ($columns as $column) {
        $table .= "<th>{$column}</th>";
    }
    $table .= "</tr></thead>";

    // Cuerpo de la tabla
    $table .= "<tbody>";
    foreach ($data as $row) {
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>{$cell}</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</tbody>";

    // Pie de la tabla
    $table .= "<tfoot><tr>";
    foreach ($columns as $column) {
        $table .= "<th>{$column}</th>";
    }
    $table .= "</tr></tfoot>";
    
    $table .= "</table>";
    $table .= "</div>";

    return $table;
}
*/