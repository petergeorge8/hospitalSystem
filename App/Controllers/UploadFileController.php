<?php

namespace App\Controllers;

class UploadFileController
{
    /**
     * Uploads a file to a folder.
     */
    public function uploadToFolder()
    {
        if ($this->isFileExtensionValid($_FILES['file']['type'])) {
            $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $newFileName = $this->generateUniqueFileName($fileExtension);
            $destination = __DIR__ . "/../../Storage/" . $newFileName;
            
            if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
                session_start();
                $_SESSION['fileIsSet'] = true;
                header('Location: /uploadFile');
                exit;
            } else {
                // Handle file upload error
            }
        } else {
            // Handle invalid file extension
        }
    }
    
    /**
     * Checks if the file extension is valid.
     *
     * @param string $fileType The file type to check.
     * @return bool Returns true if the file extension is valid, false otherwise.
     */
    private function isFileExtensionValid(string $fileType): bool
    {
        $validExtensions = [
            'image/jpeg' => ['jpg', 'jpeg'],
            'image/png' => ['png']
        ];

        return in_array($fileType, array_keys($validExtensions));
    }
    
    /**
     * Generates a unique file name.
     *
     * @param string $fileExtension The file extension.
     * @return string The unique file name.
     */
    private function generateUniqueFileName(string $fileExtension): string
    {
        $fileName = uniqid() . '.' . $fileExtension;
        return $fileName;
    }
    
    /**
     * Displays the uploaded files.
     */
    public function view()
    {
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
    }
}
