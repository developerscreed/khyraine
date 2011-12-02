<?php
	session_start();
	require('../../lib/config.php');
	require('../../lib/users.class.php');
	$seuser = new users;
	global $jlib;

				if($jlib->jpost('saveavatar')){
					$seuser->profile_upload_photos("../../upload");
				}
				echo "test lang";
?>
<h3>Wall</h3>
<form method="post" enctype="multipart/form-data">
<table>
	<tr>
		<td>
			Avatar
		</td>
		<td>
			<input type="file" name="uploadedfile" id="uploadedfile" />
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" value="save" name="saveavatar" id="saveavatar" />
		</td>
	</tr>
</table>
</form>



<div class="demo ui-widget ui-helper-clearfix">
	<ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">
		<?php
			$users_accountid = $jlib->setSession('user_id');
			$allusers = $seuser->select_all_customer($users_accountid);
			foreach($allusers as $theusers):
				if($theusers !==""){
		?>		
				<li class="ui-widget-content ui-corner-tr">
					<h5 class="ui-widget-header">
					<?php echo $theusers['reg_user'];?></h5>
					<img src="img/bc.jpeg"  alt="I'm <?php echo $theusers['reg_user'];?>" width="96" height="72" dateid="<?php echo $theusers['reg_id'];?>" />
					<!-- <a href="img/profile.jpg" title="View larger image" class="ui-icon ui-icon-zoomin">View larger</a> -->
					<a href="javascript:void(0);" class="ui-icon ui-icon-trash">Add to date</a>
				</li>
		<?php
				}
			endforeach;
		?>
	</ul>
	<div id="trash" >
					<h4 class="ui-widget-header"><span class="ui-icon ui-icon-trash">Add to Date</span></h4>
			</div>


</div><!-- End demo -->
<div class="clear"></div>
<div class="right">
	<a href="javascript:void(0);" id="savedates">Save this Dates</a>
</div>

<script type="text/javascript">
jQuery(function(){
		var $gallery = $( "#gallery" ),
			$trash = $( "#trash" );

		// let the gallery items be draggable
		jQuery( "li", $gallery ).draggable({
			cancel: "a.ui-icon", // clicking an icon won't initiate dragging
			revert: "invalid", // when not dropped, the item will revert back to its initial position
			containment: $( "#demo-frame" ).length ? "#demo-frame" : "document", // stick to demo-frame if present
			helper: "clone",
			cursor: "move"
		});

		// let the trash be droppable, accepting the gallery items
		$trash.droppable({
			accept: "#gallery > li",
			activeClass: "ui-state-highlight",
			drop: function( event, ui ) {
				deleteImage( ui.draggable );
					var $idsecure = ui.draggable.find("img").attr("dateid");
						jQuery.post("ajax/ajax.aspx",{core:"addtolist",her_or_his_id:$idsecure},function(xml){
					});
			}
		});

		// let the gallery be droppable as well, accepting items from the trash
		$gallery.droppable({
			accept: "#trash li",
			activeClass: "custom-state-active",
			drop: function( event, ui ) {
				recycleImage( ui.draggable );
				var $idsecure	= ui.draggable.find("img").attr("dateid");
					jQuery.post("ajax/ajax.aspx",{core:"deletetolist",her_or_his_id:$idsecure});
			}
		});

		// image deletion function
		var recycle_icon = "<a href='javascript:void(0);' title='Removing to date' class='ui-icon ui-icon-refresh'>Remove to date</a>";
		function deleteImage( $item ) {
			$item.fadeOut(function() {
				var $list = $( "ul", $trash ).length ?
					$( "ul", $trash ) :
					$( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );

				$item.find( "a.ui-icon-trash" ).remove();
				
				$item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
					$item
						.animate({ width: "48px" })
						.find( "img" )
							.animate({ height: "36px" });
				});
			});
		}

		// image recycle function
		var trash_icon = "<a href='link/to/trash/script/when/we/have/js/off' title='Delete this image' class='ui-icon ui-icon-trash'>Add to date</a>";
		function recycleImage( $item ) {
			$item.fadeOut(function() {
				$item
					.find( "a.ui-icon-refresh" )
						.remove()
					.end()
					.css( "width", "96px")
					.append( trash_icon )
					.find( "img" )
						.css( "height", "72px" )
					.end()
					.appendTo( $gallery )
					.fadeIn();
			});
		}

		// image preview function, demonstrating the ui.dialog used as a modal window
		function viewLargerImage( $link ) {
			var src = $link.attr( "href" ),
				title = $link.siblings( "img" ).attr( "alt" ),
				$modal = $( "img[src$='" + src + "']" );

			if ( $modal.length ) {
				$modal.dialog( "open" );
			} else {
				var img = $( "<img alt='" + title + "' width='384' height='288' style='display: none; padding: 8px;' />" )
					.attr( "src", src ).appendTo( "body" );
				setTimeout(function() {
					img.dialog({
						title: title,
						width: 400,
						modal: true
					});
				}, 1 );
			}
		}

		// resolve the icons behavior with event delegation
		jQuery( "ul.gallery > li" ).live("click",function( event ) {
				var $item = jQuery( this ),
				$target = jQuery( event.target );
					if ( $target.is( "a.ui-icon-trash" ) ) {
						deleteImage( $item );
					} else if ( $target.is( "a.ui-icon-zoomin" ) ) {
					//	viewLargerImage( $target );
					} else if ( $target.is( "a.ui-icon-refresh" ) ) {
						//recycleImage( $item );
					}
					return false;
		});
		
});
</script>