<?php 

   include ('../connection.php'); 
   include '../../includes/header.php';
   include '../../includes/scripts.php';

   // KUKUNIN LAHAT NG RECORD SA DATABASE LALAKI AT BABAE 
   $male = mysqli_query($con, "SELECT * FROM tblresident WHERE gender = 'MALE';");
   $female = mysqli_query($con, "SELECT * FROM tblresident WHERE gender = 'FEMALE';");
   
   ?>

<head>
   <meta charset="utf=8">
   <title>Home</title
   <link rel="icon" href="../../includes/assets/image/logo.png" type="image/icon type">
</head>
<!-- Dashboard details -->
<div class="container-fluid px-4">
<h1 class="my-2">San Agustin ACCESS (Automated Community and Citizen E-Records Service System)</h1>
<marquee>Note: Your session will expire after 15 minutes of inactivity.</marquee>
<hr>
<ol class="breadcrumb mb-3">
   <li class="breadcrumb-item active">Date: <span id="date"></span></li>
   <li class="breadcrumb-item active">Time: <span id="time"></span></li>
</ol>
<!-- <div class="row pb-5 g-2">
   <div class="col-md-12">
     <div class="card shadow-lg" style="border-radius: 20px; background-color: #f4f4f4;">
       <div class="card-body">
         <div class="d-flex align-items-center">
           <div class="flex-shrink-0">
             <?php 
      $query = mysqli_query($con, "SELECT image FROM dashboard");
      while($row = mysqli_fetch_array($query))
      echo'
      <img src="../settings/img/'.basename($row['image']).'" style="border-radius: 50%" alt="" class="w-auto" height="100">';
      ?>
           </div>
           <div class="flex-grow-1 ms-3 mt-3">
             <?php 
      $squery = mysqli_query($con, "SELECT * FROM dashboard");
      while($row = mysqli_fetch_array($squery))
      {
      echo '
        <p class=" text-dark">'.$row['about'].'</p>
        ';
      }
      ?>
           </div>
         </div>
       </div>
     </div>
   </div>
   </div> -->
<div class="row mt-5">

<!-- Display card with total residents -->
   <div class="col-xl-4 col-md-6">
      <div class="card text-white mb-4" style="border-radius: 12px; background-color: #4CAF50;">
         <div class="card-body" style=" padding:20px;">
            <div>
               <h6 style="color:#fff">Total residents </h6>
               <small style="color:rgb(255, 255, 255);">
               (As of <?php echo date('F Y'); ?>) 
               </small>
            </div>
            <b class="fs-3 text-center">
            <span class="fas fa-users" style="color:#fff"></span>
            <?php
               $q = mysqli_query($con,"SELECT * from tblresident");
               $num_rows = mysqli_num_rows($q);
               
               $percentage_change = null; 
               
               if ($percentage_change !== null) {
                   echo '<small style="color:#fff;">' . $num_rows . '</small><br>';
                   echo '<span class="fs-6" style="color:#fff;">+' . $percentage_change . '% from last month</span>';
               
               } else {
                 echo '<small style="color:#fff;">' . $num_rows . '</small><br>';
                 echo '<span class="fs-6" style="color:#fff;">+0% from last month</span>';
               
               }
               ?>
            </b>
         </div>
      </div>
   </div>

   <!-- Display card with total male residents -->
   <div class="col-xl-4 col-md-6">
      <div class="card text-white mb-4" style="background-color: #fff; border-radius: 12px;">
         <div class="card-body" style="padding:20px;">
            <div>
               <h6 style="color:#495057">Total Male Residents</h6>
               <small style="color: #6c757d;">
               (As of <?php echo date('F Y'); ?>) 
               </small>
            </div>
            <b class="mb-2 fs-3 text-center">
            <span class="fas fa-user" style="color:#4CAF50"></span>
            <?php
               $percentage_change = null; 
               
               if ($percentage_change !== null) {
                   echo '<small style="color:#4CAF50;">' . $male->num_rows . '</small><br>';
                   echo '<span class="fs-6" style="color:#28a745;">+' . $percentage_change . '% from last month</span>';
               
               } else {
                 echo '<small style="color:#4CAF50;">' . $male->num_rows . '</small><br>';
                 echo '<span class="fs-6" style="color:#28a745;">+0% from last month</span>';
               
               }
               
               ?>
            </b>
         </div>
      </div>
   </div>

   <!-- Display card with total female residents -->
   <div class="col-xl-4 col-md-6">
      <div class="card text-white mb-4" style="background-color: #fff;border-radius: 12px;">
         <div class="card-body" style=" padding:20px;">
            <div>
               <h6 style="color:#495057">Total Female Residents</h6>
               <small style="color: #6c757d;">
               (As of <?php echo date('F Y'); ?>)
               </small>
            </div>
            <b class="mb-2 fs-3 text-center">
               <span class="fas fa-female" style="color:#4CAF50"></span>
            <?php
               $percentage_change = null; 
               
               if ($percentage_change !== null) {
                   echo '<small style="color:#4CAF50;">' . $female->num_rows . '</small><br>';
                   echo '<span class="fs-6" style="color:#28a745;">+' . $percentage_change . '% from last month</span>';
               
               } else {
                 echo '<small style="color:#4CAF50;">' . $female->num_rows . '</small><br>';
                 echo '<span class="fs-6" style="color:#28a745;">+0% from last month</span>';
               
               }
               ?>
            </b>
         </div>
      </div>
   </div>
   
</div>


<!-- Card content -->
<!-- <div class="container mt-2">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
         <div class="card-header" style="background-color :#4CAF50;">
           <h4 class="text-white">Officials Details</h4>
         </div>
         <div class="card-body">
           <table class="table table-bordered table-hover table-striped" id="myTable">
             <thead>
               <tr class="col text-center">
                 <th class="col-2">Image</th>
                 <th class="col-2">Position</th>
                 <th class="col-2">Name</th>
                 <th class="col-1">Status</th>
                 <th class="col-2">Action</th>
               </tr>
             </thead>
             <tbody>
              /* <?php
      /* $squery = mysqli_query($con, "SELECT *, CONCAT(barangay,', ',City,', ',province) as address FROM tblofficials");
       while($row = mysqli_fetch_array($squery)) {
         echo '<tr>';
         echo '<td class="text-center" style="vertical-align: middle;">';
         $imagePath = htmlspecialchars($row['image']);
         if (file_exists($imagePath)) {
             echo '<img src="' . $imagePath . '" style="border-radius: 10px; width: 100px; height: 100px;" alt="Official Image" class="img-fluid mx-auto d-block">';
         } else {
             echo '<img src="../settings/img/default.png" style="border-radius: 10px; width: 100px; height: 100px;" alt="Default Image" class="img-fluid mx-auto d-block">';
         }
         echo '</td>';
         echo '<td>' . strtoupper($row['position']) . '</td>';
         echo '<td>' . strtoupper($row['lastname']) . ', ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']) . '.</td>';
         echo '<td>' . strtoupper($row['status']) . '</td>';
         echo '<td>
                 <form action="function.php" method="POST" class="d-inline">
                   <button type="button" class="button-color btn btn-sm" style="background-color: #4CAF50;" title="View" data-bs-toggle="modal" data-bs-target="#View_Official' . $row['id'] . '"><i class="fa-solid fa-eye"></i></button>
                 </form>
               </td>';
         echo '</tr>';
         include 'view-official.php';
       } */
      ?>*/
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
   </div> -->


<!-- Display Barangay Officials -->
<div class="container px-4 mt-4">
   <div class="row justify-content-center gy-4">
      <h1 class="my-4">Barangay Officials</h1>
      <?php
         $sql = "SELECT position, lastname, firstname, middlename, image FROM tblofficials";
         $result = $con->query($sql);
         
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 $name = htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['middlename']) . " " . htmlspecialchars($row['lastname']);
                 $position = htmlspecialchars($row['position']);
                 $image = htmlspecialchars($row['image']);
                 $imagePath = file_exists($image) ? $image : "../settings/img/default.png";
         
                 echo '
                 <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center mb-4">
                     <div class="card w-100 rounded"  overflow: hidden;">
                         
                         <div class="card-body text-center text-white">
                             <h5 class="card-title" style="color:#4CAF50; font-weight: bold;">' .$name. '</h5>
                             <span class="card-text text-muted" style="font-size:12px;color:#4CAF50;">' . $position . '</span>
                         </div>
                     </div>
                 </div>
                 ';
             }
         } else {
             echo "<p>No officials found.</p>";
         }
         
         $con->close();
         ?>
   </div>
</div> 



<!-- Pagination -->
<script>
   $(document).ready(function() {
     $('#myTable').DataTable({    
     });
   });
</script>

<?php 
   include 'pagination/pagination.php';
   include '../../includes/footer.php';
?>

<!-- This JavaScript code automatically logs out users after 15 minutes of inactivity. -->
<script>
   let inactivityTime = function () {
       let timeout_duration = 15 * 60 * 1000; 
   
       let logout = function () {
           window.location.href = '../../logout.php';
       };
   
       let resetTimer = function () {
           clearTimeout(window.idleTimer);
           window.idleTimer = setTimeout(logout, timeout_duration);
       };
   
       window.onload = resetTimer;
       document.onmousemove = resetTimer;
       document.onkeypress = resetTimer;
   };
   
   inactivityTime();
</script>


<!-- This code is used to display the current date and time on a webpage and update it every second. -->
<script>
   document.addEventListener('DOMContentLoaded', function() {
       setInterval(function() {
           const options = { year: 'numeric', month: 'long', day: 'numeric' };
           const currentDate = new Date().toLocaleDateString('en-US', options); 
           const currentTime = new Date().toLocaleTimeString();
   
           document.getElementById('date').innerText = currentDate;
           document.getElementById('time').innerText = currentTime;
       }, 1000);
   });
</script>