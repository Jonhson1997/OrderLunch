</body>
</html>
<script type="text/javascript">
    $("a#single_image").fancybox();
    var food_arr_zh = [];
    <?php foreach($food_Arr_zh as $k => $v):?>
        food_arr_zh["<?=$k?>"] = "<?=$v?>";
    <?php endforeach;?>
    var food_arr_tel = [];
    <?php foreach($food_Arr_tel as $k => $v):?>
        food_arr_tel["<?=$k?>"] = "<?=$v?>";
    <?php endforeach;?>

    var food_arr_memo = [];
    <?php foreach($food_Arr_memo as $k => $v):?>
        food_arr_memo["<?=$k?>"] = "<?=$v?>";
    <?php endforeach;?>

    var drink_arr_zh = [];
    <?php foreach($drink_Arr_zh as $k => $v):?>
        drink_arr_zh["<?=$k?>"] = "<?=$v?>";
    <?php endforeach;?>

    var drink_arr_tel = [];
    <?php foreach($drink_Arr_tel as $k => $v):?>
        drink_arr_tel["<?=$k?>"] = "<?=$v?>";
    <?php endforeach;?>

    var drink_arr_memo = [];
    <?php foreach($drink_Arr_memo as $k => $v):?>
        drink_arr_memo["<?=$k?>"] = "<?=$v?>";
    <?php endforeach;?>
    var cat = "<?=$cat?>";
    if(cat == 'food')
    {
        $.each(food_arr_zh,function(key,value){
            $('#list-group').append('<a class="list-group-item col-4" data-id="'+key+'">'+value+'</a>');
        });
    }
    else if(cat == 'drink')
    {
        $.each(drink_arr_zh,function(key,value){
            $('#list-group').append('<a class="list-group-item col-4" data-id="'+key+'">'+value+"</a>");
        });
    }
    $('a[data-id]').on('click',function(){
        get_data($(this).attr('data-id'),cat);
    });

    function get_data(id,cat)
    {
        if($('div#collapseExample').attr('data-id') == '' || $('div#collapseExample').attr('data-id') != id)
        {
            $('div#collapseExample').show('slow');
            $('div#collapseExample').attr('data-id',id);
            $('div#collapseExample').css('display','flex');
            $('img#collapse_img').attr('src','./'+cat+'/'+id+'.jpg');
            $('a#single_image').attr('href','./'+cat+'/'+id+'.jpg');
            if(cat == 'food')
            {
                $('h1#title').text('【 '+food_arr_zh[id]+' 】');
                $('h1#tel').text('電話: '+food_arr_tel[id]);
                $('textarea#memo').text('備註: '+ food_arr_memo[id]);
            }
            else if(cat == 'drink')
            {
                $('h1#title').text('【 '+drink_arr_zh[id]+' 】');
                $('h1#tel').text('電話: '+drink_arr_tel[id]);
                $('textarea#memo').text('備註: '+ drink_arr_memo[id]);
            }
        }
        else if($('div#collapseExample').attr('data-id') == id)
        {
            $('div#collapseExample').hide('slow');
            $('div#collapseExample').attr('data-id','');
        }
    }

    function get_rand_food()
    {
        if(food_arr_zh.length == 1)
        {
            get_data(Math.floor(Math.random()*food_arr_zh.length),'food');
        }
        else
        {
            var tmp = Math.floor(Math.random()*food_arr_zh.length);
            while(tmp == $('div#collapseExample').attr('data-id'))
            {
                tmp = Math.floor(Math.random()*food_arr_zh.length);
            }
            get_data(tmp,'food');
        }
    }

    function get_rand_drink()
    {
        if(drink_arr_zh.length == 1)
        {
            get_data(Math.floor(Math.random()*drink_arr_zh.length),'drink');
        }
        else
        {
            var tmp = Math.floor(Math.random()*drink_arr_zh.length);
            while(tmp == $('div#collapseExample').attr('data-id'))
            {
                tmp = Math.floor(Math.random()*drink_arr_zh.length);
            }
            get_data(tmp,'drink');
        }
    }

    function get_rand_set()
    {
        var food = food_arr_zh[Math.floor(Math.random()*food_arr_zh.length)];
        var drink = drink_arr_zh[Math.floor(Math.random()*drink_arr_zh.length)];
        alert('今日組合餐: 【 '+food+' 】 + 【 '+drink+' 】');
    }
</script>