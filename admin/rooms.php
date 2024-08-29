<?php
require("../classes/Blocks.class.php");
require("../classes/Rooms.class.php");

$Blocks = new Blocks();
$allBlocks = $Blocks->getAllBlocks();

$Rooms = new Rooms();
$allRooms = $Rooms->getAllRooms();

// var_dump($allRooms);
// exit;

include("includes/header.php"); ?>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Rooms</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/rooms/add_rooms.php" method="POST" id="addForm">
                <div class="modal-body">
                    <!-- Number -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Room Number</span>
                        <input type="number" min=0 max=400 name="number" class="form-control" placeholder="Enter Room Number" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Capacity -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Room Capacity</span>
                        <input type="number" min=0 max=100 name="capacity" class="form-control" placeholder="Enter Room Capacity" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Blocks ID -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="add_blocks_id">Room Block</label>
                        <select class="form-select" name="blocks_id" id="add_blocks_id">
                            <?php
                            foreach ($allBlocks as $block) {
                            ?>
                                <option value="<?php echo $block['blocks_id'] ?>">
                                    <?php echo $block['blocks_letter'] . " - " . $block['departments_name'] . " - " . $block['campuses_name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Blocks Name -->
                    <input type="hidden" name="blocks_letter" id="add_blocks_letter">
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
            <form action="actions/rooms/update_rooms.php" method="POST" id="updateForm">
                <input type="hidden" name="rooms_id" id="update_rooms_id">
                <div class="modal-body">
                    <!-- Number -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Room Number</span>
                        <input type="number" min=0 max=400 name="number" id="update_number" class="form-control" placeholder="Enter Room Number" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Capacity -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Room Capacity</span>
                        <input type="number" min=0 max=100 name="capacity" id="update_capacity" class="form-control" placeholder="Enter Room Capacity" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <!-- Blocks ID -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="update_blocks_id">Room Block</label>
                        <select class="form-select" name="blocks_id" id="update_blocks_id">
                            <?php
                            foreach ($allBlocks as $block) {
                            ?>
                                <option value="<?php echo $block['blocks_id'] ?>">
                                    <?php echo $block['blocks_letter'] . " - " . $block['departments_name'] . " - " . $block['campuses_name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Blocks Name -->
                    <input type="hidden" name="blocks_letter" id="update_blocks_letter">
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
                    <span class="actual-text">&nbsp;Rooms&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Rooms&nbsp;</span>
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
                                    <th>Rooms ID</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Occupied</th>
                                    <th>Capacity</th>
                                    <th>Blocks</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($allRooms as $room) {
                                    ?>
                                        <tr>
                                            <td><?php echo $room['rooms_id']; ?></td>
                                            <td><?php echo $room['name']; ?></td>
                                            <td><?php echo $room['number']; ?></td>
                                            <td><?php echo $room['occupied'] == 0 ? "No" : "Yes"; ?></td>
                                            <td><?php echo $room['capacity']; ?></td>
                                            <td><?php echo $room['blocks_letter']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="actions/rooms/delete_rooms.php" method="POST" class="deleteForm d-inline">
                                                        <input type="hidden" name="rooms_id" value="<?php echo $room['rooms_id'] ?>">
                                                        <button type="submit" class="delete" style="outline: none;border:none;background:none"><i class="fa-solid fa-trash text-danger"></i></button>
                                                    </form>
                                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="edit" data-id="<?php echo $room['rooms_id'] ?>" data-number="<?php echo $room['number'] ?>" data-capacity="<?php echo $room['capacity'] ?>" data-blocks_id="<?php echo $room['blocks_id'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i></a>
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
            let blockID = $("#add_blocks_id").val();
            let blocksArray = Array.from(<?php echo json_encode(
                                                $allBlocks
                                            ); ?>);
            let blockName = (blocksArray.find((e) => e.blocks_id == blockID)).blocks_letter;

            $("#add_blocks_letter").val(blockName);

            sendFormAJAX(e);
        });

        $('#datatablesSimple').on('click', '.edit', function() {
            var id = $(this).attr('data-id');
            var number = $(this).attr('data-number');
            var capacity = $(this).attr('data-capacity');
            var blocks_id = $(this).attr('data-blocks_id');
            $('#update_rooms_id').val(id);
            $('#update_number').val(number);
            $('#update_capacity').val(capacity);
            $('#update_blocks_id').val(blocks_id);
        });

        $(document).on('submit', '#updateForm', function(e) {
            let blockID = $("#update_blocks_id").val();
            let blocksArray = Array.from(<?php echo json_encode(
                                                $allBlocks
                                            ); ?>);
            let blockName = (blocksArray.find((e) => e.blocks_id == blockID)).blocks_letter;

            $("#update_blocks_letter").val(blockName);


            sendFormAJAX(e);
        });

        $('#datatablesSimple').on('submit', '.deleteForm', function(e) {
            sendDeleteAJAX(e);
        });

    });
</script>