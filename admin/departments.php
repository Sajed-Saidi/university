<?php
require_once("../classes/Staff.class.php");
require_once("../classes/Departments.class.php");

$Staffs = new Staffs();
$allStaffs = $Staffs->getAllStaffs();

$Departments = new Departments();
$allDepartments = $Departments->getAllDepartments();

// var_dump($allStaffs);
// exit;

include("includes/header.php"); ?>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Departments</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/departments/add_departments.php" method="POST" id="addForm">
                <div class="modal-body">
                    <!-- Departments Name -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Departments Name</span>
                        <input type="text" name="departments_name" class="form-control" placeholder="Enter Departments Name" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Description -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Description</span>
                        <textarea name="description" rows="5" maxlength="255"
                            cols="20"
                            class="form-control" placeholder="Enter Description" required aria-label="university" aria-describedby="basic-addon3"></textarea>
                    </div>
                    <!-- Head ID -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="head_id">Head</label>
                        <select class="form-select" name="head_id" id="head_id">
                            <?php
                            foreach ($allStaffs as $head) {
                            ?>
                                <option value="<?php echo $head['staffs_id'] ?>">
                                    <?php echo $head['username'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Departments</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/departments/update_departments.php" method="POST" id="updateForm">
                <input type="hidden" name="departments_id" id="update_departments_id">
                <div class="modal-body">
                    <!-- Departments Name -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Departments Name</span>
                        <input type="text" name="departments_name" id="update_departments_name" class="form-control" placeholder="Enter Departments Name" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Description -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Description</span>
                        <textarea name="description" rows="5" maxlength="255"
                            cols="20"
                            class="form-control" placeholder="Enter Description" id="update_description" required aria-label="university" aria-describedby="basic-addon3"></textarea>
                    </div>
                    <!-- Head ID -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="update_head_id">Head</label>
                        <select class="form-select" name="head_id" id="update_head_id">
                            <?php
                            foreach ($allStaffs as $head) {
                            ?>
                                <option value="<?php echo $head['staffs_id'] ?>">
                                    <?php echo $head['username'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
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
                    <span class="actual-text">&nbsp;Departments&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Departments&nbsp;</span>
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Head name</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($allDepartments as $department) {
                                    ?>
                                        <tr>
                                            <td><?php echo $department['departments_id']; ?></td>
                                            <td><?php echo $department['departments_name']; ?></td>
                                            <td>
                                                <p class="text-ellipsis"><?php echo $department['description']; ?></p>
                                            </td>
                                            <td><?php echo $department['head_name']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="actions/departments/delete_departments.php" method="POST" class="deleteForm d-inline">
                                                        <input type="hidden" name="departments_id" value="<?php echo $department['departments_id'] ?>">
                                                        <button type="submit" class="delete" style="outline: none;border:none;background:none"><i class="fa-solid fa-trash text-danger"></i></button>
                                                    </form>
                                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="edit" data-id="<?php echo $department['departments_id'] ?>" data-departments_name="<?php echo $department['departments_name'] ?>" data-description="<?php echo $department['description'] ?>" data-head_id="<?php echo $department['head_id'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i></a>
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
            var departments_name = $(this).attr('data-departments_name');
            var description = $(this).attr('data-description');
            var head_id = $(this).attr('data-head_id');

            // console.log(id, departments_name, description, head_id, campuses_id);

            $('#update_departments_id').val(id);
            $('#update_departments_name').val(departments_name);
            $('#update_description').val(description);
            $('#update_head_id').val(head_id);
        });

        $(document).on('submit', '#updateForm', function(e) {
            sendFormAJAX(e);
        });

        $('#datatablesSimple').on('submit', '.deleteForm', function(e) {
            sendDeleteAJAX(e);
        });

    });
</script>