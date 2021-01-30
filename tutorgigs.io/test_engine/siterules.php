<?php    //header   require_once 'includes/header.php';     // Tally up totals  $ruleResult = mysqli_query($connection, "SELECT * FROM siteRules"); ?>					<!--begin::Content-->					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">						<!--begin::Subheader-->						<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">								<!--begin::Info-->																<!--end::Info-->								<!--begin::Toolbar-->																<!--end::Toolbar-->							</div>						</div>						<!--end::Subheader-->						<!--begin::Entry-->						<div class="d-flex flex-column-fluid">							<!--begin::Container-->							<div class="container">								<!--begin::Notice-->                                                                								<!--begin::Card-->								<div class="card card-custom">									<div class="card-header flex-wrap py-5">										<div class="card-title">											<h3 class="card-label">Site Rules											<div class="text-muted pt-2 font-size-sm">Settings</div></h3>										</div>																			</div>									<div class="card-body">                                                                            <?php                                                                            if(isset($_SESSION['success'])) { ?>                                                                            <div class="alert alert-success" role="alert" style="text-align:center"><?php echo $_SESSION['success'];?></div>                                                                            <?php unset($_SESSION['success']); } ?>                                                                             <?php                                                                            if(isset($_SESSION['error'])) { ?>                                                                            <div class="alert alert-danger" role="alert" style="text-align:center"><?php echo $_SESSION['error'];?></div>                                                                            <?php unset($_SESSION['error']); } ?>										<!--begin: Datatable-->										<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">											<thead>											       <tr>                                                                                                                                                    <th>Rule Name</th>                                                                                                    <th>Value</th>                                                                                                    <th>Notes</th>                                                                                                    <th>Actions</th>                                                                                                                                                                       </tr>  											</thead>											<tbody>                                                                                            <?php	                                                                                                     while ( $row = mysqli_fetch_array($ruleResult) ) {                                                                                                                                                                                                               $rowColor = (string)$row['IsActive'] == 1 ? '' : 'danger';                                                                                              ?>												<tr id="r<?php echo $row['ID'] ?>" class="<?php echo $rowColor;  ?>">													<td class="Rule"><?php echo $row['Rule'] ?></td>                                                                                                        <td class="Value"><?php echo $row['Value'] ?></td>                                                                                                        <td class="Notes"><?php echo $row['Notes'] ?></td>																																							<td nowrap="nowrap">                                                                                                                                                                                                                      <a href="javascript:;" title="Edit the test" class="btn btn-sm btn-clean btn-icon"  title="Edit" onClick="editRule(<? echo $row['ID'] ?>)">                                                                                                                <i class="la la-edit text-success" style="font-size: 20px"></i>							                                                                                                            </a>							                                                                                                            						                                                                                                        </td>												</tr>                                                                                                                                                                                                    <?php } ?>																							</tbody>										</table>										<!--end: Datatable-->									</div>								</div>								<!--end::Card-->							</div>							<!--end::Container-->						</div>						<!--end::Entry-->					</div>                                                                                 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeDefault" aria-hidden="true">				             <div class="modal-dialog modal-dialog-centered" role="document">						<div class="modal-content">                    <form id="rForm" name="rForm" role="form" action="<?php echo BASE_URL;?>editRule.php" method="post">                              <input type="hidden" id="rID" name="rID" value="" >                                                  <div class="modal-header">						  <h5 class="modal-title" id="exampleModalLabel">Edit Rule</h5>						   <button type="button" class="close" data-dismiss="modal" aria-label="Close">						      <i aria-hidden="true" class="ki ki-close"></i>						  </button>						</div>                    <div class="modal-body">                                        	<div class="container" style="max-width:500px">                                                            	<!-- Text input-->                                <div class="control-group">                                  <label class="control-label" for="rRule">Rule Name</label>                                  <div class="controls">                                    <input id="rRule" name="rRule" type="text" placeholder="" class="form-control" required>                                                                      </div>                                </div>                                <br/>                                                                     <!-- Text input-->                                <div class="control-group">                                  <label class="control-label" for="rValue">Value</label>                                  <div class="controls">                                    <input id="rValue" name="rValue" type="text" pattern="\d*" placeholder="" class="form-control" required>                                                                      </div>                                </div>                                <br/>                                                                   <!-- Text input-->                                <div class="control-group">                                  <label class="control-label" for="rNotes">Notes</label>                                  <div class="controls">                                    <textarea id="rNotes" name="rNotes" type="" placeholder="" class="form-control" required>                                    </textarea>                                  </div>                                </div>                                <br/>                                                                                                                     </div>                                           </div>                                        <div class="modal-footer">						<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>						<button type="submit" class="btn btn-primary font-weight-bold">Submit</button>					       </div>                  </form>                </div>                <!-- /.modal-content -->            </div>            <!-- /.modal-dialog -->        </div>        <!-- /.modal -->                                                                                         <?php    //header   require_once 'includes/footer.php';?><script type="text/javascript">                function editRule( rID ) {						// Select all td that belong to the table row id			//alert( $('td.Notes', '#r' + rID ).html() );			$("#rID").val(rID);			$("#rRule").val( $('td.Rule', '#r' + rID ).html() );			$("#rValue").val( $('td.Value', '#r' + rID ).html() );			$("#rNotes").html( $('td.Notes', '#r' + rID ).html() );												$("#myModal").modal('show');			        }				function isNumber (o) {			return ! isNaN (o-0);		}				/*$("#rValue").keyup(function(e) {			txtVal = $(this).val();			if( isNumber(txtVal) ) {				$(this).val( txtVal.substring(0,2) )			}		});*/                </script>                                        