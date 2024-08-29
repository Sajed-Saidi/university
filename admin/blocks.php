<?php
require("../classes/Blocks.class.php");
require("../classes/Departments.class.php");

$Blocks = new Blocks();
$allBlocks = $Blocks->getAllBlocks();

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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Blocks</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/blocks/add_blocks.php" method="POST" id="addForm">
                <div class="modal-body">
                    <!-- Blocks Letter -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Blocks Letter</span>
                        <input type="text" maxlength=1 name="blocks_letter" class="form-control" placeholder="Enter Block Letter" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Department ID -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="departments_id">Department</label>
                        <select class="form-select" name="departments_id" id="departments_id">
                            <?php
                            foreach ($allDepartments as $department) {
                            ?>
                                <option value="<?php echo $department['departments_id'] ?>">
                                    <?php echo $department['departments_name'] . " - " . $department['campuses_name'] ?>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Blocks</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/blocks/update_blocks.php" method="POST" id="updateForm">
                <input type="hidden" name="blocks_id" id="update_blocks_id">
                <div class="modal-body">
                    <!-- Blocks Letter -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Blocks Letter</span>
                        <input type="text" maxlength=1 name="blocks_letter" id="update_blocks_letter" class="form-control" placeholder="Enter Block Letter" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Department ID -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="update_departments_id">Department</label>
                        <select class="form-select" name="departments_id" id="update_departments_id">
                            <?php
                            foreach ($allDepartments as $department) {
                            ?>
                                <option value="<?php echo $department['departments_id'] ?>">
                                    <?php echo $department['departments_name'] . " - " . $department['campuses_name'] ?>
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
                    <span class="actual-text">&nbsp;Blocks&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Blocks&nbsp;</span>
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
                                <span class="add-btn__text">Insert</span>
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
                                    <th>Blocks ID</th>
                                    <th>Blocks Letter</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($allBlocks as $block) {
                                    ?>
                                        <tr>
                                            <td><?php echo $block['blocks_id']; ?></td>
                                            <td><?php echo $block['blocks_letter']; ?></td>
                                            <td><?php echo $block['departments_name']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="actions/blocks/delete_blocks.php" method="POST" class="deleteForm d-inline">
                                                        <input type="hidden" name="blocks_id" value="<?php echo $block['blocks_id'] ?>">
                                                        <button type="submit" class="delete" style="outline: none;border:none;background:none"><i class="fa-solid fa-trash text-danger"></i></button>
                                                    </form>
                                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="edit" data-id="<?php echo $block['blocks_id'] ?>" data-blocks_letter="<?php echo $block['blocks_letter'] ?>" data-departments_id="<?php echo $block['departments_id'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i></a>
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
            var blocks_letter = $(this).attr('data-blocks_letter');
            var departments_id = $(this).attr('data-departments_id');
            $('#update_blocks_id').val(id);
            $('#update_blocks_letter').val(blocks_letter);
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