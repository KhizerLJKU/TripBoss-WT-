<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Package</title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fonts -->
    <link rel = "stylesheet" href = "font/fonts.css">
    <!-- normalize css -->
    <link rel = "stylesheet" href = "css/normalize.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/utility.css">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/responsive.css">
</head>
<body>

	<?php
		include 'includes/nav.php';
	?>

	 <header class = "flex header-sm">
            <div class = "container">
                <div class = "header-title">
                    <h1>Add new Package</h1>
                </div>
            </div>
        </header>
        <!-- header -->

        <!-- contact section -->
        <section id = "contact" class = "py-4">
            <div class = "container">
               
                <div class = "contact-row">
                    <div class = "contact-left">
                        <form method="POST" action="" enctype="multipart/form-data" class = "contact-form">
                            
                            <input type = "text" class = "form-control" name="title" placeholder="Package Title">
                            
                            <input type = "number" class = "form-control" name="price" placeholder="Package price">
                            
                            <input type = "date" class = "form-control" name="date" placeholder="Package Date">
                            
                            <textarea rows = "4" class = "form-control" name="description" placeholder="Package description" style = "resize: none;"></textarea>
                            
                            <input type = "file" class = "form-control" name="images" placeholder="Destination Image">
                            
                            <input type = "submit" class = "btn" name="submit" value = "Add Package">
                        </form>
                    </div>
                    <div class = "contact-right my-2">
                        <div class = "contact-item">
                            <span class = "contact-icon flex">
                                <i class = "fa fa-phone-alt"></i>
                            </span>
                            <div>
                                <span>Phone</span>
                                <p class = "text">+01-584-886-009</p>
                            </div>
                        </div>
                        <div class = "contact-item">
                            <span class = "contact-icon flex">
                                <i class = "fa fa-map-marked-alt"></i>
                            </span>
                            <div>
                                <span>Address</span>
                                <p class = "text">102 East 22nd Street, NY</p>
                            </div>
                        </div>
                        <div class = "contact-item">
                            <span class = "contact-icon flex">
                                <i class = "fa fa-envelope"></i>
                            </span>
                            <div>
                                <span>Message</span>
                                <p class = "text">info@tripboss.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of contact section -->
    <?php
		include 'includes/footer.php';
	?>
</body>
</html>


<?php
include 'php/config.php';

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$price = $_POST['price'];
	$date = $_POST['date'];
	$description = $_POST['description'];

	$images = $_FILES["images"]["name"];
	$tempanem = $_FILES["images"]["tmp_name"];

	$folder = "Package_images/".$images;
	move_uploaded_file($tempanem, $folder);

	if ($title!="" && $price!="" && $date!="" && $description!="" && $images!="" ) {
		
        $insertquery = "insert into packages(title,price,date,description,images) values('$title','$price','$date','$description','$images')";

        echo $title."<br/>".$price."<br/>".$date."<br/>".$description."<br/>".$images;

        

		$res = mysqli_query($conn,$insertquery);
		if ($res) {
			echo "<script>alert('Data insertet')</script>";
		}
		else{
			echo "<script>alert('Failed')</script>";
		}

	}

}

?>