<?php require("header.php") ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Category </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="card-body">
                <form action="/admincategory/postupdate" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control" placeholder="name" name="name" value="<?= $data->name; ?>">
                        </div>

                        <div class="form-group">

                            <!--Current image  -->
                            <img src="<?= DOMAIN_NAME . "img/" . $data->img; ?>" alt="" width="100px" height="100px">

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" value="<?= $data->img; ?>">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Icon</label>
                            <input type="text" class="form-control" placeholder="Enter icon" name="icon" value="<?= $data->icon; ?>">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- hidden if of element that i want update -->
                    <input type="hidden" name="id" value="<?= $data->id; ?>">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require("footer.php") ?>