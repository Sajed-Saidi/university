<?php
require_once("../classes/Settings.class.php");

$Settings = new Settings();
$allSettings = $Settings->getAllSettings();
$allSettings = $allSettings[0];
// var_dump($allSettings);
// exit;

include("includes/header.php"); ?>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Settings</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="actions/settings/update_settings.php" id="updateForm">
                <div class="modal-body">
                    <input type="hidden" name="settings_id" value="<?php echo $allSettings['settings_id'] ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">University Name</span>
                        <input type="text" name="university_name" value="<?php echo $allSettings['university_name'] ?>" class="form-control" placeholder="Enter University Name" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Short Name</span>
                        <input type="text" name="short_name" value="<?php echo $allSettings['short_name'] ?>" class="form-control" placeholder="Enter Short Name" required aria-label="university" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Email</span>
                        <input type="text" name="email" value="<?php echo $allSettings['email'] ?>" class="form-control" placeholder="Enter Email" required aria-label="university" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Address</span>
                        <textarea name="address" rows="5"
                            cols="20"
                            class="form-control" placeholder="Enter Address" required aria-label="university" aria-describedby="basic-addon3"><?php echo $allSettings['address'] ?></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Phone</span>
                        <input type="text" name="phone" value="<?php echo $allSettings['phone'] ?>" class="form-control" placeholder="Enter Phone" required aria-label="university" aria-describedby="basic-addon3">
                    </div>
                    <!-- Image -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Image</span>
                        <input class="form-control" type="file" accept=".jpg, .jpeg, .png" class="form-control" id="update_settings_image" aria-label="settings" name="image" aria-describedby="basic-addon1">
                    </div>
                    <div class="bg-dark mb-3" style="width: fit-content">
                        <img class="old_image_holder img-fluid" id="old_image_holder" src="../assets/images/<?php echo $allSettings['image'] ?>" width="60" height="60" alt="">
                    </div>
                    <input class="form-control" type="hidden" name="old_image" class="old_image_input" value="<?php echo $allSettings['image'] ?>" id="old_image_input">
                    <!-- Social Media -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Instagram</span>
                        <input type="text" name="instagram" value="<?php echo $allSettings['instagram'] ?>" class="form-control" placeholder="Enter Instagram" required aria-label="university" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Facebook</span>
                        <input type="text" name="facebook" value="<?php echo $allSettings['facebook'] ?>" class="form-control" placeholder="Enter Facebook" required aria-label="university" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Twitter</span>
                        <input type="text" name="twitter" value="<?php echo $allSettings['twitter'] ?>" class="form-control" placeholder="Enter Twitter" required aria-label="university" aria-describedby="basic-addon3">
                    </div>
                    <!-- SEO Tags -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Meta Title</span>
                        <input type="text" name="meta_title" value="<?php echo $allSettings['meta_title'] ?>" class="form-control" placeholder="Enter Meta Title" required aria-label="university" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Meta Description</span>
                        <textarea name="meta_description" rows="5"
                            cols="20"
                            class="form-control" placeholder="Enter Meta Description" required aria-label="university" aria-describedby="basic-addon3"><?php echo $allSettings['meta_description'] ?></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Meta Keywords</span>
                        <textarea name="meta_keywords" rows="5"
                            cols="20"
                            class="form-control" placeholder="Enter Meta Keywords" required aria-label="university" aria-describedby="basic-addon3"><?php echo $allSettings['meta_keywords'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
                    <span class="actual-text">&nbsp;Settings&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Settings&nbsp;</span>
                </button>
            </p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       
                     
                        <div align="right">
                            <button  class="edit-button" type="button" data-bs-toggle="modal" 
                            data-bs-target="#updateModal" class="btn btn-primary close" 
                            id="editBtn" data-settings_id="<?php echo $allSettings['settings_id'] ?>" 
                            data-university_name="<?php echo  $allSettings['university_name'] ?>"
                             data-short_name="<?php echo  $allSettings['short_name'] ?>" 
                             data-email="<?php echo  $allSettings['email'] ?>"
                              data-address="<?php echo  $allSettings['address'] ?>"
                               data-phone="<?php echo  $allSettings['phone'] ?>"
                                data-image="<?php echo  $allSettings['image'] ?>"
                                 data-phone="<?php echo  $allSettings['phone'] ?>"
                                  data-instagram="<?php echo  $allSettings['instagram'] ?>" 
                                  data-facebook="<?php echo  $allSettings['facebook'] ?>" 
                                  data-twitter="<?php echo  $allSettings['twitter'] ?>" 
                                  data-meta_title="<?php echo  $allSettings['meta_title'] ?>" 
                                  data-meta_description="<?php echo  $allSettings['meta_description'] ?>"
                                   data-meta_keywords="<?php echo  $allSettings['meta_keywords'] ?>">
                                   <svg class="edit-svgIcon" viewBox="0 0 512 512">
                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                  </svg>
                                   </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Make the table responsive -->
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-striped table-bordered">
                                <thead>
                                    <th>ID</th>
                                    <th>University Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Social Media</th>
                                    <th>SEO Tags</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $allSettings['settings_id']; ?></td>
                                        <td><?php echo $allSettings['university_name'] . "(" .  $allSettings['short_name'] . ")"; ?></td>
                                        <td><?php echo $allSettings['email']; ?></td>
                                        <td><?php echo $allSettings['address']; ?></td>
                                        <td><?php echo $allSettings['phone']; ?></td>
                                        <td>
                                            <div class="bg-dark">
                                                <img src="../assets/images/<?php echo $allSettings['image'] ?>" alt="" width="60px">
                                            </div>
                                        </td>
                                        <td>
                                            <b class="text-success">Instagram:</b> <?php echo $allSettings['instagram']; ?><br>
                                            <b class="text-success"> Facebook:</b> <?php echo $allSettings['facebook']; ?><br>
                                            <b class="text-success"> Twitter:</b> <?php echo $allSettings['twitter']; ?>
                                        </td>
                                        <td>
                                            <b class="text-success">Meta Title:</b> <?php echo $allSettings['meta_title']; ?><br>
                                            <b class="text-success">Meta Description:</b> <?php echo $allSettings['meta_description']; ?> <br>
                                            <b class="text-success">Meta Keywords:</b> <?php echo $allSettings['meta_keywords']; ?>
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
