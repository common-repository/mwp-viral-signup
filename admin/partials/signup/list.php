<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
  <h2><?php esc_attr_e("Viral Signups", "wow-marketings") ?></h2> 
  <table>
    <thead>
      <tr>
        <th><u><?php esc_attr_e("ID", "wow-marketings") ?></u></th>
        <th><u><?php esc_attr_e("Shortcode", "wow-marketings") ?></u></th>
        <th><u><?php esc_attr_e("Name", "wow-marketings") ?></u></th>
        <th></th>
        <th></th>
		<th></th>
      </tr>
    </thead>
    <tbody>
     <?php
           if ($resultat) {
			   $i = 0;
			   foreach ($resultat as $key => $value) {				   
				   $id = $value->id;
				   $title = $value->title;                 
                ?>
      <tr>
	    <td><?php echo "$id"; ?></td>
        <td><?php echo "[Wow-Viral-Signups id=$id]"; ?></td>
        <td><?php echo $title; ?></td>        
        <td><u><a href="admin.php?page=wow-signup-free&wow=add&act=update&id=<?php echo $id; ?>"><?php esc_attr_e("Edit", "wow-marketings") ?></a></u></td>
		<td></td>
		<td><?php if($count<2){; ?><u><a href="admin.php?page=wow-signup-free&wow=add&act=duplicate&id=<?php echo $id; ?>"><?php esc_attr_e("Duplicate", "wow-marketings") ?></a></u><?php } ?></td>        
      </tr>
      <?php
            $i++;
			if($i>1) break;
			}
        } else {
            ?>
      <tr>
        <td><?php esc_attr_e("No Record Found!", "wow-marketings") ?></td>
      <tr>
        <?php } ?>
    </tbody>
  </table>