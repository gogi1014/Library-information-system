<?php
    if (isset($_COOKIE['username'])){
        
    ?>

<script>
        document.body.style.background = localStorage.getItem('Background');
        document.body.style.backgroundRepeat = "no-repeat";
        document.body.style.backgroundAttachment = "fixed";
        document.body.style.backgroundSize = "cover";
        document.body.style.position = "center center";
</script>

<div class="dropdown">
    <button class="btn   dropdown-toggle" type="button" data-toggle="dropdown">Избор на фон
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li onclick="back1()" ><a href="#">Светъл</a></li>
      <li onclick="back2()"><a href="#">Тъмен</a></li>
      <li onclick="back3()"><a href="#">Черен</a></li>
    </ul>
  </div>
     <?php
}
?>
    
    <script>
function back1() {
  document.body.style.background = "url('671822c2f63dd5f65d8fd15c9710420b.jpg')";
  localStorage.setItem("Background", "url('671822c2f63dd5f65d8fd15c9710420b.jpg')");
  document.body.style.backgroundRepeat = "no-repeat";
  document.body.style.backgroundAttachment = "fixed";
  document.body.style.backgroundSize = "cover";
  document.body.style.position = "center center";
}
function back2() {
  document.body.style.background = "url('thumb-1920-26102.jpg')";
  localStorage.setItem("Background", "url('thumb-1920-26102.jpg')");
  document.body.style.backgroundRepeat = "no-repeat";
  document.body.style.backgroundAttachment = "fixed";
  document.body.style.backgroundSize = "cover";
  document.body.style.position = "center center";
}
function back3() {
  document.body.style.background = "url('4tTqZS.jpg')";
  localStorage.setItem("Background", "url('4tTqZS.jpg')");
  document.body.style.backgroundRepeat = "no-repeat";
  document.body.style.backgroundAttachment = "fixed";
  document.body.style.backgroundSize = "cover";
  document.body.style.position = "center center";

}
</script>
