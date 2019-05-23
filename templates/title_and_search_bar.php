
<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-4"><h3 class="position-relative"><?php echo $pageTitle = Paginate::pageTitle(); ?></h3></div>
        <div class="col-xl-4">&nbsp;</div>
        <div class="col-xl-4 d-flex search-box">
            <form class="form-inline mt-2 mt-md-0" action="././search.php" method="post">
                <input name="searchkeyword" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button name="search-for-account" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>