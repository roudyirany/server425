<?php
    header('Content-type: text/plain; charset=utf-8');

 if (isset($_FILES['file'])) 
 {
    $file = $_FILES['file'];

    // File Properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    //filename
    $id = 'uploads/Test';

    if (!file_exists($id)) 
    {
        mkdir($id, 0777, true);
    }

        if ($file_error === 0) {
            echo('file error: '.$file_error);
            if ($file_size <= 20485760) {
                echo(' file size: '.$file_size);
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = $id .'/'. $file_name_new;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    echo $file_destination;
                }
            }
        }
}

    ?>
