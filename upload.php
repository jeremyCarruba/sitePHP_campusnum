<?php
if(isset($_POST['upload_file'])){
    $file = $_FILES['image_disk'];

    $fileName=$_FILES['image_disk']['name'];
    $fileTmpName=$_FILES['image_disk']['tmp_name'];
    $fileSize=$_FILES['image_disk']['size'];
    $fileError=$_FILES['image_disk']['error'];
    $fileType=$_FILES['image_disk']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExtension, $allowed)) {
        if($fileError === 0) {
            if($fileSize < 1000000) {
                $fileNameNew = "cover." . $fileActualExtension;
                $fileDestination = 'media/uploads/'.$fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);

                header("Location: addArticle.php?upload=success");

            } else {
                echo "Your file is too big";
            }
        } else {
            echo "There was an error while uploading";
        }
    } else {
        echo "You cannot upload files of this type";
    }
}
?>