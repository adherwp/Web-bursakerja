<?php
if(isset($_REQUEST["file"])){
    // Get parameters
    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
    // die($file);
    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */
    // die($file.'hai');
    if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){
        $filepath_foto_pribadi = "../../uploads/foto_pribadi/" . $file;
        $filepath_ijazah = "../../uploads/ijazah/" . $file;
        $filepath_ktp = "../../uploads/ktp/" . $file;
        // die($filepath_ktp);
        $filepath_akte = "../../uploads/akte/" . $file;
        $filepath_sertifikat = "../../uploads/sertifikat/" . $file;

        // Process download foto pribadi
        if(file_exists($filepath_foto_pribadi)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath_foto_pribadi).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath_foto_pribadi));
            flush(); // Flush system output buffer
            readfile($filepath_foto_pribadi);
            die();
        } 
        // Process download Ijazah
        elseif(file_exists($filepath_ijazah)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath_ijazah).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath_ijazah));
            flush(); // Flush system output buffer
            readfile($filepath_ijazah);
            die();
        }

        // Process download ktp
        elseif(file_exists($filepath_ktp)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath_ktp).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath_ktp));
            flush(); // Flush system output buffer
            readfile($filepath_ktp);
            die();
        }

        // Process download akte
        elseif(file_exists($filepath_akte)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath_akte).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath_akte));
            flush(); // Flush system output buffer
            readfile($filepath_akte);
            die();
        }

        // Process download sertifikat
        elseif(file_exists($filepath_sertifikat)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath_sertifikat).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath_sertifikat));
            flush(); // Flush system output buffer
            readfile($filepath_sertifikat);
            die();
        }  
        
        else {
            http_response_code(404);
	        die();
        }
    } else {
        die("Invalid file name!");
    }
}
?>