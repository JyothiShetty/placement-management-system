<?php session_start(); ?>
<?php include "../db.php"; ?>




s<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Analysis</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
          <?php
		        $Welcome = "Welcome";
            echo "<h1>" . $Welcome."," . "<br>".$_SESSION['name']. "</h1>";
		        echo "<br>";
          ?>
        </header>
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
          </div>
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
        <nav class="templatemo-left-nav">
          <ul>
            <li><a href="hello.php"  ><i class="fa fa-fw"></i>Dashboard</a></li>
            <li><a href="app_students.php"><i class="fa  fa-fw"></i>Applied Students</a></li>
            <li><a href="analysis.php" class="active"><i class="fa  fa-fw"></i>analysis</a></li>
            <li><a href="logout.php"><i class="fa  fa-fw"></i>Sign Out</a></li>
          </ul>
        </nav>
      </div>
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
		  	    <a href="bgo.php" class="templatemo-blue-button">Bar Chart</a>
            <div class="panel panel-default table-responsive" id="chart">
              <?php
                $name=$_SESSION['name'];
                $id=$_SESSION['c_id'];
                $cr=0;
                $ir=0;
                $er=0;
                $mr=0;
                $cvr=0;
                $cquery="SELECT sapid FROM applied_comp WHERE c_id={$id}";
                $select_all_posts_query=mysqli_query($connection,$cquery);
                while($row=mysqli_fetch_assoc($select_all_posts_query)){
                $sapid=$row['sapid'];
                $comp="SELECT * FROM student WHERE sapid={$sapid} AND dept='ComputerScience'";
                $compp=mysqli_query($connection,$comp);
                $ele="SELECT * FROM student WHERE sapid={$sapid} AND dept='Electrical'";
                $elee=mysqli_query($connection,$ele);
                $is="SELECT * FROM student WHERE sapid={$sapid} AND dept='InformationScience'";
                $iss=mysqli_query($connection,$is);
                $mechanical="SELECT * FROM student WHERE sapid={$sapid} AND dept='Mechanical'";
                $mechanicall=mysqli_query($connection,$mechanical);
                $civil="SELECT * FROM student WHERE sapid={$sapid} AND dept='Civil'";
                $civill=mysqli_query($connection,$civil);
                $cr=mysqli_num_rows($compp) + $cr;
                $ir=mysqli_num_rows($iss) + $ir;
                $er=mysqli_num_rows($elee) + $er;
                $mr=mysqli_num_rows($mechanicall) + $mr;
                $cvr=mysqli_num_rows($civill) + $cvr;}
              ?>
              <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
              var data = google.visualization.arrayToDataTable([
              ["Department", "No. of Students", { role: "style" } ],
              ["ComputerScience", <?php echo $cr ?>, "#b87333"],
              ["InformationScience", <?php echo $ir ?>, "silver"],
              ["Electrical", <?php echo $er ?>, "gold"],
              ["Civil", <?php echo $cvr ?>, "color: #e5e4e2"],
              ["Mechanical",<?php echo $mr ?>, 'color: #76A7FA']]);
              var view = new google.visualization.DataView(data);
              view.setColumns([0, 1,
              { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },2]);
                var options = {
                title: "Department wise Analysis",
                width: 700,
                height: 500,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },};
                var chart = new google.visualization.BarChart(document.getElementById("chart"));
                chart.draw(view, options);}
              </script>
              <div id="barchart_values" style="width: 900px; height: 300px;"></div>
            </div>
			    </div>
			  </div>
      </div>
    </div> 
  </body>
</html>
