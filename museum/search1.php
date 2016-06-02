<head>
        <title>Документ</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="jQuery.js"></script>
      </head>
<table>
<?php
require_once('connection1.php');
$search = $_POST["search"];
?> 
<table>
     <tr>
        <td class="search"></td>
        <td class="search">
                 <span>
                    <input type="text" id="search"/>
                    <input type="button" name="search" value="Поиск" onclick="search()"/>
                 </span>
        </td>
        <td class="search"></td>
    </tr>
	<tr>
		<td>
			Номер
		</td>
		<td>
			Наименование
		</td>
		<td>
			Автор
		</td>
		<td>
			Год
		</td>
		<td>
			Тип работы
		</td>
		<td>
			Период
		</td>
		<td>
			Материал
		</td>
		<td>
			Описание
		</td>
	</tr>
	<?php
	$sqlinfo = mysql_query("SELECT * FROM exibit,period WHERE exibit.id_p_e = period.id_p  AND ((exibit.name = '".$search."') OR (exibit.author = '".$search."'))");
	if ((mysql_num_rows($sqlinfo))) {
	while (($line = mysql_fetch_assoc($sqlinfo))) {
	?>
	<tr> 
		<td><?php echo $line["id_e"]; ?><br></td>
		<td><?php echo $line["name"]; ?></td>
		<td><?php echo $line["author"]; ?></td>
		<td><?php echo $line["year"]; ?></td>
		<td><?php echo $line["type"]; ?></td>
		<td><?php echo $line["id_p_e"]; ?></td>
		<td><?php echo $line["material"]; ?></td>
		<td><?php echo $line["id_a_e"]; ?></td>
	</tr>
		<?php }}
	?>
</table></br>
  
