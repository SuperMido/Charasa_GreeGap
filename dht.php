<?php
  class sensor{
    public $link='';
    function __construct($temperature, $humidity, $macAdd, $humS){

      $this->connect();
      $this->storeInDB($temperature, $humidity, $macAdd, $humS);
    }
  
    function connect(){
      $this->link = mysqli_connect('localhost','root','MYDO@321') or die('Cannot connect to the DB');
      mysqli_select_db($this->link,'charasa') or die('Cannot select the DB');
    }
  
    function storeInDB($temperature, $humidity, $macAdd, $humS){
	$query = "UPDATE sensorlogs SET sensorlogs.avg_tem = (avg_tem+'".$temperature."')/2, sensorlogs.avg_hum = (avg_hum+'".$humidity."')/2, sensorlogs.avg_humS = (avg_humS+'".$humS."')/2 WHERE sensorlogs.sensorid = (SELECT id FROM sensor WHERE sensor.mac = '".$macAdd."')";
	$result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
    	echo "Data has been saved!";
    }
  
  }
  if($_GET['temperature'] != '' and  $_GET['humidity'] != '' and $_GET['macAdd'] != '' and $_GET['humS'] != ''){
    $dht11=new sensor($_GET['temperature'],$_GET['humidity'], $_GET['macAdd'], $_GET['humS']);
  }
?>

