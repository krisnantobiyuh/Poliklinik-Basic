<script type="text/javascript">  
$(function(){
   function notif(){
   	var a = $("#notifPoli").val();
   	var b = "../notif/notif.php?po=";
   $("#not").load(b+a);
   $("#notApotek").load("../notif/notif.php?ac=apotek");
   $("#notKasir").load("../notif/notif.php?ac=kasir");
     setTimeout(function(){
       notif();
     },100);
   }

   notif();
})
</script>
<input id="notifPoli" value="<?=$poliLog?>" type="hidden">