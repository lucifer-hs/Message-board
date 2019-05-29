<?php  
echo '<select id="">';
for ($i=1949;$i<=2014;$i++) {
    echo '<option value="'.$i.'" >'.$i.'</option> ';
}
echo '</select>';
echo '<select id="">';
for ($i=1;$i<12;$i++) {
    echo ';<option value="'.$i.'" >'.$i.'</option>;';
}
echo '</select>';
echo '<select id="">';
for ($i=1;$i<31;$i++) {
    echo '<option value="'.$i.'" >'.$i.'</option>';
}
echo '</select>';
