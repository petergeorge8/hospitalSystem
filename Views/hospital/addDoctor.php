<form action="/hospital/addDoctor" method="post">
    <label for="doctorName">doctor Name:</label>
    <input type="text" name="doctorName" id="doctorName">
    <label for="specId">Spec ID:</label>
    <input type="text" name="specId" id="specId">
    <input type="submit" value="send">
</form>
<a href="/">home</a>

<?php

if (isset($doctorId) && $doctorId > 0) {
    echo "doctor added successfully";
} else if (isset($doctorId) && $doctorId == -1) {
    echo "doctor not added";
}
