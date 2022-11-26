<?php include '../templates/header.php'; ?>

    <h1>My Article</h1>
    <hr>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">User</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Twitter Was My Longest Toxic Relationship</td>
                <td>
                    <a href="#" class="badge bg-info">
                        <i data-feather="eye"></i>
                    </a>
                    <a href="#" class="badge bg-danger">
                        <i data-feather="trash-2"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>How to Eat Healthy</td>
                <td>
                    <a href="#" class="badge bg-info">
                        <i data-feather="eye"></i>
                    </a>
                    <a href="#" class="badge bg-danger">
                        <i data-feather="trash-2"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>What is Linux</td>
                <td>
                    <a href="#" class="badge bg-info">
                        <i data-feather="eye"></i>
                    </a>
                    <a href="#" class="badge bg-danger">
                        <i data-feather="trash-2"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-success" href="create.php">Create New Article</a>
</article>
</main>
</div>

<?php include '../templates/footer.php'; ?>