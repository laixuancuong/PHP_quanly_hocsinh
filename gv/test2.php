<html>
<?php
  function runMyFunction() {
    echo 'I just ran a php function';
  }
 
  if (isset($_GET['hello'])) {
    runMyFunction();
  }
?>
<script>
function echoHello(){
 alert("<?PHP hello(); ?>");
 }
function myAjax() {
      $.ajax({
           type: "POST",
           url: 'your_url/ajax.php',
           data:{action:'call_this'},
           success:function(html) {
             alert(html);
           }
 
      });
 }
</script>
 <a href="" onclick="myAjax()" class="deletebtn">Delete</a>
<?PHP
FUNCTION hello(){
 echo "Call php function on onclick event.";
 }
 
?>
 
<button onclick="echoHello()">Say Hello</button>

Hello there!
<a href='index.php?hello=true'>Run PHP Function</a>
<!--Include jQuery-->
<script type="text/javascript" src="jquery.min.js"></script> 
 
<script type="text/javascript"> 
function doSomething() { 
    $.get("somepage.php"); 
    return false; 
} 
</script>
 
<a href="#" onclick="doSomething();">Click Me!</a>
</html>