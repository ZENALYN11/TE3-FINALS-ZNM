<?php
    include '../../includes/header.php';
    include '../../includes/scripts.php';

    // Get resident_id from POST or other means (ensure the POST request has resident_id)
    if (isset($_POST['resident_id'])) {
        $resident_id = $_POST['resident_id'];
    }
 
?>

<div class="container my-4 d-flex justify-content-center">
    <div class="row w-100">
        <div class="col-md-8 mx-auto">
            <!-- Square-like styled container -->
            <div class="p-4 border rounded shadow-sm" style="background-color: #f8f9fa;">
                <h3 class="mb-4 text-center">Generate Business Permit</h3>
              
                <!-- Form for generating business permit -->
                <form method="POST" action="function.php" id="businessPermitForm">
               <input type="hidden" name="resident_id" value="
							<?php echo $resident_id; ?>">
               <div id="businessPermitFields">
                  <!-- Business Amount -->
                  <div class="row mb-3 align-items-center">
                     <div class="col-4 text-end">
                        <label for="businessAmount" class="form-label">Business Amount <span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the business permit amount">
                              <i class="fas fa-info-circle text-primary"></i>
                           </span>
                        </label>
                     </div>
                     <div class="col-8">
                        <input type="number" class="form-control w-100" id="businessAmount" name="business_amount" placeholder="Presyo ex: (300.00)" required>
                     </div>
                  </div>
                  <!-- Business Type -->
                  <div class="row mb-3 align-items-center">
                     <div class="col-4 text-end">
                        <label for="businessType" class="form-label">Business Type <span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the type of business">
                              <i class="fas fa-info-circle text-primary"></i>
                           </span>
                        </label>
                     </div>
                     <div class="col-8">
                        <input type="text" class="form-control w-100" id="businessType" name="business_type" placeholder="Uri ng negosyo o aktibidad" required>
                     </div>
                  </div>
                  <!-- Business Name -->
                  <div class="row mb-3 align-items-center">
                     <div class="col-4 text-end">
                        <label for="businessName" class="form-label">Business Name <span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the business name">
                              <i class="fas fa-info-circle text-primary"></i>
                           </span>
                        </label>
                     </div>
                     <div class="col-8">
                        <input type="text" class="form-control w-100" id="businessName" name="business_name" placeholder="Pangalan ng negosyo o aktibidad" required>
                     </div>
                  </div>
                  <!-- Business Location -->
                  <div class="row mb-3 align-items-center">
                     <div class="col-4 text-end">
                        <label for="businessLocation" class="form-label">Business Location <span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the business location">
                              <i class="fas fa-info-circle text-primary"></i>
                           </span>
                        </label>
                     </div>
                     <div class="col-8">
                        <input type="text" class="form-control w-100" id="businessLocation" name="business_location" placeholder="Saan itatayo o gagawin" required>
                     </div>
                  </div>
                  <div class="row mb-3 align-items-center">
                     <div class="col-4 text-end">
                        <label for="officialReceipt" class="form-label">Official Receipt<span data-bs-toggle="tooltip" data-bs-placement="top" title="Enter the Official Receipt">
                              <i class="fas fa-info-circle text-primary"></i>
                           </span>
                        </label>
                     </div>
                     <div class="col-8">
                        <input type="number" class="form-control w-100" id="officialReceipt" name="Official_Receipt" placeholder="Opisyal na resibo  " required>
                     </div>
                  </div>
               </div>
               <!-- Submit Button -->
               <div class="d-flex justify-content-end mt-4">
                  <button type="submit" class="btn btn-primary" name="submit_business">Generate</button>
               </div>
            </form>
            </div>
        </div>
    </div>
</div>

<?php
    include 'pagination/pagination.php';
    include '../../includes/footer.php';
?>