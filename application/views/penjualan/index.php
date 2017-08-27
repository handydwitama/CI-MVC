<table  border='1' Width='800'>  
<tr>
    <th> Nomor </th>
    <th> Nama </th>
    <th> Umur </th>
    <th> Email </th>
    <th> Alamat </th>
    <th> Action </th>
    
</tr>


<?php  
$no = 1;
foreach($list as $list_user){
	echo " <tr>
    <td align='center'>".$no."</td>
    <td align='center'>".$list_user['nama']."</td>
    <td align='center'>".$list_user['Umur']."</td>
    <td align='center'>".$list_user['email']."</td>
    <td align='center'>".$list_user['alamat']."</td>
    <td align='center'></td>
    </tr>";
    $no++;
}

?>
</table>