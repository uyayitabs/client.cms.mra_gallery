<?php

use App\Services\PhotoService;

if (!function_exists('getS3Image')) {
    /**
     * PhotoService.getS3Object helper
     *
     * @param string $photoImage
     * @return void
     */
    function getS3Image(string $photoImage)
    {
        $service = new PhotoService();
        return $service->getS3Object($photoImage);
    }
}

if (!function_exists('isProduction')) {
    /**
     * Check if in production env function
     *
     * @return boolean
     */
    function isProduction(): bool
    {
        return config('app.env') === 'production';
    }
}

if (!function_exists('fixOrientation')) {
    /**
     * Fix image orientation function
     *
     * @param string $filename
     * @return void
     */
    function fixOrientation(string $filename) {
        $image = imagecreatefromjpeg($filename);
        $exif = exif_read_data($filename);
    
        if (array_keys($exif, 'Orientation') && !empty($exif['Orientation'])) {
            switch ($exif['Orientation']) {
                case 3:
                    $image = imagerotate($image, 180, 0);
                    break;
    
                case 6:
                    $image = imagerotate($image, -90, 0);
                    break;
    
                case 8:
                    $image = imagerotate($image, 90, 0);
                    break;
            }
        }
        imagejpeg($image, $filename);        
    }
}
 