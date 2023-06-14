<?php

require 'vendor/autoload.php';
use Dompdf\Dompdf;

function gerar_pdf(){
        $dompdf = new Dompdf(['enable_remote' => true]);

        $dados = '<!DOCTYPE html>';
        $dados .= '<html lang="pt-br">';
        $dados .= '<head>';
        $dados .= '    <meta charset="UTF-8">';
        $dados .= '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';  
        $dados .= '    <link href="http://localhost/gerador-pdf-php/assets/css/bootstrap.min.css" rel="stylesheet">';
        $dados .= '    <link href="http://localhost/gerador-pdf-php/assets/css/main.css" rel="stylesheet">';
        $dados .= '    <script src="http://localhost/gerador-pdf-php/assets/js/bootstrap.bundle.min.js"></script>';
        $dados .= '    <title>Form</title>';
       $dados .= ' </head>';
        $dados .= '<body>';
        $dados .= '    <main class="form-container">';
        $dados .= '        <form action="index.php" method="post">';
        $dados .= '            <h2> Form </h2>';

        $dados .= '            <div class="mb-3">';
        $dados .=               '<label for="exampleFormControlInput1" class="form-label">Name</label>';
        $dados .= '                <input class="form-control" type="text" placeholder="Default input" name="name" aria-label="default input example" value="'.$_POST['name'].'">';
                    $dados .= '</div>';

                    $dados .= '<div class="mb-3">';
                        $dados .= '<label for="exampleFormControlInput1" class="form-label">Email address</label>';
                        $dados .= '<input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="'.$_POST['email'].'">';
                    $dados .= '</div>';

                    $dados .= '<div class="mb-3">';
                        $dados .= '<label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>';
                        $dados .= '<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" value="">'.$_POST['description'].'</textarea>';
                    $dados .= '</div>';

                    $dados .= '<div class="mb-3">';
                        $dados .= '<select class="form-select" aria-label="Default select example" name="options_select" >';
                            $dados .= '<option selected>Open this select menu</option>';
                            $dados .= '<option value="1">One</option>';
                            $dados .= '<option value="2">Two</option>';
                            $dados .= '<option value="3">Three</option>';
                        $dados .= '</select>';
                    $dados .= '</div>';

                    $dados .= '<div class="mb-3">';
                        $dados .= '<h3>';
                            $dados .= 'Options ';
                        $dados .= '</h3>';
                        $dados .= '<div class="form-check">';
                        $dados .= '    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_1" id="flexCheckDefault">';
                        $dados .= '    <label class="form-check-label" for="flexCheckDefault">';
                        $dados .= '        Default checkbox';
                        $dados .= '    </label>';
                        $dados .= '</div>';
                        
                        $dados .= '<div class="form-check">';
                        $dados .= '    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_2" id="flexCheckChecked" checked>';
                        $dados .= '    <label class="form-check-label" for="flexCheckChecked">';
                        $dados .= '        Checked checkbox';
                        $dados .= '    </label>';
                        $dados .= '</div>';
                    $dados .= '</div>';
                $dados .= '</form>';
            $dados .= '</main>';
        $dados .= '</body>';
        $dados .= '</html>';
        
        $dompdf->loadHtml($dados);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
}