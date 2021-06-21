<?php 

$to = 'baranzengeralp@gmail.com'; 

$subject = 'Guidelines to be followed for COVID19'; 

$random_hash = md5(date('r', time())); 

$headers = "From: World Health Organization <phedoc@who.int>"; 

$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 

$attachment = chunk_split(base64_encode(file_get_contents('Guidelines.txt'))); 

ob_start();
?> 
--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

Guidelines to be followed for COVID19

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit


<p>Hello,<br><br> Hope you are doing well. I beleive you are aware of global situation due to COVID19.</p><br>I would like to request you to follow our following guidelines to fight agaist COVID19: </p><br><b>1. Avoid contact with someone who shows symptoms of possible COVID-19 - anyone having a cold or cough or fever.</b><br><b>2. Avoid non-essential travel and use of public transport.</b><br><b>3. Avoid public places, crowds and large family get togethers. Keep in touch with friends and relatives using phone, internet, and social media.</b><br><b>4. Avoid routine visits to hospitals / Labs. for minor problems, contact hospital or HF clinic by phone or helpline number if possible. If you are regularly checking INR and adjusting blood thinning medicines, please contact the doctor over phone if possible and try and avoid a hospital as much as possible.</b><br><b>5. Avoid handshakes and touching face with hands </b><br><b>6. Wash your hands with soap and water frequently – do this for at least 20-30 seconds and systematically to clean all parts of the hand</b><br><b>7. Alcohol based hand-sanitisers are also useful</b><br><b>8. Avoid touching possibly contaminated areas/objects – Public toilet doors, door handles etc. </b><br><br><b><p style="background-color:Tomato;">Apart from all, Please be @HOME during this lockdown period. Otherwise police will take necessary action.</b></p><p>Regards,<br><br>Public Health and Environment Department (PHE)<br>World Health Organization<br>20 Avenue Appia<br>1211 Geneva 27<br>Switzerland<br>Fax No.: +41 22 791 13 83 Attention: Healthy Settings<br>E-mail: phedoc@who.int

--PHP-alt-<?php echo $random_hash; ?>-- 

--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: application/zip; name="Guidelines.txt"  
Content-Transfer-Encoding: base64  
Content-Disposition: attachment  

<?php echo $attachment; ?> 
--PHP-mixed-<?php echo $random_hash; ?>-- 

<?php 
$message = ob_get_clean(); 
 
$mail_sent = mail( $to, $subject, $message, $headers ); 

echo $mail_sent ? "Mail sent" : "Mail failed"; 
?>
