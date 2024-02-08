<?php session_start(); ?>
<h1>Hospital Home,Welcome <?= $userName ?></h1>

<?php if (!isset($_SESSION['fileIsSet'])) : ?>
    <form action="/uploadFile" method="post" enctype="multipart/form-data">
        File: <input type="file" name="file">
        <input type="submit" value="Send">
    </form>
<?php else : ?>
    <h4>File Uploaded Successfully</h4>
<?php endif; ?>

<br>
<a href="/hospital/doctor">Doctors</a>
<br>
<a href="/hospital/addDoctor">Add Doctor</a>