<?php

while($row = mysqli_fetch_assoc($sql)){

    $output .= '
            <a href="chat.php?user_id='.$row['unique_id'].' ">
				<div>
					<img class="online-img" src="php/images/'. $row['img'] .'" alt="">
				</div>
				<div class="online-dot">
					<i class="fas fa-circle"></i>
				</div>
			</a>
    
    
    ';
} 





?>