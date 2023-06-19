<?php


require 'vendor/autoload.php';
use Dompdf\Dompdf;
use chillerlan\QRCode\{QRCode, QROptions};

function gerar_pdf($path_file){
        $dompdf = new Dompdf(['enable_remote' => true]);
        $qr_code = (new QRCode)->render($_POST['link-qr-code']);

        $dados = '<!DOCTYPE html>';
        $dados .= '<html lang="pt-br">';
        $dados .= '<head>';
        $dados .= '    <meta charset="UTF-8">';
        $dados .= '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';  
        
        //$dados .= '    <link href="http://localhost/gerador-pdf-php/assets/css/bootstrap.min.css" rel="stylesheet">';
        $dados .= '    <link href="http://localhost/gerador-pdf-php/assets/css/main.css" rel="stylesheet">';
        //$dados .= '    <script src="http://localhost/gerador-pdf-php/assets/js/bootstrap.bundle.min.js"></script>';
        
        $dados .= '    <title>Form</title>';
        $dados .= ' </head>';
        $dados .= '<body>';
        $dados .= '<main class="form-container">';

        $dados .= '<h1> Form </h1>';
        
        $dados .= '<div class="input-container">';
        $dados .=   '<div class="n-label"> Nome </div>';
        $dados .=   '<div class="n-box">'.$_POST['name'].'</div>';
        $dados .= '</div>';

        $dados .= '<div class="input-container">';
        $dados .=   '<div class="n-label"> Email </div>';
        $dados .=   '<div class="n-box">'.$_POST['email'].'</div>';
        $dados .= '</div>';

        $dados .= '<div class="input-container">';
        $dados .=   '<div class="n-label"> Descrição </div>';
        $dados .=   '<div class="n-box">'.$_POST['description'].'</div>';
        $dados .= '</div>';

        $dados .= '<div class="input-container">';
        $dados .=   '<div class="n-label"> Seleção </div>';
        $dados .=   '<div class="n-box">'.$_POST['options_select'].'</div>';
        $dados .= '</div>';

        
        $dados .= '<div class="input-container">';
        $dados .=   '<div class="n-label"> Checkbox </div>';
        $dados .=   '<div class="n-box">';
        foreach($_POST['checkb'] as $optionchk):
            $dados .= $optionchk . ';';
        endforeach; 
        $dados .=   '</div>';
        $dados .= '</div>';
        
        $dados .= '<div class="input-container">';
        $dados .=   '<div class="n-label"> Cor </div>';
        $dados .=   '<div class="n-box" style="background-color:'.$_POST['color'].'">';
        $dados .=   '</div>';
        $dados .= '</div>';

        $dados .= '<div class="input-container">';
        $dados .=   '<div class="n-label"> Imagem </div>';
        $dados .=   '<div class="n-box">';
        $dados .=       '<img src="'. $path_file . '" width="300" height="300">';
        $dados .=   '</div>';
        $dados .= '</div>';

        $dados .= '<div class="input-container">';
        $dados .=   '<div class="n-label"> QRCode </div>';
        $dados .=   '<div class="n-box">';
        $dados .=       '<img src="'. $qr_code . '" width="100" height="100">';
        $dados .=   '</div>';
        $dados .= '</div>';

        $dados .= '</main>';
        $dados .= '</body>';
        $dados .= '</html>';
        
        $dompdf->loadHtml($dados);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("form.pdf");
}

