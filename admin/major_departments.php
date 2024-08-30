<?php
require("../classes/Campuses.class.php");

$Campuses = new Campuses();
$allCampuses = $Campuses->getAllCampuses();
// var_dump($allCampuses);
// exit;

include("includes/header.php"); ?>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Campuses</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/campuses/add_campuses.php" method="POST" id="addForm">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Campus Name</span>
                        <input type="text" name="name" class="form-control" placeholder="Enter Campus Name" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Location</span>
                        <textarea
                            name="location"
                            rows="5"
                            cols="20"
                            class="form-control" placeholder="Enter Location" required aria-label="university" aria-describedby="basic-addon3"></textarea>
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

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Campuses</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/campuses/update_campuses.php" method="POST" id="updateForm">
                <div class="modal-body">
                    <input type="hidden" name="campuses_id" id="update_campuses_id">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Campus Name</span>
                        <input type="text" id="update_name" name="name" class="form-control" placeholder="Enter Campus Name" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Location</span>
                        <input type="text" id="update_location" name="location" class="form-control" placeholder="Enter Location" required aria-label="university" aria-describedby="basic-addon2">
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
                    <span class="actual-text">&nbsp;Campuses&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Campuses&nbsp;</span>
                </button>
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div align="right">


                            <button type="button" class="add-btn" type="button" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                <span class="add-btn__text">Add</span>
                                <span class="add-btn__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                                        <line y2="19" y1="5" x2="12" x1="12"></line>
                                        <line y2="12" y1="12" x2="19" x1="5"></line>
                                    </svg></span>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Make the table responsive -->
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-striped table-bordered">
                                <thead>
                                    <th>Campuses ID</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($allCampuses as $campus) {
                                    ?>
                                        <tr>
                                            <td><?php echo $campus['campuses_id']; ?></td>
                                            <td><?php echo $campus['name']; ?></td>
                                            <td><?php echo $campus['location']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="actions/campuses/delete_campuses.php" method="POST" class="deleteForm d-inline">
                                                        <input type="hidden" name="campuses_id" value="<?php echo $campus['campuses_id'] ?>">
                                                        <button type="submit" class="delete" style="outline: none;border:none;background:none"><i class="fa-solid fa-trash text-danger"></i></button>
                                                    </form>
                                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="edit" data-id="<?php echo $campus['campuses_id'] ?>" data-name="<?php echo $campus['name'] ?>" data-location="<?php echo $campus['location'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
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
        $(document).on('submit', '#addForm', function(e) {
            sendFormAJAX(e);
        });

        $('#datatablesSimple').on('click', '.edit', function() {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var location = $(this).attr('data-location');
            $('#update_campuses_id').val(id);
            $('#update_name').val(name);
            $('#update_location').val(location);
        });

        $(document).on('submit', '#updateForm', function(e) {
            sendFormAJAX(e);
        });

        $('#datatablesSimple').on('submit', '.deleteForm', function(e) {
            sendDeleteAJAX(e);
        });

    });
</script>