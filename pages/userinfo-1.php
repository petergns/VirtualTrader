<!DOCTYPE html>
<html>
<head>
<title>VirtualTrader</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div class="reminder">Reminder : This layout is not final and is only used to display site functionality</div>
<div class="box">
<div class="logo"></div>
<div class="member">
    <div class="member-content">Welcome <b><?php echo $session['username']; ?></b> (<?php echo $userbalance; ?> $)<br>
    <br>
    <a href="?page=home">Home &gt;</a><br>
    <a href="?page=logout">Logout &gt;</a>
    </div>
</div>
<div class="content">
<h1>User Profile : <?php echo $username; ?></h1>
<?php
if(isset($auth->errormsg)) { echo "<span class=\"errormsg\">"; foreach ($auth->errormsg as $emsg) { echo "$emsg<br/>"; } echo "</span><br/>"; }
if(isset($auth->successmsg)) { echo "<span class=\"successmsg\">"; foreach ($auth->successmsg as $smsg) { echo "$smsg<br/>"; } echo "</span><br/>"; }  
if(isset($virtualtrader->errormsg)) { echo "<span class=\"errormsg\">"; foreach ($virtualtrader->errormsg as $vemsg) { echo "$vemsg<br/>"; } echo "</span><br/>"; }
if(isset($virtualtrader->successmsg)) { echo "<span class=\"successmsg\">"; foreach ($virtualtrader->successmsg as $vsmsg) { echo "$vsmsg<br/>"; } echo "</span><br/>"; }  
?>
Balance : <?php echo $balance; ?> $<br/><br/>
User shares :
<?php if($data = $virtualtrader->GetUserStocks($username))
{
?>
<table width="95%" border="0" cellspacing="3" cellpadding="3">
<tr>
	<td width="30%" height="50"><b>Stock Name :</b></td>
	<td width="15%"><b>Stock Code :</b></td>
	<td width="15%"><b>Previous Price :</b></td>
	<td width="20%"><b>Current Price :</b></td>
	<td width="7%"><b>Diff :</b></td>
	<td width="3%">&nbsp;</td>
</tr>
<?php foreach($data as $table)
{ ?>
<tr>
	<td><?php echo $table['name']; ?></td>
	<td><?php echo $table['code']; ?></td>
	<td><?php echo $table['p_price']; ?> $</td>
	<td><?php echo $table['c_price']; ?> $</td>
	<td><?php if($table['diff'] > 0) { echo "+"; } echo $table['diff']; ?></td>
	<td><a href="?page=stockinfo&code=<?php echo $table['code']; ?>"><img src="img/info.png" /></a></td>
</tr>
<?php } ?>
</table>
<?php } else { ?>
0 stocks in database !
<?php } ?>
</div>
</div>
</body>
</html>