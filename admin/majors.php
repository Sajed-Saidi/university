<?php
require_once("../classes/Departments.class.php");
require_once("../classes/Majors.class.php");

$Majors = new Majors();
$allMajors = $Majors->getAllMajors();

$Departments = new Departments();
$allDepartments = $Departments->getAllDepartments();
// var_dump($allDepartments);
// exit;

include("includes/header.php"); ?>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Major</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/majors/add_majors.php" method="POST" id="addForm">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Majors Name</span>
                        <input type="text" name="majors_name" class="form-control" placeholder="Enter Majors Name" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Code</span>
                        <input type="text" name="code" class="form-control" placeholder="Enter Code" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Description</span>
                        <textarea
                            name="description"
                            rows="5"
                            cols="20"
                            class="form-control" placeholder="Enter Description" required aria-label="university" aria-describedby="basic-addon3"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Credit Price</span>
                        <input type="number" min=0 max=1000 name="credit_price" class="form-control" placeholder="Enter Credit Price" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Total Credits</span>
                        <input type="number" min=0 max="500" name="total_credits" class="form-control" placeholder="Enter Total Credits" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Duration in Years</span>
                        <input type="number" min=0 max=15 name="duration_in_years" class="form-control" placeholder="Enter Duration in Years" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Department ID -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="departments_id">Department</label>
                        <select class="form-select" name="departments_id" id="departments_id">
                            <?php
                            foreach ($allDepartments as $department) {
                            ?>
                                <option value="<?php echo $department['departments_id'] ?>">
                                    <?php echo $department['departments_name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Type -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="type">Type</label>
                        <select class="form-select" name="type" id="type">
                            <option value="bachelor">Bachelor</option>
                            <option value="master">Master</option>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Majors</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/majors/update_majors.php" method="POST" id="updateForm">
                <input type="hidden" name="majors_id" id="update_majors_id">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Majors Name</span>
                        <input type="text" name="majors_name" id="update_majors_name" class="form-control" placeholder="Enter Majors Name" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Code</span>
                        <input type="text" name="code" id="update_code" class="form-control" placeholder="Enter Code" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Description</span>
                        <textarea
                            id="update_description"
                            name="description"
                            rows="5"
                            cols="20"
                            class="form-control" placeholder="Enter Description" required aria-label="university" aria-describedby="basic-addon3"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Credit Price</span>
                        <input type="number" min=0 id="update_credit_price" max=1000 name="credit_price" class="form-control" placeholder="Enter Credit Price" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Total Credits</span>
                        <input type="number" min=0 id="update_total_credits" max="500" name="total_credits" class="form-control" placeholder="Enter Total Credits" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Duration in Years</span>
                        <input type="number" min=0 id="update_duration" max=15 name="duration_in_years" class="form-control" placeholder="Enter Duration in Years" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Department ID -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="update_departments_id">Department</label>
                        <select class="form-select" name="departments_id" id="update_departments_id">
                            <?php
                            foreach ($allDepartments as $department) {
                            ?>
                                <option value="<?php echo $department['departments_id'] ?>">
                                    <?php echo $department['departments_name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Type -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="update_type">Type</label>
                        <select class="form-select" name="type" id="update_type">
                            <option value="bachelor">Bachelor</option>
                            <option value="master">Master</option>
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
                    <span class="actual-text">&nbsp;Majors&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Majors&nbsp;</span>
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
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Credit Price</th>
                                    <th>Total Credit</th>
                                    <th>Duration in Years</th>
                                    <th>Type</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($allMajors as $major) {
                                    ?>
                                        <tr>
                                            <td><?php echo $major['majors_id']; ?></td>
                                            <td><?php echo $major['majors_name']; ?></td>
                                            <td><?php echo $major['code']; ?></td>
                                            <td><?php echo $major['description']; ?></td>
                                            <td><?php echo $major['credit_price']; ?></td>
                                            <td><?php echo $major['total_credits']; ?></td>
                                            <td><?php echo $major['duration_in_years']; ?></td>
                                            <td><?php echo $major['type']; ?></td>
                                            <td><?php echo $major['departments_name']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="actions/majors/delete_majors.php" method="POST" class="deleteForm d-inline">
                                                        <input type="hidden" name="majors_id" value="<?php echo $major['majors_id'] ?>">
                                                        <button type="submit" class="delete" style="outline: none;border:none;background:none"><i class="fa-solid fa-trash text-danger"></i></button>
                                                    </form>
                                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="edit" data-id="<?php echo $major['majors_id'] ?>" data-majors_name="<?php echo $major['majors_name'] ?>" data-code="<?php echo $major['code'] ?>" data-description="<?php echo $major['description'] ?>" data-credit_price="<?php echo $major['credit_price'] ?>" data-total_credits="<?php echo $major['total_credits'] ?>" data-duration_in_years="<?php echo $major['duration_in_years'] ?>" data-type="<?php echo $major['type'] ?>" data-departments_id="<?php echo $major['departments_id'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i></a>
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
            var majors_name = $(this).attr('data-majors_name');
            var code = $(this).attr('data-code');
            var description = $(this).attr('data-description');
            var credit_price = $(this).attr('data-credit_price');
            var total_credits = $(this).attr('data-total_credits');
            var duration_in_years = $(this).attr('data-duration_in_years');
            var type = $(this).attr('data-type');
            var departments_id = $(this).attr('data-departments_id');
            $('#update_majors_id').val(id);
            $('#update_majors_name').val(majors_name);
            $('#update_code').val(code);
            $('#update_description').val(description);
            $('#update_credit_price').val(credit_price);
            $('#update_total_credits').val(total_credits);
            $('#update_duration').val(duration_in_years);
            $('#update_type').val(type);
            $('#update_departments_id').val(departments_id);
        });

        $(document).on('submit', '#updateForm', function(e) {
            sendFormAJAX(e);
        });

        $('#datatablesSimple').on('submit', '.deleteForm', function(e) {
            sendDeleteAJAX(e);
        });

    });
</script>