<?php include '../templates/header.php' ?>

    <h1 class="tes">Create Your Article</h1>
    <hr>
    <div class="row">
        <form action="#" method="post" class="col-lg-9">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input class="form-control" type="file" id="img" required>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <input id="x" type="hidden" name="content">
                <trix-editor input="x"></trix-editor>
            </div>
            <div class="mb-3 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</article>
</main>
</div>
<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>

<?php include '../templates/footer.php' ?>