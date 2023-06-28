<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    include_once('../../Views/Main/partials/header.php');

    $columns = ['id_persona', 'id_tipo_dispositivo', 'id_marca', 'id_color'];
    $table = 'dispositivos';
    $campo = isset($_POST['campo']) ? $conn->real_escape_string( $_POST['campo']) : null;

    $sql = "SELECT" . implode(",", $columns) . "
    FROM $table";
    $resultado = $conn->query($sql);
    $num_rows = $resultado->num_rows; 
    $html = '';

    if ($num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . $row['id_persona'] . '</td>';
            $html .= '<td>' . $row['id_tipo_dispositivo'] . '</td>';
            $html .= '<td>' . $row['id_marca'] . '</td>';
            $html .= '<td>' . $row['id_color'] . '</td>';
            $html .= '<td><a href="">Editar</td>';
            $html .= '<td><a href="">eliminar</td>';
            $html .= '</tr>';
        }
    }else{
        $html .= '<tr>';
        $html .= '<td colspan="6">sin result</td>';
        $html .= '</tr>';
    }
    echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>