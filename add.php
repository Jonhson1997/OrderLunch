<?php $cat = 'add';?>
<?php include('_header.php');?>
    <style type="text/css">
        .mgtop {
            margin-top: 15px;
        }
        .mgbottom {
            margin-bottom: 15px;
        }
    </style>
    <!-- content -->
    <div class="row">
        <div class="col-12">
            <form action="add_check.php" method="POST" class="col-12" enctype="multipart/form-data">
                <select class="form-control col-4 mgtop mgbottom" name="cat">
                    <option>請選擇</option>
                    <option value="food">食物</option>
                    <option value="drink">飲料</option>
                </select>
                <input type="text" name="name" placeholder="店家名稱" class="form-control col-4 mgtop mgbottom">
                <input type="text" name="tel" placeholder="店家電話" class="form-control col-4 mgtop mgbottom">
                <textarea name="memo" class="form-control col-4 mgtop mgbottom">備註事項</textarea>
                菜單: <input type="file" name="pic" class="form-control col-4 mgbottom">
                <input type="submit" value="OK" class="btn btn-success col-4 mgtop mgbottom">
            </form>
        </div>
    </div>
    <!-- content end -->
<?php include('_footer.php');?>