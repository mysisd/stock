/**
 * Created by Administrator on 2018/2/4 0004.
 */
$(function () {
    $('.it').hover( //鼠标滑过导航栏目时
        function(){
            $('.sub').show(); //显示下拉列表
            // $(this).css({'color':'red','background-color':'orange'}); //设置导航栏目样式，醒目
        },
        function(){
            $('.sub').hide(); //鼠标移开后隐藏下拉列表
        }
    );
    $('.sub').hover( //鼠标滑过下拉列表自身也要显示，防止无法点击下拉列表
        function(){
            $('.sub').show();
        }
    )

})