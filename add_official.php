<style media="screen">.upload{width:140px;position:relative;margin:auto;text-align:center;}.upload img{border:8px solid #DCDCDC;width:191px;height:80px;}.upload .rightRound{position:absolute;bottom:0;left:161px;background:#00B4FF;width:32px;height:32px;line-height:33px;text-align:center;border-radius:50%;overflow:hidden;cursor:pointer;}.upload .leftRound{position:absolute;bottom:0;left:0;background:red;width:32px;height:32px;line-height:33px;text-align:center;border-radius:50%;overflow:hidden;cursor:pointer;}.upload .fa{color:white;}.upload input{position:absolute;transform:scale(2);opacity:0;}.upload input::-webkit-file-upload-button,.upload input[type=submit]{cursor:pointer;}</style>

<!-- Add Official Modal -->
<!-- 1st select Photo -->
<!-- Form -->
<form action="function.php" method="POST" enctype="multipart/form-data">
   <div class="modal fade" id="Add_Official" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Choose Photo</h5>
               <button type="button" class="btn-close" id="closeCam" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center text-center">
               <br>
               <!-- Image preview in the first modal -->
               <div id="imagePreviewInFirstModal" class="mb-3" style="display: none;">
                  <img id="previewInFirstModal" src="" alt="Uploaded Image" class="img-fluid mb-2" style="border: 1px solid #ccc; max-height: 200px; max-width: 100%;">
               </div>
               <div class="mb-3">
                  <label for="image" class="form-label">Choose Image</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)" required>
                  <input type="hidden" id="hiddenImageData" name="hiddenImageData">
               </div>
               <button type="button" class="btn btn-danger me-2" id="removeImageBtn" style="display: none;" onclick="resetImage()">Remove Image</button>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-primary" data-bs-target="#Add_Official1" data-bs-toggle="modal">Next</button>
            </div>
         </div>
      </div>
   </div>

   <!--3rd modal-->
   <div class="modal fade" id="Add_Official1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Add Official</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="container">
                  <div class="row g-2 mb-2">
                     <div class="text-center d.flex pb-3">
                        <?php 
                           $query = mysqli_query($con, "SELECT image FROM dashboard");
                           {
                           while($row = mysqli_fetch_array($query))
                           echo'
                           <image src="../settings/img/'.basename($row['image']).'" style="border-radius: 50%" alt="" class="w-auto" height="150">';
                           
                           }
                           
                           ?>
                     </div>
                     <div class="col">
                        <label >Last Name</label>
                        <input type="text" class="form-control" name="lastname" autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                     </div>
                     <div class="col">
                        <label >First Name</label>
                        <input type="text" class="form-control" name="firstname"  autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                     </div>
                     <div class="col">
                        <label >Middle Name</label>
                        <input type="text" class="form-control" name="middlename"  autocomplete="off" oninput="this.value = this.value.toUpperCase()" onkeyup="lettersOnly(this)" required>
                     </div>
                  </div>
                  <!-- Address -->
                  <div class="row g-2 mb-2">
                     <div class="col-md-12">
                        <label>Address</label>
                     </div>
                     <div class="col-md-6">
                        <select class="form-select" name="province" id="Province">
                           <option value="" selected disabled>Select Province</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Province</small>
                     </div>
                     <div class="col-md-6">
                        <select class="form-select" name="City" id="CityTown">
                           <option value="" selected disabled>Select City/Town</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted">City/Town</small>
                     </div>
                     <div class="col-md-6 mb-3">
                        <select class="form-select" name="barangay" id="Barangay">
                           <option value="" selected disabled>Select Barangay</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Barangay</small>
                     </div>
                  </div>
                  <!-- Contact and Email -->
                  <div class="row g-2 mb-2">
                     <div class="col">
                        <label>Contact No.</label>
                        <input type="text" class="form-control" name="contactNo" maxlength="11" placeholder="" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required pattern="\d{11}">
                     </div>
                     <div class="col">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="(Optional)" autocomplete="off">
                     </div>
                  </div>
                  <!-- Positions and Gender -->
                  <div class="row g-2 mb-2">
                     <div class="col-md-6">
                        <label >Position</label>
                        <select class="form-select" name="position" autocomplete="off" required>
                           <option selected disabled value="">Choose an option</option>
                           <option value="Barangay Captain">Barangay Captain</option>
                           <option value="Kagawad(Ordinance)">Kagawad(Ordinance)</option>
                           <option value="Kagawad(Public Safety)">Kagawad(Public Safety)</option>
                           <option value="Kagawad(Tourism)">Kagawad(Tourism)</option>
                           <option value="Kagawad(Budget & Finance)">Kagawad(Budget & Finance)</option>
                           <option value="Kagawad(Agriculture)">Kagawad(Agriculture)</option>
                           <option value="Kagawad(Education)">Kagawad(Education)</option>
                           <option value="Kagawad(Infrastracture)">Kagawad(Infrastracture)</option>
                           <option value="SK Chairman">SK Chairman</option>
                           <option value="Secretary">Secretary</option>
                           <option value="Treasurer">Treasurer</option>
                        </select>
                     </div>
                     <div class="col">
                        <label >Gender</label>
                        <select class="form-select" name="gender" autocomplete="off" required>
                           <option selected disabled value="">Choose an option</option>
                           <option value="MALE">MALE</option>
                           <option value="FEMALE">FEMALE</option>
                        </select>
                     </div>
                  </div>
                  <!-- Start/End Date -->
                  <div class="row g-2 mb-2">
                     <div class="col-md-6">
                        <label >Start Date</label>
                        <input class="form-control" type="date" name="start_date" id="" required>
                     </div>
                     <div class="col">
                        <label >End Date</label>
                        <input class="form-control" type="date" name="end_date" id="" required>
                     </div>
                  </div>
                  <!-- Signature -->
                  <input type="hidden" name="signature" value="">
                  <!-- <div class="col mb-3">
                     <label>Signature</label>
                     <input class="form-control" type="file" name="image[]" />
                     </div> -->
                  <!-- Status -->
                  <input type="hidden" name="status" value="Active">
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" name="add_official" class="btn btn-primary" >Submit</button>
                  </div>
</form>
</div>
</div>
</div>
</div>
</div>

<script>
      function previewImage(event) {
          const fileInput = event.target;
          const preview = document.getElementById('previewInFirstModal');
          const imagePreview = document.getElementById('imagePreviewInFirstModal');
          const removeImageBtn = document.getElementById('removeImageBtn');
          
          const file = fileInput.files[0];
          if (file) {
              const reader = new FileReader();
              
              reader.onload = function(e) {
                  preview.src = e.target.result;
                  imagePreview.style.display = 'block';
                  removeImageBtn.style.display = 'block';
                  
                  // Set hidden input with base64 data
                  document.getElementById('hiddenImageData').value = e.target.result;
              };
              
              reader.readAsDataURL(file);
          } else {
              imagePreview.style.display = 'none';
              removeImageBtn.style.display = 'none';
              document.getElementById('hiddenImageData').value = '';
          }
      }
      
      function resetImage() {
          document.getElementById('image').value = '';
          document.getElementById('previewInFirstModal').src = '';
          document.getElementById('imagePreviewInFirstModal').style.display = 'none';
          document.getElementById('removeImageBtn').style.display = 'none';
          document.getElementById('hiddenImageData').value = '';
      }
      
   </script>
<script type="text/javascript">
   document.getElementById("E_Signature").onchange = function(){
     document.getElementById("signature").src = URL.createObjectURL(E_Signature.files[0]); // Preview new image
   
     document.getElementById("cancelL").style.display = "block";
     document.getElementById("confirmL").style.display = "block";
   
     document.getElementById("uploadL").style.display = "none";
   }
   
   var userImage = document.getElementById('signature').src;
   document.getElementById("cancelL").onclick = function(){
     document.getElementById("signature").src = userImage; // Back to previous image
   
     document.getElementById("cancelL").style.display = "none";
     document.getElementById("confirmL").style.display = "none";
   
     document.getElementById("uploadL").style.display = "block";
   }
</script>
<!-- RegEx -->
<script>
   function lettersOnly (input) {
     var regex = /[^a-z ]/gi;
     input.value = input.value.replace (regex, "");
   }
</script>
<!-- Address dropdown -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
   	function loadData(type, category_id){
   		$.ajax({
   			url : "function.php",
   			type : "POST",
   			data: {type : "province"},
   			success : function(data){
           $("#Province").append(data);
   				// if(type == "stateData"){
   				// 	$("#CityTown").html(data);
   				// }else {
   				// 	$("#Province").append(data);
   				// }
   				
   			}
   		});
   	}
   
     function loadCity(province){
   		$.ajax({
   			url : "function.php",
   			type : "POST",
   			data: {type : "City", province : province},
   			success : function(data){
           $("#CityTown").html("");
           $("#CityTown").append(data);
   				// if(type == "stateData"){
   				// 	$("#CityTown").html(data);
   				// }else {
   				// 	$("#Province").append(data);
   				// }
   				
   			}
   		});
   	}
   
     function loadBarangay(CityTown){
   		$.ajax({
   			url : "function.php",
   			type : "POST",
   			data: {type : "Barangay", CityTown : CityTown},
   			success : function(data){
           $("#Barangay").html("");
           $("#Barangay").append(data);
   				// if(type == "stateData"){
   				// 	$("#CityTown").html(data);
   				// }else {
   				// 	$("#Province").append(data);
   				// }
   				
   			}
   		});
   	}
   
   	loadData();
   
   	$("#Province").on("change",function(){
   		var Province = $("#Province").val();
   
   		if(Province != ""){
   			loadCity(Province);
   		}else{
   			$("#City").html("");
   		}
   	})
   
     $("#CityTown").on("change",function(){
   		var City = $("#CityTown").val();
   
   		if(City != ""){
   			loadBarangay(City);
   		}else{
   			$("#CityTown").html("");
   		}
   	})
   
   });
</script>