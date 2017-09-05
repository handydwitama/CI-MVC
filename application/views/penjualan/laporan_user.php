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
    <script type="text/javascript">
        function searchUser(){
            var input, filter, table, tr, td, i;
            input = document.getElementById("mySearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("mytable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++){
                td = tr[i].getElementsByTagName("td")[1];
                if (td){
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1){
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
        MENAMPILKAN DATA PEMBELIAN SETIAP USER 
        <br>
        <br>
        <br>
        <input type="search" id="mySearch" placeholder="Search By Username" oninput="searchUser();">
        <br>
        <br>
        <table id="mytable" align="center" border='1' Width='800'>  

        <tr>
            
            <th class = "text-center"> ID User </th>
            <th class = "text-center"> Username</th>
            <th class = "text-center"> Total Belanja </th>
            <th class = "text-center"> Action </th>
            
        </tr>


        <?php  
        $no = 1;

        foreach ($item as $list)
        {
            echo " <tr>      
            <td><center>".$list['id_user']."</td>
            <td><center>".$list['nama']."</td>
            <td align ='center'>".$list['jml']."</td>
            <td><center>
            <a href='detail_laporan1?nama=".$list['nama']."'>Lihat Detail</a> &nbsp; 
            </center>        
            </td>
            </tr>";
            $no++;
        }

        ?>
        </table>

        <br>

        <center> 
        <input type="button" onclick="location.href='http://handy.orange.com/CodeIgniter-3.1.5/crud/laporan/';" value="Back" />
</div>
        



</body>
</html>
