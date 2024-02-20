<?php
$title = 'Product Create';
require_once(__DIR__) . '/../includes/app.php';
require_once __DIR__ . '/../../Controller/Category.php';
?>
<div class="app-container container-lg  pt-10">
    <div class="content-header row mb-6">
        <div class="content-header-left col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-4">Add</h2>
                    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                        <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-semibold">
                            <li class="breadcrumb-item">
                                <a href="/views/dashboard/dashboard.php">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/views/product/product_show.php">
                                    Product List
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Add
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-flush p-10">
        <form id="kt_docs_formvalidation_text" class="form fv-plugins-bootstrap5 fv-plugins-framework"
            action="/Controller/Product.php" method="POST">
            <div class="fv-row mb-10 row fv-plugins-icon-container">
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <label class="required fw-semibold fs-6 mb-2">Name</label>
                </div>
                <div class="col-7">
                    <input type="text" name="name" value="" class="form-control form-control-solid mb-3 mb-lg-0">
                    <div class="fv-plugins-message-container invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="fv-row mb-10 row fv-plugins-icon-container">
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <label for="categorySelect" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Select Category</span>
                    </label>
                </div>
                <div class="col-7">
                    <select name="category_id" id="categorySelect" data-control="select2" data-placeholder="Select..."
                        class="form-select form-select-solid mb-3 mb-lg-0">
                        <?php foreach ($categories as $category): ?>
                        <option  value="<?=$category['id']?>"><?=$category['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="offset-3 col-7">
                    <button id="kt_docs_formvalidation_text_submit" name="create" type="submit" class="btn btn-primary btn-sm">
                        Save
                    </button>

                    <a class="btn btn-sm btn-danger" href="">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require_once(__DIR__) . '/../includes/footer.php';
?>