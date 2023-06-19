<?php
    include_once('helpers/url.php');
    include_once('gerar_pdf.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uploadfile =  'C:/laragon/www/gerador-pdf-php/assets/image/temp/'. basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
        //rename($_FILES['tmp_name']  ,$BASE_URL.'image/temp/imagem.png');
        $path_file = $BASE_URL . 'assets/image/temp/'. basename($_FILES['file']['name']);
        //print_r(trim($path_file));
        gerar_pdf(trim($path_file));
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
        <form action="index.php" method='post' enctype="multipart/form-data">
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
                        Option 1
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_2" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Option 2
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_3" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Option 3
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_4" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Option 4
                    </label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" name="checkb[]" type="checkbox" value="check_box_5" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Option 5
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleColorInput" class="form-label">Color picker</label>
                <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" name="file" id="formFile">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Link - QRCode</label>
                <input class="form-control" type="text" placeholder="Default input" name='link-qr-code' aria-label="default input example">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Generate PDF</button>
            </div>

        </form>
    </main>
</body>
</html>