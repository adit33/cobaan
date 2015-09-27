<div class="ui left vertical inverted labeled icon sidebar menu">
          <a class="item">
            <i class="home icon"></i>
            Home
          </a>
          <a class="item">
            <i class="block layout icon"></i>
            Topics
          </a>
          <a class="item">
            <i class="smile icon"></i>
            Friends
          </a>
  </div>

  <div class="ui black huge launch right attached button">
          <i class="icon list layout"></i>
          <span class="text" style="display:none;">Sidebar</span>
        </div>


        
<script>
  $(".launch.button").mouseenter(function(){
    $(this).stop().animate({width: '150px'}, 300, 
             function(){$(this).find('.text').show();});
  }).mouseleave(function (event){
    $(this).find('.text').hide();
    $(this).stop().animate({width: '70px'}, 300);
  });
$(".ui.sidebar").sidebar()
                .sidebar('attach events','.ui.launch.button');
</script>
