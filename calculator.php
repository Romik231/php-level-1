<?php
		$firstnum = $_POST['firstnum'];
		$secondnum = $_POST['secondnum'];
		$operation = $_POST['operation'];
						
		if($operation){
			if($operation == "+"){
				$equal = $firstnum + $secondnum;
			}if($operation == "-"){
				$equal = $firstnum - $secondnum;
			}if($operation == "*"){
				$equal = $firstnum * $secondnum;
			}if($operation == "/"){
				if($secondnum == 0){
					echo "Делить на ноль нельзя";
				}else{
					$equal = $firstnum / $secondnum;
				}
			}
		}

	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>calculator</title>
	<style>
		input{ 
			width: 50px;
			text-align: center;
		}
		
	</style>
</head>
<body>
	<h3>Калькулятор</h3>
	<form action="" method="POST" >
		<input type="text" name="firstnum" value="<?= $firstnum?>">
		<select name="operation">
			<option value="">Выберите оператора</option>
			<option value="+">+</option>
			<option value="-">-</option>
			<option value="*">*</option>
			<option value="/">/</option>
		</select>
		<input type="text" name="secondnum" value="<?= $secondnum?>">
		<input type="submit" value="=">
		<input name="equal" type="text" value="<?= $equal ?>" disabled>
			<br><br>	
		<input name="operation" value="+" type="submit"/>
	    <input name="operation" value="-" type="submit"/>
	    <input name="operation" value="*" type="submit"/>
	    <input name="operation" value="/" type="submit"/>
	</form>
	
</body>
</html>