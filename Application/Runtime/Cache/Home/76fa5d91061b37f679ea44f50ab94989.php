<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="<?php echo U('upload');?>" enctype="multipart/form-data" method="post">
	<input type="file"name="photo" />
	<input type="submit"value="导入数据">
 </body>
 </html>