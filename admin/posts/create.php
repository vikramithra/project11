
<?php
session_start();
if (!isset($_SESSION["user_details"]) || !$_SESSION["user_details"]["admin"]) {
	header("Location: /");
	die();
}


include(__DIR__.'/../../controllers/products/posts.php'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!--fONT Awesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

	<!--goggle fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Merriweather&display=swap" rel="stylesheet">

	<!--style,css-->
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

	<link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">

	<title>Admin Section - Add Posts</title>

	<!--
                             ,
                             B
                            BMB.
                          3BBBMBX
                       .PMBMBMBMBBD,
                     7MBMBMBMBMBMBMBMs
                  :EBMBMBMBMx iMBMBMBMBO:
                7BMBMBBBMBJ     vBBBBBMBMBs
              xMBMBBBMBH,    .    .UBMBMBMBBF
 .          .BMBBBMBX:      :Br      .FBMBMBBB:
 LR;,.:rUOBMBMBMBM;       ;MBMBBr       :OBMBMBBBRSr:.,:EU
  MBMBMBBBMBMBMM.      :0BMBBEMBMBD:       WMBBBMBMBMBMBM
  HMB.::.  BBMc     .HBMBMBK   FBBBMBZ,     ;BBB  .::.BBM
  MBM      UMP    .BMBMBZ:       ,HBMBMB:    LBM      MBM
  BBB   BMBMBr   cBMBW:     0BM     .0BMBF   .BMBMB   BMB:
 WBBx   cBL.iB   BMR     cMBM1MBM3     PMB   M7,;BK   ;BMB
 MBM    BM:  .J  BB    RBMB;   :RMBM    RM  c:   MB    MBM
:BM7    BB     , ,M   MBr         ;BM   Or .     BM:   :MBi
:MB,   7B7        .i  B             B  ::        :BS    BM
 BMG    BK             :           .,            cM:   2MB
  BMH   .Mi     : :                 E:          :M:   sMB
   ;MRui  ;:.   :Fui:;  :;;7i   .;;;rS:,  rr   ,:  :7EO:
        ::::::,   .UUi:77;::37s7Lv7;  ,;3SD,....:;;,
     BM: ..:i7rJLxS:  .      rs: 7   ..;LxxUWRFU;::7OW
      S2r:::iis0r;J3Or.:rvLi:::rBL.  .:;,  .   :ri:.,
                    .ZL. .:L;,r7;i7r;7:
                            xMc     ,
                           :. 3v
                           :S  ;
                            LB;
                             7
-->
</head>
<body>
	
	<?php include("../../views/forms/adminHeader.php"); ?>


	<div class="admin-wrapper">

		<?php include("../../views/forms/adminSidebar.php"); ?>
		
		<div class="admin-content">
			<div class="button-group">
				<a href="create.php" class="btn btn-big">Add Post</a>
				<a href="index.php" class="btn btn-big">Manage Post</a>
			</div>

			<div class="content">
				<h2 class="page-title">Add Posts</h2>

				<?php include('../../helpers/formErrors.php'); ?>

				<form action="create.php" enctype="multipart/form-data" method="post" class="text-input">
					<div>
						<label>Title</label>
						<input type="text" name="title" value="<?php $title ?>" class="text-input">
					</div>	
					<div>
						<label>Body</label>
						<textarea name="body" id="body"><?php $body ?></textarea>
					</div>
					<div>
						<label>Image</label>
						<input type="file" name="image" class="text-input">
					</div>
					<div>
						<label>Topic</label>
						<select name="topic_id" class="text-input">
							<option value=""></option>
							<?php foreach ($topics as $key => $topic): ?>
								<?php if (!empty($topic_id) && $topic_id = $topic['id']): ?>
									<option selected=""> value="<?php echo $topics['id'] ?>"><?php echo $topic['name'] ?></option>
								<?php else: ?>
									<option selected=""> value="<?php echo $topics['id'] ?>"><?php echo $topic['name'] ?></option>
								<?php endif; ?>

							<?php endforeach; ?>	

							<option value="Life Lessons">Life Lessons</option>
						</select>
					</div>
					
					<div>
						<button type="submit" name="action" value="add-post" class="btn btn-big">Add Post</button>
					</div>
				</form>
			</div>
		</div>

	</div>






	<!--JQuery-->
	<script src="https://cndjs.cloudflare.com/ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>				

	<!-- ckeditor -->
	<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

	<!--Custom Script-->
	<script type="../../js/script.js"></script>
</body>
</html>