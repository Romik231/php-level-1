
<?php

	require_once "conf/config.php";
	
/***Функция ресайза изображений***/

	function changeImage($h, $w, $src, $newsrc, $fileType) {
			
	    $newimg = imagecreatetruecolor($h, $w);
		    if ($fileType == 'jpeg' or $fileType == 'JPEG'){ 
		     	$img = imagecreatefromjpeg($src);
		        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
		        imagejpeg($newimg, $newsrc);
		    } elseif ($fileType == 'jpg' or $fileType == 'JPG') {
		    	$img = imagecreatefromjpg($src);
		        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
		        imagejpg($newimg, $newsrc);
		    } elseif($fileType == 'png' or $fileType == 'PNG') {
		    	$img = imagecreatefrompng($src);
		        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
		        imagepng($newimg, $newsrc);
		    } 
	}

   /*****************************/

	/***Загрузка изображений и добавление информации о файле в базу данных***/
	
		
	if(isset($_FILES['image'])){
		$fileName = $_FILES['image']['name'];
		$fileSize = $_FILES['image']['size'];
		$fileType = explode('/', $_FILES['image']['type'])[1];
		$fileTmp = $_FILES['image']['tmp_name'];
		$insertImg = "INSERT INTO pictures (name, size, path) VALUES ('$fileName', '$fileSize', 'img/small/')"; //Делаем запрос на добавление данных в базу
		if(!$fileType){
			echo "Данный формат файла не поддерживается";
		}else{
			changeImage(200, 300, $fileTmp, 'img/small/'.$fileName, $fileType);//Вызываем функцию изменения размера изображения
			move_uploaded_file($fileTmp, 'img/big/'.$fileName);
			if(mysqli_query($link, $insertImg)){
				echo "Фал загружен";
			}else{
				echo "Упс, что-то пошло не так";
			}
		}
	}
	
	/***************************************************************/
	
	$id = $_GET['id'];
	$sqlQuery = "SELECT * FROM pictures ORDER BY click";
	$result = mysqli_query($link, $sqlQuery);
	$sqlnewseen = "UPDATE pictures SET click=click+1 WHERE id=";
		while ($data = mysqli_fetch_assoc($result)) {
							
				echo "<a href=index.php?id=".$data['id']." id=img_".$data['id']." target='_blank'><img src=".$data['path'].$data['name']."></a>";
				mysqli_query($link, $sqlnewseen.$data["id"]);
		}
	print_r($_GET['id']);	
?>
      