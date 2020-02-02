<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pitkevich <sergpitk@andi.lv>
 * Date: 01/02/2020
 * Time: 20:51
 */

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileConvertor
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    public function convert(UploadedFile $file)
    {
        // todo get lib based on GraphicMagic and convert pdf to thumbnail

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}