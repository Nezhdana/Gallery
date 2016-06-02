<?php
require_once('connection1.php');
$exibit=$_GET["exibit"];
if ($_POST){
    $field = $_POST['field'];
    $id = $_POST['id'];
    $value = $_POST['value'];
    $query1 = mysql_query("UPDATE exibit SET $field = '$value' WHERE id_e = '".$id."'");
}
?> 
      <head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
      </head>

<body>

<script>
	function search(){
		var a = document.getElementById("search").value;
		$.ajax({
			type: "POST",
			url:"search1.php",
			data: "search=" + a,
			success: function(b){
				document.getElementById("table").innerHTML = b;
			}
		});
	}
</script>

<table id="table">
    <tr>
        <td>
		<span>
            <input type="text" id="search"/>
            <input type="button" name="search" value="Поиск" onclick="search()"/>
        </span>
		</td>
		<td>
			<a href="downloadexcel1.php">Excel</a>
		</td>
    </tr>
	



<tr> 
<th><?php echo "№"; ?><br></th>
<th><?php echo "Наименование"; ?><br></th>
<th><?php echo "Автор"; ?><br></th>
<th><?php echo "Год"; ?><br></th>
<th><?php echo "Тип работы"; ?><br></th>
<th><?php echo "Период"; ?><br></th>
<th><?php echo "Материал"; ?><br></th>
<th><?php echo "Описание"; ?><br></th>
</tr>

<?php> 
$string_query=mysql_query("SELECT * FROM exibit, period WHERE exibit.id_p_e=period.id_p");

if (mysql_num_rows($string_query)){
while ($line=mysql_fetch_assoc($string_query)){ ?>
	<tr> 
		<td><?php echo $line["id_e"]; ?><br></td>
		<td><span class="edit name <?php echo $line["id_e"]; ?>"><?php echo $line["name"]; ?></span></td>
		<td><span class="edit author <?php echo $line["id_e"]; ?>"><?php echo $line["author"]; ?></span></td>
		<td><span class="edit year <?php echo $line["id_e"]; ?>"><?php echo $line["year"]; ?></span></td>
		<td><span class="edit type <?php echo $line["id_e"]; ?>"><?php echo $line["type"]; ?></span></td>
		<td><span class="edit id_p_e <?php echo $line["id_e"]; ?>"><?php echo $line["id_p_e"]; ?></span></td>
		<td><span class="edit material <?php echo $line["id_e"]; ?>"><?php echo $line["material"]; ?></span></td>
		<td><span class="edit id_a_e <?php echo $line["id_e"]; ?>"><?php echo $line["id_a_e"]; ?></span></td>
	</tr>
<?php }}
?>
</table>

<br>

</tr>
		<td>
			Структура таблицы "Exibit"
		</td>
		
	</tr>


<br>

<!--////////////////////////////////-->
<table>
<tr> 
<th><?php echo "Номер"; ?><br></th>
<th><?php echo "Название поля"; ?><br></th>
<th><?php echo "Тип поля"; ?><br></th>
<th><?php echo "Null"; ?><br></th>
<th><?php echo "Key"; ?><br></th>
<th><?php echo "По умолчанию"; ?><br></th>
<th><?php echo "Инкремент"; ?><br></th>
<th><?php echo "Описание"; ?><br></th>
</tr>
<?php> 
$string_query=mysql_query("SHOW FULL COLUMNS FROM exibit");
$i=1;
if (mysql_num_rows($string_query)){
while ($line=mysql_fetch_assoc($string_query)){ ?>
<tr> 
<td><?php echo $i; ?><br></td>
<td><?php echo $line['Field']; ?><br></td>
<td><?php echo $line['Type']; ?><br></td>
<td><?php echo $line['Null']; ?><br></td>
<td><?php echo $line['Key']; ?><br></td>
<td><?php echo $line['Default']; ?><br></td>
<td><?php echo $line['Extra']; ?><br></td>
<td><?php echo $line['Comment']; ?><br></td>
</tr>
<?php $i++; }}
?>
</table>
</br>
<!--////////////////////////////////-->


<br>



<table>
<?php
require_once('connection1.php');
$period=$_GET["period"];
if ($_POST){
    $field = $_POST['field'];
    $id = $_POST['id'];
    $value = $_POST['value'];
    $query1 = mysql_query("UPDATE exibit, period SET $field = '$value' WHERE (id_e = '".$id."' AND id_p_e = '".$id."')");
}
?> 
<tr> 
<th><?php echo "№"; ?><br></th>
<th><?php echo "Период (эпоха)"; ?><br></th>
</tr>

<?php> 
$string_query=mysql_query("SELECT * FROM period");

if (mysql_num_rows($string_query)){
while ($line=mysql_fetch_assoc($string_query)){ ?>
	<tr> 
		<td><?php echo $line["id_p"]; ?><br></td>
		<td><span class="edit name <?php echo $line["id_p"]; ?>"><?php echo $line["period"]; ?></span></td>
	</tr>
<?php }}
?>
</table>

<br>

</tr>
		<td>
			Структура таблицы "Period"
		</td>
		
	</tr>


<br>

<!--////////////////////////////////-->
<table>
<tr> 
<th><?php echo "Номер"; ?><br></th>
<th><?php echo "Название поля"; ?><br></th>
<th><?php echo "Тип поля"; ?><br></th>
<th><?php echo "Null"; ?><br></th>
<th><?php echo "Key"; ?><br></th>
<th><?php echo "По умолчанию"; ?><br></th>
<th><?php echo "Инкремент"; ?><br></th>
<th><?php echo "Описание"; ?><br></th>
</tr>
<?php> 
$string_query=mysql_query("SHOW FULL COLUMNS FROM period");
$i=1;
if (mysql_num_rows($string_query)){
while ($line=mysql_fetch_assoc($string_query)){ ?>
<tr> 
<td><?php echo $i; ?><br></td>
<td><?php echo $line['Field']; ?><br></td>
<td><?php echo $line['Type']; ?><br></td>
<td><?php echo $line['Null']; ?><br></td>
<td><?php echo $line['Key']; ?><br></td>
<td><?php echo $line['Default']; ?><br></td>
<td><?php echo $line['Extra']; ?><br></td>
<td><?php echo $line['Comment']; ?><br></td>
</tr>
<?php $i++; }}
?>
</table>
</br>
<!--////////////////////////////////-->



<br>



<table>
<?php
require_once('connection1.php');
$about=$_GET["about"];
if ($_POST){
    $field = $_POST['field'];
    $id = $_POST['id'];
    $value = $_POST['value'];
    $query1 = mysql_query("UPDATE exibit, about SET $field = '$value' WHERE (id_e = '".$id."' AND id_p_a = '".$id."')");
}
?> 
<tr> 
<th><?php echo "№"; ?><br></th>
<th><?php echo "Описание работы"; ?><br></th>
</tr>

<?php> 
$string_query=mysql_query("SELECT * FROM exibit, about WHERE exibit.id_a_e=about.id_a");

if (mysql_num_rows($string_query)){
while ($line=mysql_fetch_assoc($string_query)){ ?>
	<tr> 
		<td><?php echo $line["id_a"]; ?><br></td>
		<td><span class="edit name <?php echo $line["id_a"]; ?>"><?php echo $line["about"]; ?></span></td>
		
	</tr>
<?php }}
?>
</table>

<br>

</tr>
		<td>
			Структура таблицы "About"
		</td>
		
	</tr>


<br>

<!--////////////////////////////////-->
<table>
<tr> 
<th><?php echo "Номер"; ?><br></th>
<th><?php echo "Название поля"; ?><br></th>
<th><?php echo "Тип поля"; ?><br></th>
<th><?php echo "Null"; ?><br></th>
<th><?php echo "Key"; ?><br></th>
<th><?php echo "По умолчанию"; ?><br></th>
<th><?php echo "Инкремент"; ?><br></th>
<th><?php echo "Описание"; ?><br></th>
</tr>
<?php> 
$string_query=mysql_query("SHOW FULL COLUMNS FROM about");
$i=1;
if (mysql_num_rows($string_query)){
while ($line=mysql_fetch_assoc($string_query)){ ?>
<tr> 
<td><?php echo $i; ?><br></td>
<td><?php echo $line['Field']; ?><br></td>
<td><?php echo $line['Type']; ?><br></td>
<td><?php echo $line['Null']; ?><br></td>
<td><?php echo $line['Key']; ?><br></td>
<td><?php echo $line['Default']; ?><br></td>
<td><?php echo $line['Extra']; ?><br></td>
<td><?php echo $line['Comment']; ?><br></td>
</tr>
<?php $i++; }}
?>
</table>
</body>
<script>
function sendGET(){
var exibit=document.getElementById("input1").value;

$.ajax({
	url:"search1.php",
    type:"POST",
	data:"search="+exibit,
	beforeSend: function(){
		document.getElementById("table").innerHTML="<img src=img2.gif>"},
	success:function(msg){
	document.getElementById("table").innerHTML = msg}
})

}

$(function(){
    $('span.edit').click(function(e)	{
        var arr = $(this).attr('class').split( " " );
        //ловим элемент, по которому кликнули
        var t = e.target || e.srcElement;
        //получаем название тега
        var elm_name = t.tagName.toLowerCase();
        //если это инпут - ничего не делаем
        //if(elm_name == 'input')	{return false;}
		if(elm_name == 'textarea')	{return false;}
        var val = $(this).html();
        //var code = '<input type="text" id="edit" size="'+ $(this).text().length+'" value="'+val+'" />';
		var code = '<textarea oninput="validateComments(this)" spellcheck="false" id="edit">'+val+'</textarea>';
        $(this).empty().append(code);
        $('#edit').focus();
        $('#edit').blur(function()	{
            var val = $(this).val(); //получаем то, что в поле находится
            //находим ячейку, опустошаем, вставляем значение из поля
            $(this).parent().empty().html(val);
            //берем данные и отправляем в функцию
		//alert(val+arr[2]+arr[1]);
            saveAjax(val,arr[2],arr[1]);
        });
    });
});
$(function(){
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            $('#edit').blur();
        }
    });
});

function saveAjax(value,id,field){
    $.ajax({
        type: "POST",
        url:"index1.php",
        data: "value="+value+"&id="+id+"&field="+field,
        success: function(data){
            console.log(data);
        }});
}
</script>
