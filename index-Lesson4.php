<?php

	include "header.php";
	include "conf/config.php";
	/*Функция загрузки изображений из папки*/
	/*function renderImg(){
	$imgSmall = scandir('img/small/');
		foreach($imgSmall as $nameImg){
			if($nameImg == "." ||$nameImg == ".."){
				continue;
			}else{
				echo "<a href='img/big/$nameImg' class='modal'><img src='img/big/$nameImg'/></a>";
			}
		}
	} */
	
	/*Функция добавления информации о файле в базу данных*/
	function addInfoIntoDB(){
		
		if(isset($_FILES['image'])){
			include "conf/config.php";
			$fileName = $_FILES['image']['name'];
			$fileSize = $_FILES['image']['size'];
			$fileType = $_FILES['image']['type'];
			$fileTmp = $_FILES['image']['tmp_name'];
			$extensions = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG']; //Добавляем в массив все расширения которые хотим загрузить
			$fileExt = array_pop(explode('.', $fileName));//создаем массив из имени загружаемого файла и выбираем последний элемент, то есть формат 
			$insertImg = "INSERT INTO pictures (name, size, path) VALUES ('$fileName', '$fileSize', 'img/small/')"; //Делаем запрос на добавление данных в базу
			if(!in_array($fileExt, $extensions)){//Проверяем, присутствует ли в нашем массиве необходимый формат, и если нет, то сразу выходим
				echo "Данный формат файла не поддерживается";
			}else{
				move_uploaded_file($fileTmp, "img/small/".$fileName);
				copy("img/small/".$fileName, "img/big/".$fileName);// если формат подходит то загружаем
				if(mysqli_query($link, $insertImg)){
					echo "Файл загружен";
					mysqli_close($link);
				}else{
					echo "Упс, что-то пошло не так";
				}
					
			}
		}
	}
	
	$sql = "Select * from pictures";
	$res = mysqli_query($link, $sql);
	while ($data = mysqli_fetch_assoc($res)) {
		echo "<a href = 'img/big/".$data['name']."' class='modal'><img src = ".$data['path'].$data['name']."></a>";
		
	}
	
	include ("footer.php");
?>
       