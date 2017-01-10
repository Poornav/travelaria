<!DOCTYPE html>

<head>
	<title>
		Traveleria
	</title>
	<link rel="stylesheet" href="Travel8.css">
	</head>
	<body id="styl">
		<p id="header">
		Traveleria
		</p>
		<div id="navigation">
			<form method="POST" action="./Customs.php">
				<ul style="font-weight:bold;">
					<li><a href="Travel8.php"><img src="./photos/Home.png" align="right" width="40px" height="40px"></img></a></li>
					<li><a href="Customs.php">Customs</a></li>
					<select id="custom" name="custom" class='custom-select'>
					<option>Country</option>
					<?php
$con=mysqli_connect("localhost","root","root","Travel");
if (mysqli_connect_errno())
 	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
$result = mysqli_query($con,"SELECT Country,id FROM Customs");
while($row = mysqli_fetch_array($result))
	{
		$tn=$row['id'];
		echo "<option value=\"$tn\">".$row['Country']."</option>";
	}
mysqli_close($con);
?>					</select><input type="submit" value="select"></form>
<form method="POST" action="./phpfiles/TryDesc.php">
					
					<div style="margin-right:0;float:right;">
						<select id="country" name="country" class='custom-select'></select>
						<select id="city" name="city" class='custom-select'></select><input type="submit" value="select">
					</div>
			<script>
			populateCountries("country","city");

function populateStates(countryElementId, stateElementId) {
	var s_a=new Array();
	s_a[0]="";
s_a[1]="Rangoon|Mandalay|Bagan";
s_a[2]="Phnom_Penh|Angkor_Wat";
s_a[3]="Beijing|Shanghai|Guangzhou|Xian|Shenzhen|Chengdu|Nanjing";
s_a[4]="Goa|Mumbai|Delhi|Jaipur|Hyderabad|Bangalore|Agra|Kolkata_Calcutta|Chennai_Madras|Pondicherry|Mysore|Kochi|Varanasi|Udaipur|Jaisalmer";
s_a[5]="Jakarta|Bali|Bandung|Ubud|Pulau_Batam|Pulau_Bintan|Lombok|Yogyakarta|Surabaya|Kuta";
s_a[6]="Tokyo|Kyoto|Osaka|Nagoya|Hiroshima";
s_a[7]="Vientiane";
s_a[8]="Kuala_Lumpur|Penang|Melaka|Johor_Bahru|Kota_Kinabalu|Kuching|Pulau_Langkawi|Pulau_Tioman|Genting|Cameron_Highlands|Port_Dickson|Miri|Ipoh|Taiping|Pulau_Pangkor";
s_a[9]="Kathmandu|Pokhara";
s_a[10]="Lahore|Karachi|Islamabad|Naran|Peshwar|Murree";
s_a[11]="Manila|Boracay_Island|Baguio|Cebu_City|Tagaytay|Bohol|Makati|Coron|Vigan|Davao|Subic|Puerto_Galera|Sagada|Pagudpud|El_Nido";
s_a[12]="Singapore";
s_a[13]="Seoul|Busan";
s_a[14]="Colombo";
s_a[15]="Taipei";
s_a[16]="Bangkok|Phuket|Chiang_Mai|Pattaya|Hat_Yai|Ko_Samui|Krabi|Hua_Hin|Ko_Phi_Phi_Don";
s_a[17]="Ho_Chi_Minh_City|Hanoi|Hoi_An|Nha_Trang";
	
    var selectedCountryIndex = document.getElementById(countryElementId).selectedIndex;
   

    var stateElement = document.getElementById(stateElementId);

    stateElement.length = 0; 
    stateElement.options[0] = new Option('City', '-1');
    stateElement.selectedIndex = 0;

    var state_arr=s_a[selectedCountryIndex].split("|");

    for (var i = 0; i < state_arr.length; i++) {
        stateElement.options[stateElement.length] = new Option(state_arr[i], state_arr[i]);
    }
}

function populateCountries(countryElementId, stateElementId) {
var country_arr=["Burma","Cambodia","China","India","Indonesia","Japan","Laos","Malasiya","Nepal","Pakistan","Philippines","Singapore","South_Korea","Sri_Lanka","Taiwan","Thailand","Vietnam"];
    var countryElement = document.getElementById(countryElementId);
    countryElement.length = 0;
    countryElement.options[0] = new Option('Country', '-1');
    countryElement.selectedIndex = 0;
    for (var i = 0; i < 17; i++) {
    		
        countryElement.options[i+1] = new Option(country_arr[i], country_arr[i]);
    	}

    if (stateElementId) {
        countryElement.onchange = function () {
            populateStates(countryElementId, stateElementId);
        };
    }
}

		</script>


				</ul>		
		</form>
		
		
		
		
		
		
		
		
		
		
		
		</div>
		<div id="content">
		
		<table>
  	<td id="cont">
  		<img src="./photos/pic.jpg" width="250" height="200" alt="">
  	</td>
  	<td>
  		
  		
  		Our aim is to help you find popular tourist attractions and places of interest throughout Asia including many castles, museums, art galleries, stately homes, royal palaces, zoos, gardens and theme parks.

We provide lots of useful information about the Asia's favourite tourist attractions including pictures and photos, admission times, opening dates, ticket prices, location maps and contact information, to help you find things to see and do on your visit.

We also have many guides for tourists visiting Asia's from abroad, packed with information and advice on accommodation, travel advice and other useful information.
  		
  		
  		
  		
  		
  		
  		
  		
  		
  		
  	</td>
  	</table>
		
		
		
		
		</div>
		<div id="bg-right">
		<?php
		function fun($str)
		{
		echo "!@#$%";
		$_POST['City']=$str;
		}
		echo "<h2 style='font-size:100%'> Top 10 places to visit</h2>";
		$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	
		$result = mysqli_query($con,"SELECT Data FROM Top10");
		if($row = mysqli_fetch_array($result))	{
	$info=$row['Data'];
	mysqli_close($con);
	$info=str_replace("\"","\\\"",$info);
	echo $info;
}
else {
		$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web21_top10asia');
		$output=shell_exec($command);
		$s=split('!@#[$][%]',$output);
		$p="";
		$count=count($s)-1;
		for($i=0;$i<$count;$i++)
		{
			$lo=explode(' ',$s[$i]);
			$po=$lo[0];
			$po=trim($po);
			$sql="SELECT country,city from Country where city like '$po%';";
			$result=mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result)) {
				$l=$row['country'];
				$c=$row['city'];
			}
			$p=$p."<a href='./phpfiles/TryDesc.php?".$l."/".$c."' style='color:black;text-decoration:none;'>".$c."</a><br>";
			
		}
		$p=str_replace("\"","\\\"",$p);
		
	$sql="INSERT INTO Top10(Data) VALUES(\"$p\")";
	$t=mysqli_query($con,$sql);
		echo $p;
}
	
		?>
		
			
		
		</div>
		<div id="bg-banner">
		<?php
	include("./carousel-slider.source.html");
	?>
	<script>
	document.getElementByID("img1").innerHTML='<img u=image src="./k.jpg"></img><div u="thumb">hahaha</div>';
	</script>
		
		</div>
		<div id="bg-bottom" ><a href="./phpfiles/about_us2.php" style="text-decoration:none;">About Us</div>
	</body>




<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
    })
</script>
<style type="text/css">
	.select-wrapper{
		float: left;
		display: inline-block;
		border: 1px solid #d8d8d8;            
		background: url("../images/dropdown.png") no-repeat right center;
		cursor: pointer;
	}
	.select-wrapper, .select-wrapper select{
		width: 200px;
		height: 26px;
		line-height: 26px;
	}
	.select-wrapper:hover{
		background: url("../images/dropdown-hover.png") no-repeat right center;
		border-color: #239fdb;
	}
	.select-wrapper .holder{
		display: block;
		margin: 0 35px 0 5px;
		white-space: nowrap;            
		overflow: hidden;
		cursor: pointer;
		position: relative;
		z-index: -1;
	}
	.select-wrapper select{
		margin: 0;
		position: absolute;
		z-index: 2;            
		cursor: pointer;
		outline: none;
		opacity: 0;
		/* CSS hacks for older browsers */
		_noFocusLine: expression(this.hideFocus=true); 
		-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
		filter: alpha(opacity=0);
		-khtml-opacity: 0;
		-moz-opacity: 0;
	}
    
    /* Let's Beautify Our Form */
	form{
        margin: 20px;
    }
    input[type="submit"]{
        float: left;
        background: #d8d8d8;
        border: 1px solid #c4c4c4;
        margin-left: 10px;
        padding: 4px 10px;
        cursor: pointer;
        outline: none;
    }
    input[type="submit"]:hover{
        color: #fff;
        border-color: #1b7aa9;
        background-color: #239fdb;
    }
</style>
</html>
