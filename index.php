<?php
    include_once('helpers/url.php');
    include_once('gerar_pdf.php');
    
    require 'vendor/autoload.php';
    use Dompdf\Dompdf;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    
    <link href="<?= $BASE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $BASE_URL ?>assets/css/main.css" rel="stylesheet">
    <script src="<?= $BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <main class="form-container">
        <form action="index.php" method="post">
            <h2> Form </h2>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input class="form-control" type="text" placeholder="Default input" name="name" aria-label="default input example">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="options_select" >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="mb-3">
                <h3>
                    Options 
                </h3>
                <div class="form-check">
                    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Default checkbox
                    </label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_2" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Checked checkbox
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Generate PDF</button>
            </div>
        </form>
    </main>
</body>
</html>');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    
    <link href="<?= $BASE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $BASE_URL ?>assets/css/main.css" rel="stylesheet">
    <script src="<?= $BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <main class='form-container'>
        <form action="index.php" method='post'>
            <h2> Form </h2>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input class="form-control" type="text" placeholder="Default input" name='name' aria-label="default input example">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name='email' class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" name='description' id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name='options_select' >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="mb-3">
                <h3>
                    Options 
                </h3>
                <div class="form-check">
                    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Default checkbox
                    </label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_2" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Checked checkbox
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Generate PDF</button>
            </div>
        </form>
    </main>
</body>
</html>