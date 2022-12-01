<?php include '../templates/header.php' ?>

<h1 class="tes">Create Your Article</h1>
<hr>
<div class="row">
    <form action="../process/createArticle.php" method="post" enctype="multipart/form-data" class="col-lg-9">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Enter your Title" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-select" id="category">
                <?php
                // Call connection
                include "../../connect.php";
                $sql = "SELECT * FROM `category`";
                $all_categories = mysqli_query($connect, $sql);
                // using this loop to take the data
                // $all_categories variable means all of them wkwk
                // eventually print them individually
                // ndak bisa basa enggress

                // Start of the loop
                while ($category = mysqli_fetch_array(
                    $all_categories,
                    MYSQLI_ASSOC
                )) :;
                ?>
                    <option value="<?php echo $category["id"]; ?>">
                        <?php echo $category["name"]; ?>
                    </option>
                <?php
                endwhile;
                // Akhir dari loop
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input name="file" class="form-control" type="file" id="img" accept="image/png, image/gif, image/jpeg">
            <!-- image preview -->
            <img class="img-fluid col-sm-9 mt-3 image-preview" src="" alt="">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Content</label>
            <input id="x" type="hidden" name="content">
            <trix-editor input="x"> </trix-editor>
        </div>
        <div class="mb-3 d-md-flex justify-content-md-end">
            <button name="submit" type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
</article>
</main>
</div>
<script>
    document.addEventListener('trix-file-accept', (e) => e.preventDefault())

    $(document).ready(() => {
        $('#img').change(() => {
            const file = $('#img').prop('files')[0]
            if (file) {
                let reader = new FileReader()
                reader.onload = (event) => $('.image-preview').attr('src', event.target.result)
                reader.readAsDataURL(file)
            }
        })
    })
</script>

<?php include '../templates/footer.php' ?>