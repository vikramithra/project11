
<?php 
	session_start();
	if (!isset($_SESSION["user_details"]) || !$_SESSION["user_details"]["admin"]) {
		header("Location: /");
		die();
	}




include (__DIR__.'/../../controllers/products/posts.php'); 

$query = "SELECT * FROM posts";
$stmt = $conn -> stmt_init();
if (!$stmt -> prepare($query)) {
	echo "error";
	die();
}
$stmt->execute();
$posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
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

	<title>Admin Section - Manage Posts</title>

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
				<h2 class="page-title">Manage Posts</h2>

				<?php include("../../views/partials/messages.php"); ?>

				<table>
					<thead>
						<th>SN</th>
						<th>Title</th>
						<th>Author</th>
						<th colspan="3">Action</th>
					</thead>
					<tbody>

						<?php foreach ($posts as $key => $post): ?>

							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $post['title'] ?></td>
								<td>Awa</td>
								<td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
								<td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
					
								

								
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>




	<!--JQuery-->
	<script src="https://cndjs.cloudflare.com/ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>				

	<!--Custom Script-->
	<script type="../../js/script.js"></script>
</body>
</html>