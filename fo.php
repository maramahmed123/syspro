
    </div>
    <div class="item8">
        <div class="footer">
            <div class="copy-right">
                <p> © 2022 , HTML CSS AUC Template</p>
            </div>
            
        </div>
    </div>
</div>


<script>
    function mycolor() {
        document.getElementById("b_c").style.backgroundColor = document.getElementById("c").value;
    }
    function textcolor() {
        document.getElementById("b_c").style.color = document.getElementById("t").value;
    }


 

            $(function() {
                function loop(){
                 $('.item1')
                   .animate({
                    opacity: '0.5',},1000)
                   .animate({
                    opacity: '1',},1000, loop);
                }
                // call this wherever you want
                loop(); 
              }); 

              $(document).ready(function(){
                $(".not").click(function(){
                  $(".fade").toggle("slow");
                });
              });

</script> 
</body>

</html>