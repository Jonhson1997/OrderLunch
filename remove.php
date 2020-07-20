<?php $cat = 'remove';?>
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
            <form action="remove_check.php" method="POST" class="col-12" enctype="multipart/form-data">
                <select class="form-control col-4 mgtop mgbottom" name="cat" id="cat">
                    <option>請選擇</option>
                    <option value="food">食物</option>
                    <option value="drink">飲料</option>
                </select>
                <select class="form-control col-4 mgtop mgbottom" name="id" id="id">
                    <option>請選擇</option>
                </select>
                <input type="submit" value="OK" class="btn btn-success col-4 mgtop mgbottom">
            </form>
        </div>
    </div>
    <!-- content end -->
<?php include('_footer.php');?>
<script type="text/javascript">
    $('#cat').on('change',function(){
        $('select#id').empty();
        if($(this).val() == 'food')
        {
            <?php foreach($food_Arr_zh as $k => $v):?>
            $('select#id').append('<option value="<?=$k?>"><?=$v?></option>');
            <?php endforeach;?>
        }
        else if($(this).val() == 'drink')
        {
            <?php foreach($drink_Arr_zh as $k => $v):?>
            $('select#id').append('<option value="<?=$k?>"><?=$v?></option>');
            <?php endforeach;?>
        }
    });
</script>