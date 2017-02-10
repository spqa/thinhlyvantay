<?php
/**
 * Created by PhpStorm.
 * User: super
 * Date: 2/10/2017
 * Time: 1:04 PM
 */

namespace App\ExelTemplate;


use Maatwebsite\Excel\Files\NewExcelFile;

class SubjectMarkReport extends NewExcelFile
{

    /**
     * Get file
     * @return string
     */
    public function getFilename()
    {
        return 'bảng điểm';
    }
}