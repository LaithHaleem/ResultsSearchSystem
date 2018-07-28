			<div class="container wow pulse">
				<div class="card-header" style="background: <?php echo $data['average'] < 50 ? '#dc3545' : '#28a745'; ?>">
				<span>
					<i class="fas fa-search"></i>
					نتيجة البحث: <?php echo $data['search']; ?></span>
				</div>
				<div class="card-body">
					<div class="stInfos col-12">
						<span>
							<i class="fas fa-user-graduate"></i>
							الاسم: <?php echo $data['st_name']; ?></span>
						<span>
							<i class="fas fa-school"></i>
							المدرسة: <?php echo $data['school']; ?></span>
					</div>
					<div class="table">
						<div class="table-row table-header col">
							<div class="table-cell">الاسلامية</div>
							<div class="table-cell">العربية</div>
							<div class="table-cell">الانكليزية</div>
							<div class="table-cell"><?php
								if($data['lertype'] == 'bio') 
									echo 'الاحياء'; 
								elseif($data['lertype'] == 'app')
									echo 'الاقتصاد';
								else
									echo 'التاريخ';
							?></div>
							<div class="table-cell">الرياضيات</div>
							<div class="table-cell"><?php 
								echo $data['lertype'] == 'lit' ? 'الجغرافية' : 'الكيمياء';
							?></div>
							<div class="table-cell"><?php
								echo $data['lertype'] == 'lit' ? 'الاقتصاد' : 'الفيزياء';		
							?></div>
							<div class="table-cell">النتيجة</div>
							<div class="table-cell">المجموع</div>
							<div class="table-cell">المعدل</div>
						</div>
						<div class="table-row col">
						<?php
							$dataOutput = array_slice($data, 6);
							foreach ($dataOutput as $key => $val) {
						?>
							<div class="table-cell" style="<?php
								//Check If Table Cell Value Is Numeric
								if(preg_match('/^[%0-9.]+$/', $dataOutput[$key])) {
									//Check If Results Number Less Than 50 To Make Red
									if($dataOutput[$key] < 50)
										echo 'color: #dc3545';
									else
										echo 'color: #28a745';
								//Check If Table Cell Value Is Arabic Character
								} elseif(preg_match('/\p{Arabic}/u', $dataOutput[$key])) {
									//Check If Results Arabic Character Not Equal ناجح
									//Make It Red Or Green
									if($dataOutput[$key] != 'ناجح') 
										echo 'color: #dc3545';
									else
										echo 'color: #28a745';
								}
								?>"><?= $data[$key]; ?></div>
						<?php		
							}
						?>
						</div>
					</div>
				</div>
			</div>