<html>
<head></head>
<?php 
require_once('db_setup.php');
$sql="use jqi8";
$conn->query($sql);
?>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[name=mode]').change(function(){
            var i;
            var val = $(this).val();
            for (i=1; i <= 4; i++){
                $('#mode'+i).hide();
            }
            $('#mode'+val).show();
        });
    });
</script>
<center>
<h1 style="color:#0061AA;">Welcome, guest!</h1></center>
<h2> Please select query mode </h2>
<form>
    <input type="radio" name="mode" value="1"> Energy consumed by companies <br/>
    <input type="radio" name="mode" value="2"> Resources state owned <br/>
    <input type="radio" name="mode" value="3"> Energy produced by companies <br/>
    <input type="radio" name="mode" value="4"> States consume energy more than X <br/>
</form>

<hr><div style="background:url(../image/bg.png) no-repeat;background-size:100% 100%;; min-height: 80%; height: 70%"><br/>

<center><div id="mode1" style="display:none">
    <?php
        $sql="select distinct Cname from Company;";
        $result1=$conn->query($sql);
    ?>
    <form action="user_mode1.php" method="POST" style="color:#FFFFFF;">
        Company <select name="company">
            <?php while ($row=$result1->fetch_assoc()){?>
            <option value="<?php echo $row['Cname']; ?>"><?php echo $row['Cname']; ?></option>
            <?php } ?>
        </select><br/>
        that consumes
        <input type="radio" name="etype" value="All"> All
        <input type="radio" name="etype" value="Electricity"> Electricity
        <input type="radio" name="etype" value="Heat"> Heat <br/>
        from year <select name="start">
            <?php 
                $sql="select distinct Year from Consume order by Year;";
                $result1=$conn->query($sql);
                while ($row=$result1->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Year']; ?>"><?php echo $row['Year']; ?></option>
        <?php } ?></select>to year <select name="end">
            <?php 
                $sql="select distinct Year from Consume order by Year;";
                $result1=$conn->query($sql);
                while ($row=$result1->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Year']; ?>"><?php echo $row['Year']; ?></option>
        <?php } ?></select><br/>
        <input type="reset"> <input type="submit" value="Find it!">
    </form>
</div>

<div id="mode2" style="display:none">
    <form action="user_mode2.php" method="POST" style="color:#FFFFFF;">
        <?php 
            $sql="select Name from State;";
            $result2=$conn->query($sql);
        ?>
        State <select name="State">
            <?php while ($row=$result2->fetch_assoc()){?>
            <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
            <?php } ?>
        </select>
        <?php 
            $sql="select distinct Rname from Own;";
            $result2=$conn->query($sql);
        ?>
        who owns <select name="Resources">
            <?php while ($row=$result2->fetch_assoc()){?>
            <option value="<?php echo $row['Rname']; ?>"><?php echo $row['Rname']; ?></option>
            <?php } ?>
        </select> <br/>
        from year <select name="start">
            <?php 
                $sql="select distinct Year from Own order by Year;";
                $result1=$conn->query($sql);
                while ($row=$result1->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Year']; ?>"><?php echo $row['Year']; ?></option>
        <?php } ?></select>to year <select name="end">
            <?php 
                $sql="select distinct Year from Own order by Year;";
                $result1=$conn->query($sql);
                while ($row=$result1->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Year']; ?>"><?php echo $row['Year']; ?></option>
        <?php } ?></select><br/>
        <input type="reset"> <input type="submit" value="Find it!">
    </form>
</div>

<div id="mode3" style="display:none">
    <?php 
            $sql="select distinct Cname from Produce;";
            $result3=$conn->query($sql);
        ?>
    <form action="user_mode3.php" method="POST" style="color:#FFFFFF;">
        Energy Company <select name="company">
            <?php while ($row=$result3->fetch_assoc()){?>
            <option value="<?php echo $row['Cname']; ?>"><?php echo $row['Cname']; ?></option>
            <?php } ?>
        </select><br/>
        that produce
        <input type="radio" name="etype" value="Electricity"> Electricity
        <input type="radio" name="etype" value="Heat"> Heat <br/>
        from year <select name="start">
            <?php 
                $sql="select distinct Year from Produce order by Year;";
                $result1=$conn->query($sql);
                while ($row=$result1->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Year']; ?>"><?php echo $row['Year']; ?></option>
        <?php } ?></select>to year <select name="end">
            <?php 
                $sql="select distinct Year from Produce order by Year;";
                $result1=$conn->query($sql);
                while ($row=$result1->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Year']; ?>"><?php echo $row['Year']; ?></option>
        <?php } ?></select><br/>
        <input type="reset"> <input type="submit" value="Find it!">
    </form>
</div>

<div id="mode4" style="display:none">
    <form action="user_mode4.php" method="POST" style="color:#FFFFFF;">
        Consume more than <input type="text" name="amount">
        <select name="etype">
            <option value="Electricity" selected="selected"> Electricity </option>
            <option value="Heat"> Heat </option>
        </select> <br/>
        from year <select name="start">
            <?php 
                $sql="select distinct Year from Consume order by Year;";
                $result1=$conn->query($sql);
                while ($row=$result1->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Year']; ?>"><?php echo $row['Year']; ?></option>
        <?php } ?></select>to year <select name="end">
            <?php 
                $sql="select distinct Year from Consume order by Year;";
                $result1=$conn->query($sql);
                while ($row=$result1->fetch_assoc()){
            ?>
                <option value="<?php echo $row['Year']; ?>"><?php echo $row['Year']; ?></option>
        <?php } ?></select><br/>
        <input type="reset"> <input type="submit" value="Find it!">
    </form>
</div></center></div>
</body>
</html>