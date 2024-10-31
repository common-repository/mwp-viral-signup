<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery('#datalist').DataTable();
});
</script>
  <table id="datalist">
    <thead>
      <tr>
        <th><u><?php esc_attr_e("Order", "wow-marketings") ?></u></th>        
        <th><u><?php esc_attr_e("E-mail", "wow-marketings") ?></u></th>
        <th><u><?php esc_attr_e("Refferals", "wow-marketings") ?></u></th> 
		<th><u><?php esc_attr_e("Trigger", "wow-marketings") ?></u></th>
		<th><u><?php esc_attr_e("Form name", "wow-marketings") ?></u></th>
      </tr>
    </thead>
    <tbody>
     <?php
           if ($resultat) {
			   $i = 0;
			   foreach ($resultat as $key => $val) {
				   $arr_mails = unserialize($val->mails);
				   $referrals = $val->referrals;
				   $title = $val->title;
				   if (is_array($arr_mails)){
					   foreach ($arr_mails as $key => $value){
						   if ($value < $referrals){
							   $target = 'Signed';
							   }
							if ($value > $referrals - 1){
								$target = 'Goal completed';
							}
							   $i++;							   
							   if($i>50) break;
							   $email = $key;
							   $goal = $value;
							   
                ?>
      <tr>
	    <td><?php echo "$i"; ?></td>        
        <td><?php echo $email; ?></td>
        <td><?php echo $goal; ?></td> 
		<td><?php echo $target; ?></td>
		<td><?php echo $title; ?></td>
      </tr>
      <?php
			
		   } } } }
		else 
            ?>      
    </tbody>
  </table>
