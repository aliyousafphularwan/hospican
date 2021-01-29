<?php 

    session_start();
    include "incs/dbc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Intrade International - <?php 
        if ($_GET["page"]) {
            echo $_GET['page'];
        }else{
            echo "Admin Panel";
        }
    ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php

       if (isset($_POST["logmit"])) {
           
            $username = $_POST["username"];
            $password = $_POST["password"];

            $select = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $sres = mysqli_query($conn, $select);
            if (mysqli_num_rows($sres) > 0) {
                while ($row = mysqli_fetch_assoc($sres)) {
                    $_SESSION["admin"] = $row["name"];
                }
            }
 
       }


        if (!isset($_SESSION["admin"])) {
            include "login.php";
        }else{
            include "dashboard.php";
        }

    ?>

  
        
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script type="js/main.js"></script>
    <script type="text/javascript">
        
        function getCategories(){

            $.ajax({
                url: "incs/getCategories.php",
                type: "POST",
                success: function(data){
                    $("#categoryData").html(data);
                }
            });

        }

        function getSubCategories(){

            $.ajax({
                url: "incs/getsubcats.php",
                type: "POST",
                success: function(data){
                    $("#subCategoryData").html(data);
                }
            });

        }

        function showProducts(){

            $.ajax({
                url: "incs/showProducts.php",
                type: "POST",
                success: function(data){
                    $("#showProducts").html(data);
                }
            });

        }

        function showBanner(){

            $.ajax({

                url: "incs/getslider.php",
                type: "POST",
                success: function(data){
                    $('.showbannerdata').html(data);
                }

            });

        }

        getCategories();
        getSubCategories()
        showProducts();
        showBanner();

    </script>

    <script src="js/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: "textarea#elm1",
        theme: "modern",
        
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "css/content.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons fullscreen | autosave ", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
     }); 
    </script>

    <script> 
        $('.tp').tooltip();
    </script>

</body>

</html>