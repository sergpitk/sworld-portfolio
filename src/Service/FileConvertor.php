<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pitkevich <sergpitk@andi.lv>
 * Date: 01/02/2020
 * Time: 20:51
 */

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FileConvertor
{
    private $targetDirectory;
    private $sourceDirectory;

    public function __construct($targetDirectory, $sourceDirectory)
    {
        $this->targetDirectory = $targetDirectory;
        $this->sourceDirectory = $sourceDirectory;
    }

    /**
     * @param  $sourceFileName
     * @return mixed
     */
    public function convert($sourceFileName)
    {
        // todo get lib based on GraphicMagic and convert pdf to thumbnail
        $targetFile = $this->sourceDirectory.$sourceFileName;

        return $targetFileName = 'pnggrad8rgb.png';
//        return $targetFileName = 'file_example_PNG_500kB.png';
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

}