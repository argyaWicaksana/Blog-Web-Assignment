<?php
include '../templates/header.php';
include "../../connect.php";

$sql = "SELECT * FROM `category`";
$all_categories = mysqli_query($connect, $sql);
$a_id = $_GET['a_id'];

$sql = "SELECT * FROM article WHERE article_id=$a_id";
$article = mysqli_query($connect, $sql);
$article = $article->fetch_assoc();
?>

<h1 class="tes">Edit Article</h1>
<hr>
<div class="row">
    <form action="../process/updateArticle.php" method="post" enctype="multipart/form-data" class="col-lg-9">
        <input type="hidden" name="a_id" value="<?= $a_id ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" value="<?= $article['title'] ?>" type="text" class="form-control" id="title" placeholder="Enter your Title" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-select" id="category">
                <?php

                while ($category = mysqli_fetch_array(
                    $all_categories,
                    MYSQLI_ASSOC
                )) :;
                ?>
                    <option <?= $article['category_id'] == $category['id'] ? 'selected' : '' ?> value="<?= $category["id"]; ?>">
                        <?= $category["name"]; ?>
                    </option>
                <?php
                endwhile;
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input name="file" class="form-control" type="file" id="img" accept="image/png, image/gif, image/jpeg">
            <!-- image-preview -->
            <img class="img-fluid col-sm-9 mt-3 image-preview" src="<?= isset($article['img']) ? $article['img'] : '' ?>" alt="">
        </div>
        <div class="mb-3">
            <br>
            <label for="text" class="form-label">Content</label>
            <br>
            <input id="x" type="hidden" name="content" value="<?= $article['content'] ?>">
            <small>Edit your content here</small>
            <trix-editor input="x"></trix-editor>
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