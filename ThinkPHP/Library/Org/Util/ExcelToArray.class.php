<?php
    namespace Org\Util;
    class ExcelToArrary {  
    public function __construct() {  
        Vendor("PHPExcel.Classes.PHPExcel");//引入phpexcel类(留意路径,不了解路径可以查看下手册)  
        Vendor("PHPExcel.Classes.PHPExcel.IOFactory"); //引入phpexcel类(留意路径)      
    }  
    public function read($filename,$encode,$file_type){  
        if(strtolower ( $file_type )=='xls')//判断excel表类型为2003还是2007  
        {  
            Vendor("PHPExcel.Classes.PHPExcel.Reader.Excel5"); //引入phpexcel类(留意路径)  
            $objReader = PHPExcel_IOFactory::createReader('Excel5');  
        }elseif(strtolower ( $file_type )=='xlsx')  
        {  
            Vendor("PHPExcel.Classes.PHPExcel.Reader.Excel2007");//引入phpexcel类(留意路径)   
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');  
        }  
        $objReader->setReadDataOnly(true);  
        $objPHPExcel = $objReader->load($filename);  
        $objWorksheet = $objPHPExcel->getActiveSheet();  
        $highestRow = $objWorksheet->getHighestRow();  
        $highestColumn = $objWorksheet->getHighestColumn();  
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  
        $excelData = array();  
        for ($row = 1; $row <= $highestRow; $row++) {  
            for ($col = 0; $col < $highestColumnIndex; $col++) {  
                $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  
                }  
        }  
        return $excelData; 
    } 
} 
?>