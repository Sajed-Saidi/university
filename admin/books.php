<?php
require("../classes/Books.class.php");

$Books = new Books();
$allBooks = $Books->getAllBooks();
// var_dump($allBooks);
// exit;

include("includes/header.php"); ?>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Books</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/books/add_books.php" method="POST" id="addForm">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ISBN</span>
                        <input type="number" name="isbn" class="form-control" placeholder="Enter ISBN" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Title</span>
                        <input
                            type="text"
                            name="title"
                            class="form-control" placeholder="Enter Title" required aria-label="university" aria-describedby="basic-addon3" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Author</span>
                        <input type="text" name="author" class="form-control" placeholder="Enter Author" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Category</span>
                        <input type="text" name="category" class="form-control" placeholder="Enter Category" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Copies</span>
                                <input type="number" name="copies" class="form-control" placeholder="Enter Copies" required aria-label="university" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Owned by University
                                </label>
                                <input class="form-check-input" name="is_university_owned" type="checkbox" id="flexCheckDefault">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Image</span>
                        <input type="file" accept=".jpg, .jpeg, .png" name="image" class="form-control" placeholder="Enter Image" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Price</span>
                        <input type="number" name="price" class="form-control" placeholder="Enter Price" required aria-label="university" aria-describedby="basic-addon1">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Books</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="actions/books/update_books.php" method="POST" id="updateForm">
                <input type="hidden" name="books_id" id="update_books_id">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ISBN</span>
                        <input type="number" id="update_isbn" name="isbn" class="form-control" placeholder="Enter ISBN" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Title</span>
                        <input
                            type="text"
                            name="title"
                            class="form-control" id="update_title" placeholder="Enter Title" required aria-label="university" aria-describedby="basic-addon3" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Author</span>
                        <input type="text" id="update_author" name="author" class="form-control" placeholder="Enter Author" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Category</span>
                        <input type="text" id="update_category" name="category" class="form-control" placeholder="Enter Category" required aria-label="university" aria-describedby="basic-addon1">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Copies</span>
                                <input type="number" id="update_copies" name="copies" class="form-control" placeholder="Enter Copies" required aria-label="university" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <label class="form-check-label" for="update_is_university_owned">
                                    Owned by University
                                </label>
                                <input class="form-check-input" name="is_university_owned" type="checkbox" id="update_is_university_owned">
                            </div>
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Image</span>
                        <input class="form-control" type="file" accept=".jpg, .jpeg, .png" class="form-control" id="update_image" aria-label="settings" name="image" aria-describedby="basic-addon1">
                    </div>
                    <div class="bg-dark mb-3" style="width: fit-content">
                        <img class="old_image_holder img-fluid" id="old_image_holder" width="60" height="60" alt="">
                    </div>
                    <input class="form-control" type="hidden" name="old_image" class="old_image_input" id="old_image_input">
                    <!-- Price -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Price</span>
                        <input type="number" id="update_price" name="price" class="form-control" placeholder="Enter Price" required aria-label="university" aria-describedby="basic-addon1">
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
                    <span class="actual-text">&nbsp;Books&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Books&nbsp;</span>
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
                                    <th>ISBN</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Owned By University</th>
                                    <th>Copies</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($allBooks as $book) {
                                    ?>
                                        <tr>
                                            <td><?php echo $book['books_id']; ?></td>
                                            <td><?php echo $book['isbn']; ?></td>
                                            <td><?php echo $book['title']; ?></td>
                                            <td><?php echo $book['author']; ?></td>
                                            <td><?php echo $book['category']; ?></td>
                                            <td><?php echo $book['is_university_owned']; ?></td>
                                            <td><?php echo $book['copies']; ?></td>
                                            <td><img src="../assets/images/books/<?php echo $book['image']; ?>" width="60" height="60" alt=""></td>
                                            <td><?php echo $book['price']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="actions/books/delete_books.php" method="POST" class="deleteForm d-inline">
                                                        <input type="hidden" name="books_id" value="<?php echo $book['books_id'] ?>">
                                                        <input type="hidden" name="image" value="<?php echo $book['image'] ?>">
                                                        <button type="submit" class="delete" style="outline: none;border:none;background:none"><i class="fa-solid fa-trash text-danger"></i></button>
                                                    </form>
                                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="edit" data-id="<?php echo $book['books_id'] ?>" data-isbn="<?php echo $book['isbn'] ?>" data-title="<?php echo $book['title'] ?>" data-author="<?php echo $book['author'] ?>" data-category="<?php echo $book['category'] ?>" data-is_university_owned="<?php echo $book['is_university_owned'] ?>" data-copies="<?php echo $book['copies'] ?>" data-image="<?php echo $book['image'] ?>" data-price="<?php echo $book['price'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i></a>
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
            var isbn = $(this).attr('data-isbn');
            var title = $(this).attr('data-title');
            var author = $(this).attr('data-author');
            var category = $(this).attr('data-category');
            var is_university_owned = $(this).attr('data-is_university_owned');
            var copies = $(this).attr('data-copies');
            var image = $(this).attr('data-image');
            var price = $(this).attr('data-price');
            $('#update_books_id').val(id);
            $('#update_isbn').val(isbn);
            $('#update_title').val(title);
            $('#update_author').val(author);
            $('#update_category').val(category);
            $('#update_is_university_owned').prop('checked', is_university_owned == 1);
            $('#update_copies').val(copies);
            $('#old_image_input').val(image.trim());
            $('#old_image_holder').attr('src', "../assets/images/books/" + image.trim());
            $('#update_price').val(price);
        });

        $(document).on('submit', '#updateForm', function(e) {
            sendFormAJAX(e);
        });

        $('#datatablesSimple').on('submit', '.deleteForm', function(e) {
            sendDeleteAJAX(e);
        });

    });
</script>