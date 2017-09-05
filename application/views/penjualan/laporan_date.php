<!DOCTYPE html>
<html lang="en">
<?php
    if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);
        $email = ($this->session->userdata['logged_in']['email']);
    } else {
         header("location: http://handy.orange.com/CodeIgniter-3.1.5/crud/login");
    }
?>
<head>
    <title>Transaksi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#startdate" ).datepicker();
            $( "#enddate" ).datepicker();
          } );
        function caritanggal(){
            var startd = $('#startdate').val();
            var d1 = startd.split("/");
            var from = d1[2]+-+d1[0]+-+d1[1];
            
            var endd = $('#enddate').val();
            var d2 = endd.split("/");
            var to = d2[2]+-+d2[0]+-+(parseInt(d2[1])+1);
        
            table = document.getElementById("mytable");
            tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++){
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td){
                        if (Date.parse(td.innerHTML) <= Date.parse(to) && Date.parse(td.innerHTML) >= Date.parse(from)){
                            tr[i].style.display = "";
                        
                        } else{
                            tr[i].style.display = "none";
                        }
                    }       
                }
            
        }
    </script>   
</head>
<body>


        <div class="col-sm-8 text-left"> 
            <center> 
            <h3>MENAMPILKAN DATA PEMBELIAN SETIAP TRANSAKSI</h3>
            <br>
            <br>          
            SEARCH BERDASARKAN TANGGAL
            <p>Start Date: <input type="text" id="startdate"> End Date: <input type="text" id="enddate"></p>
            <input type="button" onclick="caritanggal()" value="Cari" />
            <br>
            <br>
            <table id="mytable" align="center" border='1' Width='800'>  

            <tr>
                <th class = "text-center"> Transaksi ID</th>
                <th class = "text-center"> User </th>
                <th class = "text-center" style="width:30%"> Tanggal Pembelian </th>
                <th class = "text-center"> Jumlah belanja</th>
                <th class = "text-center"> Action </th>    
            </tr>


            <?php  
            $no = 1;

            foreach ($item as $row)
            {
                echo " <tr>
                <td align='center'>".$row['id_pembelian']."</center></td> 
                <td align='center'>".$row['nama']."</td>
                <td align='center'>".$row['tanggal']."</td>
                <td align='center'>".$row['jml']."</td>
                <td align='center'>
                <a href='detail_laporan2?id=".$row['id_pembelian']."'>Lihat Detail</a> &nbsp; 
                </center
                </td>
                </tr>";
                 $no++;
            }
            ?>
            </table>
            <br>
            <center>            
            <input type="button" onclick="location.href='http://handy.orange.com/CodeIgniter-3.1.5/crud/laporan/';" value="Back" />
            <br>
            <br>
        </div>
        



</body>
</html>
