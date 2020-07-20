<?php $cat = 'food';?>
<?php include('_header.php');?>
    <!-- content -->
    <div class="col-12">
        <button type="button" class="btn btn-primary col-12" onclick="get_rand_food();">抽一間</button>
    </div>
    <div class="row" id="list-group">
        <div class="collapse col-12" id="collapseExample" data-id="">
            <div class="card card-body col-4">
                <a id="single_image" href="#"><img src="#" id="collapse_img" class="col-12"></a>
            </div>
            <div class="card card-body col-4">
                <h1>點餐筆記區</h1>
                <textarea id="order" style="height: 100%"></textarea>
            </div>
            <div class="card card-body col-4">
                <h1 id="title"></h1>
                <h1 id="tel"></h1>
                <textarea id="memo" style="color: red;font-size: 24px"></textarea>
            </div>
        </div>
        <div class="col-12"></div>
    </div>
    <!-- content end -->
<?php include('_footer.php');?>