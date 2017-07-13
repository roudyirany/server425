<?php
    header('Content-type: text/plain; charset=utf-8');

    echo('Hello!');

 if (isset($_FILES['file'])) 
 {
    $file = $_FILES['file'];

    // File Properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Work out the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('png', 'jpg');

    //filename
    $id = 'uploads/Test';

    if (!file_exists($id)) 
    {
        mkdir($id, 0777, true);
    }

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 2097152) {

                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = $id .'/'. $file_name_new;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    echo $file_destination;
                }
            }
        }
    }
}

    ?>
