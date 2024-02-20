<?php 
$title = 'Product Edit';
require_once(__DIR__) . '/../includes/app.php';
require_once __DIR__ . '/../../Controller/Product.php';
require_once __DIR__ . '/../../Controller/ProductIncome.php';
?> 
    <div class="app-container container-lg  pt-10">
        <div class="content-header row mb-6">
            <div class="content-header-left col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-4">Edit</h2>
                        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                            <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-semibold">
                                <li class="breadcrumb-item">
                                    <a href="/views/dashboard/dashboard.php">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="/views/productIncome/productIncome_show.php">
                                        Product List
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    Edit
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-flush p-10">
            <form id="kt_docs_formvalidation_text" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="/Controller/ProductIncome.php?id=<?=$productIncome['id']?>" method="POST">
            <div class="fv-row mb-10 row fv-plugins-icon-container">
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <label for="productSelect" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Select Product</span>
                    </label>
                </div>
                <div class="col-7">
                    <select name="product_id" id="productSelect" data-control="select2" data-placeholder="Select..."
                        class="form-select form-select-solid mb-3 mb-lg-0">
                        <?php foreach ($products as $product): ?>
                        <option  value="<?=$product['id']?>"><?=$product['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="fv-row mb-10 row fv-plugins-icon-container">
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <label class="required fw-semibold fs-6 mb-2">Count</label>
                </div>
                <div class="col-7">
                    <input type="text" name="count" value="<?=$productIncome['count']?>" class="form-control form-control-solid mb-3 mb-lg-0">
                    <div class="fv-plugins-message-container invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="fv-row mb-10 row fv-plugins-icon-container">
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <label class="required fw-semibold fs-6 mb-2">Selling Price</label>
                </div>
                <div class="col-7">
                    <input type="text" name="seling_price" value="<?=$productIncome['selling_price']?>" class="form-control form-control-solid mb-3 mb-lg-0">
                    <div class="fv-plugins-message-container invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="fv-row mb-10 row fv-plugins-icon-container">
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <label class="required fw-semibold fs-6 mb-2">Income Price</label>
                </div>
                <div class="col-7">
                    <input type="text" name="income_price" value="<?=$productIncome['income_price']?>" class="form-control form-control-solid mb-3 mb-lg-0">
                    <div class="fv-plugins-message-container invalid-feedback">
                    </div>
                </div>
            </div>
            <div class="fv-row mb-10 row fv-plugins-icon-container">
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <label class="required fw-semibold fs-6 mb-2">Date</label>
                </div>
                <div class="col-7">
                    <input type="date" name="date" value="<?=$productIncome['date']?>" class="form-control form-control-solid mb-3 mb-lg-0">
                    <div class="fv-plugins-message-container invalid-feedback">
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="offset-3 col-7">
                        <button id="kt_docs_formvalidation_text_submit" name="update" type="submit" class="btn btn-primary btn-sm">
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