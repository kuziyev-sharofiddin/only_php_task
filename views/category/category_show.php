<?php
$title = 'Category Show';
require_once __DIR__ . '/../../Controller/Category.php';
require_once __DIR__ . '/../../Controller/User.php';
require_once(__DIR__) . '/../includes/app.php';
// var_dump($user);
?>
<div class="app-container container  pt-10">
    <div class="content-header row mb-6">
        <div class="content-header-left col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-4">Categories</h2>
                    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                        <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-semibold">
                            <li class="breadcrumb-item">
                                <a href="/views/dashboard/dashboard.php">
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Categories
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-body p-10">
        <div class="d-flex flex-stack mb-5 ">
            <form action="" method="GET">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                            class="path2"></span></i>
                    <input type="text" style="margin-right: 10px;" data-kt-docs-table-filter="search" name="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search...">
                    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                        <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                <a href="/views/category/category_create.php" class="btn btn-primary btn-sm">
                    <i class="ki-duotone ki-plus fs-2"></i>
                    Add
                </a>
            </div>
        </div>
        <div id="categories_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="table-responsive">
                <table id="categories_datatable"
                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                    aria-describedby="categories_datatable_info" style="width: 1198px;">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="sorting" tabindex="0" aria-controls="categories_datatable" rowspan="1"
                                colspan="1" aria-label="№: activate to sort column ascending" style="width: 25px;">№
                            </th>
                            <th class="w-225px sorting" tabindex="0" aria-controls="categories_datatable" rowspan="1"
                                colspan="1" aria-label="Nomi: activate to sort column ascending"
                                style="width: 225.25px;">Name</th>
                                <th class="w-225px sorting" tabindex="0" aria-controls="categories_datatable" rowspan="1"
                                colspan="1" aria-label="Nomi: activate to sort column ascending"
                                style="width: 225.25px;">Status</th>
                            <th class="text-end sorting" tabindex="0" aria-controls="categories_datatable" rowspan="1"
                                colspan="1" aria-label="Harakatlar: activate to sort column ascending"
                                style="width: 143.25px;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                    <?php foreach ($categories as $category): ?>
                    <tr class="even">
                        <td><?=$category['id']?></td>
                        <td><a href="?parent_id=27" class="text-hover-primary text-gray-800"><?=$category['name']?></a></td>
                        <td><a href="?parent_id=27" class="text-hover-primary text-gray-800"><?=$category['status']?></a></td>
                        <td>
                        <?php if ( $role === 'superadmin'): ?>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="category_edit.php?id=<?=$category['id']?>" class="btn btn-success px-4 btn-sm kt_modal_stacked_edit">
                                            <i class="bi bi-pencil p-0"></i>
                                        </a>
                                        <a href="/Controller/Category.php?id=<?=$category['id']?>&delete" class="btn btn-danger btn-sm px-4 delete" data-id="27">
                                            <i class="bi bi-trash p-0"></i>
                                        </a>
                                    </div>
                                </div>
                        <?php endif; ?> 
                        </td>
                        </tr>
                    <?php endforeach; ?> 
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                    <div class="dataTables_paginate paging_simple_numbers" id="categories_datatable_paginate">
                        <!-- @if ($books->hasPages())
                                <div class="pagination-wrapper">
                                    {{ $books->links() }}
                                </div>
                            @endif -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once(__DIR__) . '/../includes/footer.php';
?>