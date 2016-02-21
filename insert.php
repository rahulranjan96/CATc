<?php
$connect = mysqli_connect('localhost','root','','annotated_words');
if($connect->connect_errno)                    //Checks database connection
	echo "Connection error";
	if(isset($_POST['submit']))             //mysqli_result Object ( [current_field] => 0 [field_count] => 2 [lengths] => [num_rows] => 0 [type] => 0 ) okChecks if the form is submitted
{

	if(!empty($_POST['Text']))
	{
		$flag = 0;
			$number = 1;
		$word = $_POST['Text'];
		if(!empty($_POST['labelnew']))
			$type = $_POST['labelnew'];
		 
			if(isset($_POST['labels'])&&!empty($_POST['labels']))
				$type = $_POST['labels'];
			 
				if(isset($_POST['labels']) && !empty($_POST['labelnew']) &&!empty($_POST['labels'])&& isset($_POST['labelnew']))
				{
					echo "Select a single input type.";
					$flag =1 ;
				}
				if(!isset($_POST['labels']) && empty($_POST['labelnew']))
				{
					echo "Select a category";
					$flag =1 ;
				}
	if($flag ==0){
		$query3 = "SELECT word,frequency FROM word_list WHERE word = '".$word."' AND type = '".$type."'"; 
		$result = $connect->query($query3);
			if($result->num_rows!= 0)
		{
			 
			$row = $result->fetch_assoc();                  //Converts the result to an associative array
			echo "Successfully Annotated";
			$frequency = $row['frequency'];
			$frequency += 1;
			$update = $connect->query("UPDATE word_list SET frequency = '$frequency' WHERE word = '".$word."' AND type ='".$type."'");//Updates the count by 1
		
			}
		
				else{
			
			$query = "INSERT INTO word_list (word,type,frequency) VALUES ('$word' , '$type' ,'$number' )";//If word donot exists creates a new row for the word
			if(!$query)
				echo "Connection ERROR";
			if($connect->query($query)){
echo "Successfully Annotated";
			}
		
	}
		
		
	}
	}
}
 

 
?>