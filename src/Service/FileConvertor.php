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
    private $prefixPath;
    private $targetDirectory;
    private $sourceDirectory;

    public function __construct($prefixPath, $targetDirectory, $sourceDirectory)
    {
        $this->prefixPath = $prefixPath;
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

        // todo see above
        /*try {
            $file->move($this->prefixPath.$this->getTargetDirectory(), $targetFileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }*/

        return $targetFileName = 'pnggrad8rgb.png';
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

}