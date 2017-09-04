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
</head>
<body>
    <?php
        if (isset($message_display)) {
            echo "<div class='message'>";
            echo $message_display;
            echo "</div>";
        }
    ?>

        <div class="col-sm-8 text-left"> 
        <form id="myForm" method="POST" action="http://handy.orange.com/CodeIgniter-3.1.5/crud/buy_proses">
            <input type = 'hidden' name='nama' id ='nama' value="<?php echo $username; ?>" readonly/></input>
            <p><h2><?php echo $username; ?></h2></p>
            <br>
            <br>

            <table  id="theTable" border='1' Width='600'>  
                <tr>    
                    <th> Nomor </th>
                    <th> Nama Barang </th>
                    <th> Harga Satuan</th>
                    <th> Quantity </th>
                    <th> Jumlah Harga</th>

                </tr>

                <tr id="templateRow" class="templateRow" align="center">
                    <td class="nom">1</td>
                    <td><select class='barang' name='barang[]' id='barang[]' onchange="ajax_harga(this);">
                        <?php  
                            foreach($barang as $all_barang){
                                echo "<option value='".$all_barang['nama_barang']."'>".$all_barang['nama_barang']."</option>";
                            }
                        ?>
                    </select></td>
                    <td>
                        <p id="h" class="h" align="center">10000</p>
                    </td>
                    <td align="center">
                        <select id="quantity" name="quantity[]" class="q" onchange="get_jumlah(this);">
                        <?php
                            for ($i=1; $i<11 ; $i++) { 
                                echo "<option value='".$i."'>".$i."</option>";
                            }
                        ?>
                        </select>
                    </td>
                    <td><p id ="j[]" class="j" align="center">10000</p></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"> Total Pembelian : </td>
                    <td>
                    <p align="center" id="sum" class="sum" value=""></p>
                    </td>
                </tr>
            </table>

            <script type="text/javascript">

                var get_jumlah = function(event){
                var qty = $(event);
                var hrg = qty.parent().parent().find(".h");
                var jml = qty.parent().parent().find(".j");
                var hrg1 = hrg.html();
                var qty1 = qty.val();
                jml.html(hrg1 * qty1);
                total_harga();
                }

                function mySubmit() {
                    document.getElementById("myForm").submit();
                }
                
                var ajax_harga = function(event){
                var barang = $(event);
                var harga = barang.parent().parent().find(".h");

                $.ajax({
                        url: "<?php echo base_url(); ?>" + "Crud/ajax_harga",
                        
                        type: 'post', // performing a POST request
                        data : {
                            nama_barang : barang.val()
                        },
                        dataType: "json",
                        success: function(data) {
                        harga.html(data.harga);
                        var jml = barang.parent().parent().find(".j");
                        jml.html(harga.html());
                        var qt = barang.parent().parent().find(".q");
                        qt.val(1);
                        total_harga();
                        }
                    })
                

                }

                function total_harga(){
                var tot = 0;
                table = document.getElementById("theTable");
                tr = table.getElementsByTagName("tr");
                for (i = 1; i < tr.length-1; i++){
                    td = tr[i].getElementsByTagName("td")[4];
                    p = td.getElementsByTagName("p")[0];
                    if (td){
                    
                    tot = tot + parseInt(p.innerHTML);
                    }       
                }
                document.getElementById("sum").innerHTML = tot;
                }


                var a = 0;
                
                function getTemplateRow(){

                    var x = document.getElementsByClassName("templateRow")[a].cloneNode(true);
                    a++;;
                    return x;
                    

                }

                function addRow(){
                    var t = document.getElementById("theTable");
                    var rows = t.getElementsByTagName("tr");
                    var r = rows[rows.length-1];
                    r.parentNode.insertBefore(getTemplateRow(), r);
                    document.getElementsByClassName("nom")[a].innerHTML = a+1;
                    total_harga();
                
                }

                function deleteRow(row){
                    var i=row.parentNode.parentNode.rowIndex;
                    document.getElementById('theTable').deleteRow(a+1);
                    a--;
                    total_harga();
                }

            
            
            </script>
        </form>

        <button id="add" onclick="addRow();">+</button>
        <button id="delete" onclick="deleteRow(this);">-</button>

        <br>
        <br>

        <input type="button" onclick="mySubmit()" value="Confirmasi Pembelian">  
        <br>
        <br>



        <input type="button" onclick="location.href='<?php echo 'index'; ?>';" value="Back" />
        </div>
        



</body>
</html>
