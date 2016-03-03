<?php

if (!defined('BASEPATH'))
    exit('No se permite el acceso directo al script');

class PDF extends FPDF {

    protected $col = 0; // Columna actual
    protected $y0;      // Ordenada de comienzo de la columna

    // Cabecera de página

    function Header() {

        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Título
        $this->SetY(18);
        $this->SetX(35);
        $this->Cell(100, 0, utf8_decode('Estadística de '), 0, 2);
        
        // Salto de línea
        $this->Ln(10);
        $w = array(10, 60, 60, 60);//tiene que sumar 190
        // Cabeceras
        $header = array('Nº', 'Apellido 1º', 'Total', '%');
        
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, utf8_decode ($header[$i]), 1, 0, 'C');
        $this->Ln();
    }

    // Pie de página
    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }

    // Una tabla más completa
    function ImprovedTable($header, $data) {
        // Anchuras de las columnas
        $w = array(10, 60, 60, 60);//tiene que sumar 190
        
        
        $i = 1;
        // Datos
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $i, 'LR');
            $this->Cell($w[1], 6, utf8_decode($row['apellido1']), 'LR');
            $this->Cell($w[2], 6, utf8_decode($row['num']), 'LR');
            $this->Cell($w[2], 6, utf8_decode($row['porcentaje']), 'LR');
            $this->Ln();
            $i++;
            if ($this->GetY() > 264) {
            $this->AddPage();
        }
        }
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    

}
