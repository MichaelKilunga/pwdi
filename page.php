<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
         <script type="text/javascript">
       $(function(){
    $(".addButton").click(function(){
        $('.clonetr:last').clone(true).appendTo("#addrow");
    });

    $(".deleteButton").click(function(){
        if($('.deleteButton').length > 1){
        
           $(this).closest("tr").remove();
        }
    });
});
     </script>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="row">
       <div class="col-12">
        <h3>Add Video</h3>
         <form id="insertvideo" method="post">
         <table id="addrow" width="100%">
          <td><input type="button" class="btn btn-success addButton col-3 offset-1" value="add"/></td>
          <tr class="clonetr">
                <td>Video Title<input type="text" id="videotitle" name="videotitle[]" class="form-control"></td>
                <td>Video description<input type="text"  id="videodesc" name="videodesc[]" class="form-control"></td>
                <td>Video Links<input type="text"  id="videolink" name="videolink[]" class="form-control"></td>
                <td><input type="button" class="btn btn-danger deleteButton" value="delete"/></td>
          </tr>
         </table>
         </form>
       </div>
     </div>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>

