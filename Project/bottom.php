</div>

<script>
    $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    });
  });
</script>


<script>

$("#save_btn").on("click",function(){

    $("#popup").removeClass("confirm_card");

    $("#close").on("click",function(){
      $("#popup").addClass("confirm_card");
      });
  });

</script>


</body>
</html>
