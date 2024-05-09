<?php

$backupFolder = 'C:\xampp\mysql\backup';
$dataFolder = 'C:\xampp\mysql\data';

// Open the backup folder
if ($handle = opendir($backupFolder)) {
    // Loop through each file in the backup folder
    while (false !== ($file = readdir($handle))) {
        // Exclude ibdata1 file
        if ($file != '.' && $file != '..' && $file != 'ibdata1') {
            // Check if it's a file
            if (is_file($backupFolder . '/' . $file)) {
                // Copy the file to the data folder
                if (!copy($backupFolder . '/' . $file, $dataFolder . '/' . $file)) {
                    echo "Failed to copy $file...\n";
                } else {
                    echo "Copied $file successfully.\n";
                }
            }
        }
    }
    closedir($handle);
} else {
    echo "Failed to open the backup folder.\n";
}
?>
