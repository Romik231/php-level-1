<?php

	include ("header.php");

	/*Функция загрузки изображений из папки*/
	function renderImg(){
	$imgSmall = scandir('img/small/');
		foreach($imgSmall as $nameImg){
			if($nameImg == "." ||$nameImg == ".."){
				continue;
			}else{
				echo "<a href='img/big/$nameImg' class='modal' target='_blank'><img src='img/small/$nameImg'/></a>";
			}
		}
	} 
	
	/*Функция добавления информации о файле в базу данных*/
	function addInfoIntoDB(){
		include ("conf/config.php");
		if(isset($_FILES['image'])){
			$link = mysqli_connect($host, $user, $password, $nameDB);
			$fileName = $_FILES['image']['name'];
			$fileSize = $_FILES['image']['size'];
			$fileType = $_FILES['image']['type'];
			$fileTmp = $_FILES['image']['tmp_name'];
			$extensions = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG']; //Добавляем в массив все расширения которые хотим загрузить
			$fileExt = array_pop(explode('.', $fileName));//создаем массив из имени загружаемого файла и выбираем последний элемент, то есть формат 
			$insertImg = "INSERT INTO pictures (name, size, path) VALUES ('$fileName', '$fileSize', 'img/small/$fileName')"; //Делаем запрос на добавление данных в базу
			if(!in_array($fileExt, $extensions)){//Проверяем, присутствует ли в нашем массиве необходимый формат, и если нет, то сразу выходим
				echo "Данный формат файла не поддерживается";
			}else{
				move_uploaded_file($fileTmp, "img/small/".$fileName);
				copy("img/small/".$fileName, "img/big/".$fileName);// если формат подходит то загружаем
				if(mysqli_query($link, $insertImg)){
					echo "Файл загружен";
					/*$pathUploadFile = "SELECT * FROM pictures";
					$var = mysqli_query($link, $pathUploadFile);
					while ($row=mysqli_fetch_array($var)) {
						
						$image_name=$row["imagename"];
						$image_path=$row["imagepath"];*/
						
						
					}

					mysqli_close($link);
				}else{
					echo "Упс, что-то пошло не так";
				}
					
			}
		}
	}

	include ("footer.php");
?>
       