<?php

use Gumlet\ImageResize;

/**
 * Move uploaded file (Laravel style)
 *
 * @param \Illuminate\Http\UploadedFile $file
 * @param string $target_path
 * @param string $related_to
 * @return array
 */
if (!function_exists('move_temp_file')) {

    function move_temp_file($file, $target_path, $related_to = "")
    {

        if (!$file || !$file->isValid()) {
            return ['error' => 'Invalid file upload'];
        }

        $allowedExtensions = ['jpg','jpeg','png','gif','webp','pdf','doc','docx','xls','xlsx'];
        $fileExtension = strtolower($file->getClientOriginalExtension());

        // ตั้งชื่อไฟล์ใหม่
        $file_name = $related_to . "-" . uniqid();
        $file_name = str_replace(["’", "'", "(", ")"], "-", $file_name);
        $file_name .= "." . $fileExtension;

        // สร้างโฟลเดอร์ถ้ายังไม่มี
        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, true);
        }

        // ย้ายไฟล์
        $full_target_path = rtrim($target_path, "/") . "/" . $file_name;
        $file->move($target_path, $file_name);

        $file_check = false;
        if (in_array($fileExtension, ['jpg','jpeg','png','gif','webp'])) {
            try {
                $image = new ImageResize($full_target_path);
                if ($image->getSourceWidth() > 1500) {
                    $image->resizeToWidth(1500);
                } else {
                    $image->scale(80);
                }
                $image->save($full_target_path);
                $file_check = true;
            } catch (\Exception $e) {
                error_log("Image resize error: " . $e->getMessage());
            }
        }

        return [
            'file_check' => $file_check,
            'file_name' => $file_name,
            'file_path' => $full_target_path
        ];
    }

}
