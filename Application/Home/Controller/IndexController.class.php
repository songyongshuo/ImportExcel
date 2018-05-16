<?php
namespace Home\Controller;
use Think\Controller;
use PHPExcel_IOFactory;
use PHPExcel;
use Behavior;
class IndexController extends Controller {
	public function index(){
		$this->display();
	}
	public function upload() {
		ini_set('memory_limit','1024M');
		if (!empty($_FILES)) {
			$config = array(
				'exts' => array('xlsx','xls'),
				'maxSize' => 3145728000,
				'rootPath' =>"./Public/",
				'savePath' => 'Uploads/',
				'subName' => array('date','Ymd'),
			);
			$upload = new \Think\Upload($config);
			if (!$info = $upload->upload()) {
				$this->error($upload->getError());
			}
			vendor("PHPExcel.PHPExcel");
			$file_name=$upload->rootPath.$info['photo']['savepath'].$info['photo']['savename'];
			$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));//判断导入表格后缀格式
			if ($extension == 'xlsx') {
				$objReader =\PHPExcel_IOFactory::createReader('Excel2007');
				$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
			} else if ($extension == 'xls'){
				$objReader =\PHPExcel_IOFactory::createReader('Excel5');
				$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
			}
			$sheet =$objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();//取得总行数
			$highestColumn =$sheet->getHighestColumn(); //取得总列数
			D('pro_info')->execute('truncate table pro_info');
			for ($i = 2; $i <= $highestRow; $i++) {
				//看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置
				$data['pId'] =$objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();
				$data['pName'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();
				$data['pPrice'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue();
				$data['pCount'] = $objPHPExcel->getActiveSheet()->getCell("D". $i)->getValue();
				//看这里看这里,这个位置写数据库中的表名
				
				D('pro_info')->add($data);
			}
			$this->success('导入成功!');
		} else {
			$this->error("请选择上传的文件");
		}
	}
}