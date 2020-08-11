<?php
  $conn=mysqli_connect('localhost' ,'root','','attendance');
  $query="select * from `attendance`";
  $result=mysqli_query($conn, $query);
 

?>

<!DOCTYPE html>
<html lang="en"  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attendance-data</title>
</head>
<body>
    <table align="center" border="1px" style="width:800px;line-height:60px" id="tblCustomers">
      <tr>
          <th colspan="8"><h3>Attendance Record</h3></th>
      </tr>
        <t>
            <th>S.L</th>
            <th>Name</th>
            <th>Registration No.</th>
            <th>Roll no</th>
            <th>Collge Name</th>
            <th>Branch</th>
            <th>Subject</th>
            <th>Date-time</th>
        </t>
        <?php
             while($rows=mysqli_fetch_array($result)){
        ?>
        <tr>
          <td> <?php echo $rows['S.L']; ?> </td>
          <td> <?php echo $rows['name']; ?> </td>
          <td> <?php echo $rows['registration']; ?> </td>
          <td> <?php echo $rows['roll']; ?> </td>
          <td> <?php echo $rows['college']; ?> </td>
          <td> <?php echo $rows['branch']; ?> </td>
          <td> <?php echo $rows['subject']; ?> </td>
          <td> <?php echo $rows['date-time']; ?> </td>
             </tr>
<?php
             }

?>
    </table>   
    <br>
    <input type="button" id="btnExport" value="Export" />
    
   
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    

<script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#tblCustomers')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Attendance-detail.pdf");
                }
            });
        });
    </script>

</body>
</html>