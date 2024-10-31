<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
 <h2><?php esc_attr_e("Goal-completed", "wow-marketings") ?></h2>
  <table>
    <thead>
      <tr>
        <th><u><?php esc_attr_e("Order", "wow-marketings") ?></u></th>        
        <th><u><?php esc_attr_e("E-mail", "wow-marketings") ?></u></th>
        <th><u><?php esc_attr_e("Refferals", "wow-marketings") ?></u></th>        
      </tr>
    </thead>
    <tbody>
     <?php
           if ($resultat) {
			   $i = 1;
			   foreach ($resultat as $key => $val) {
				   $arr_mails = unserialize($val->mails);
				   $referrals = $val->referrals;				   
				   if (is_array($arr_mails)){
					   foreach ($arr_mails as $key => $value){
						   if ($value > $referrals - 1){
							   $email = $key;
							   $goal = $value;
                ?>
      <tr>
	    <td><?php echo "$i"; ?></td>        
        <td><?php echo $email; ?></td>
        <td><?php echo $goal; ?></td>              
      </tr>
      <?php
            $i++;
			if($i>50) break;
			}
		   } } } }
		else {
            ?>
      <tr>
        <td><?php esc_attr_e("No Emails!", "wow-marketings") ?></td>
      <tr>
        <?php } ?>
    </tbody>
  </table>
