<?php
require_once("../classes/Applications.class.php");
$applications=new Applications();

$allApplications=$applications->getAllApplications_students();

// var_dump($allSettings);
// exit;

include("includes/header.php"); ?>
<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Application</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="actions/settings/update_settings.php" id="updateForm">
                <div class="modal-body">
                    <!-- Removed the application_id field -->
                    <input type="hidden" name="application_id" id="application_id">
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">First Name</span>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" required aria-label="first_name" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Last Name</span>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" required aria-label="last_name" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Phone</span>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone" required aria-label="phone" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4">Email</span>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required aria-label="email" aria-describedby="basic-addon4">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon5">Date of Birth</span>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Enter Date of Birth" required aria-label="date_of_birth" aria-describedby="basic-addon5">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon6">Gender</span>
                        <input type="text" name="gender" id="gender" class="form-control" placeholder="Enter Gender" required aria-label="gender" aria-describedby="basic-addon6">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon7">Address</span>
                        <textarea name="address" id="address" rows="3" class="form-control" placeholder="Enter Address" required aria-label="address" aria-describedby="basic-addon7"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon8">Education Level</span>
                        <input type="text" name="education_level" id="education_level" class="form-control" placeholder="Enter Education Level" required aria-label="education_level" aria-describedby="basic-addon8">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon9">Education Details</span>
                        <textarea name="education_details" id="education_details" rows="3" class="form-control" placeholder="Enter Education Details" required aria-label="education_details" aria-describedby="basic-addon9"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon10">Major</span>
                        <input type="text" name="majors_name" id="majors_name" class="form-control" placeholder="Enter Major" required aria-label="majors_name" aria-describedby="basic-addon10">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon11">Status</span>
                        <input type="text" name="status" id="status" class="form-control" placeholder="Enter Status" required aria-label="status" aria-describedby="basic-addon11">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Main Code Goes Here -->
<main class="content">
    <div class="container-fluid p-0">
        <div class="container-fluid px-4">
            <p class="mt-1" style="color:#729762;text-align:center;text-shadow:2px 2px 5px white;">
                <button data-text="Awesome" class="buttonpma">
                    <span class="actual-text">&nbsp;Students&nbsp;Applications&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Students&nbsp;Applications&nbsp;</span>
                </button>
            </p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       
                     
                        <div align="right">
                           
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Make the table responsive -->
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-striped table-bordered">
                                <thead>
                                    <th>Application ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Education level</th>
                                    <th>Education details</th>
                                    <th>Major</th>
                                    <th>Status</th>
                                    <th>Submission date</th>

                                   <th></th>
                                </thead>
                                <tbody>
                                    <?php foreach($allApplications as $allApplications){?>
                                    <tr>
                                        <td><?php echo $allApplications['applications_id'];?></td>
                                        <td><?php echo $allApplications['first_name'];?></td>
                                        <td><?php echo $allApplications['last_name'];?></td>
                                        <td><?php echo $allApplications['phone'];?></td>
                                        <td><?php echo $allApplications['email'];?></td>
                                        <td><?php echo $allApplications['date_of_birth'];?></td>
                                        <td><?php echo $allApplications['gender'];?></td>
                                        <td><?php echo $allApplications['address'];?></td>
                                        <td><?php echo $allApplications['education_level'];?></td>
                                        <td><?php echo $allApplications['education_details'];?></td>
                                        <td><?php echo $allApplications['majors_name'];?></td>
                                        <td><?php echo $allApplications['status'];?></td>
                                        <td><?php echo $allApplications['submission_date'];}?></td>

                                        <td>
                                            <div class="bg-dark">
                                                <img src="../assets/images/<?php echo $allSettings['image'] ?>" alt="" width="60px">
                                            </div>
                                        </td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function() {

        $(document).on('submit', '#updateForm', function(e) {
            sendFormAJAX(e);
        });
    });
</script>
