<?php 
if (isset($_POST["title"])&&isset($_POST["price"])&&isset($_POST["neg"])&&isset($_POST["dcurt"])&&isset($_POST["dlong"])
&&isset($_POST["end"])&&isset($_POST["num"])&&isset($_POST["cep"])&&isset($_POST["bairro"])&&isset($_POST["tipo"])
&&isset($_POST["taman"])&&isset($_GET["servID"])&&$_GET["servID"]==33)
{
	$title =$_POST["title"];
	$price =$_POST["price"];
	$neg   =$_POST["neg"];
	$dcurt= $_POST["dcurt"];	
	$dlong= $_POST["dlong"];
	$end= $_POST["end"];
	$num =$_POST["num"];
	$cep =$_POST["cep"];
	$bairro =$_POST["bairro"];
	$tipo =$_POST["tipo"];
	$taman =$_POST["taman"];
	$pics;

	$local= $end.", ".$num.", ".$bairro.", ".$cep;

	$servername = "localhost";
    $username = "u120627928_ncari";
    $pass = "24842288";
    $dbname ="u120627928_ncarj";
    $connect = new mysqli($servername,$username,$pass,$dbname);
    mysqli_set_charset($connect,"utf8") or die(mysqli_error($connect));
    $sql2 = "SELECT MAX( id ) as 'max' FROM  `imoveis`WHERE 1";
    $result = mysqli_query($connect, $sql2) or die(mysqli_error($conn));
    $myID;
    if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$myID= $row["max"];
		}
	}
	$myID= intval($myID);
	$myID++;
	if (!file_exists("userimages/".$myID)) {
    mkdir("userimages/".$myID, 0775, true);
	}
   	for($i =0; $i < 12; $i++){
		  if (isset($_FILES["pic".$i]["name"])&& $_FILES["pic".$i]["name"]!="")
				{
					$filetmp =$_FILES["pic".$i]["tmp_name"];
					$filename = $_FILES["pic".$i]["name"];
					$destination = "userimages/".$myID."/".$filename;					
					
					if (move_uploaded_file($filetmp, $destination))
					{						
					}
					else {
						echo "<script>alert('Erro ao enviar fotos')</script>";
						die(mysql_error($connect));
					}
					if ($pics!=""){
						$pics = $pics."º".$destination;
					}
					else $pics = $destination;
			}
			
			}
	
			

	$sql = "INSERT INTO `u120627928_ncarj`.`imoveis` ( `titulo`, `preço`, `negocio`, `dpeq`, `dcomp`, `localiza`, `tipo`, `taman`, `imgs`) VALUES ('$title', '$price', '$neg', '$dcurt', '$dlong', '$local', '$tipo', '$taman', '$pics');";
	mysqli_query($connect, $sql) or die(mysqli_error($conn));
	echo "Sucesso";
	echo "<script>alert('Registrado com Sucesso') </script>";
	echo "<script>window.location = 'admin.html' </script>";
	



	

	//echo $pics;
	

}
else echo "erro";



 

?>