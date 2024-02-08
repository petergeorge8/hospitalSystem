welcome
<table border="1">
    <thead>
        <tr>
            <td>id</td>
            <td>Name</td>
            <td>specId</td>
        </tr>
    </thead>
    <?php
    foreach ($doctors as $doctor) :
    ?>
        <tr>
            <td><?= $doctor['id'] ?></td>
            <td><?= $doctor['name'] ?></td>
            <td><?= $doctor['spec'] ?></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
to add new doctor <a href="/hospital/addDoctor">click here</a>
<br>
<a href="/">home</a>