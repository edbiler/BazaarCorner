<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: February 25, 2013, 8:49 am */ ?>
<?php if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
<div class="block<?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Phpfox ::getService('theme')->isInDnDMode()): ?> js_sortable<?php endif;  if (isset ( $this->_aVars['sCustomClassName'] )): ?> <?php echo $this->_aVars['sCustomClassName'];  endif; ?>"<?php if (isset ( $this->_aVars['sBlockBorderJsId'] )): ?> id="js_block_border_<?php echo $this->_aVars['sBlockBorderJsId']; ?>"<?php endif;  if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) && Phpfox ::getLib('module')->blockIsHidden('js_block_border_' . $this->_aVars['sBlockBorderJsId'] . '' )): ?> style="display:none;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['sHeader'] ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
		<div class="title <?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Phpfox ::getService('theme')->isInDnDMode()): ?>js_sortable_header<?php endif; ?>">		
<?php if (isset ( $this->_aVars['sBlockTitleBar'] )): ?>
<?php echo $this->_aVars['sBlockTitleBar']; ?>
<?php endif; ?>
<?php if (( isset ( $this->_aVars['aEditBar'] ) && Phpfox ::isUser())): ?>
			<div class="js_edit_header_bar">
				<a href="#" title="<?php echo Phpfox::getPhrase('core.edit_this_block'); ?>" onclick="$.ajaxCall('<?php echo $this->_aVars['aEditBar']['ajax_call']; ?>', 'block_id=<?php echo $this->_aVars['sBlockBorderJsId'];  if (isset ( $this->_aVars['aEditBar']['params'] )):  echo $this->_aVars['aEditBar']['params'];  endif; ?>'); return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_edit.png','alt' => '','class' => 'v_middle')); ?></a>				
			</div>
<?php endif; ?>
<?php if (true || isset ( $this->_aVars['sDeleteBlock'] )): ?>
			<div class="js_edit_header_bar js_edit_header_hover" style="display:none;">
<?php if (Phpfox ::getService('theme')->isInDnDMode()): ?>
					<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure', array('phpfox_squote' => true)); ?>')){
					$(this).parents('.block:first').remove(); $.ajaxCall('core.removeBlockDnD', 'sController=' + oParams['sController'] 
					+ '&amp;block_id=<?php if (isset ( $this->_aVars['sDeleteBlock'] )):  echo $this->_aVars['sDeleteBlock'];  else: ?> <?php echo $this->_aVars['sBlockBorderJsId'];  endif; ?>');} return false;"title="<?php echo Phpfox::getPhrase('core.remove_this_block'); ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_delete.png','alt' => '','class' => 'v_middle')); ?>
					</a>
<?php else: ?>
					<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure', array('phpfox_squote' => true)); ?>')) { $(this).parents('.block:first').remove();
					$.ajaxCall('core.hideBlock', 'sController=' + oParams['sController'] + '&amp;type_id=<?php if (isset ( $this->_aVars['sDeleteBlock'] )):  echo $this->_aVars['sDeleteBlock'];  else: ?> <?php echo $this->_aVars['sBlockBorderJsId'];  endif; ?>&amp;block_id=' + $(this).parents('.block:first').attr('id')); } return false;" title="<?php echo Phpfox::getPhrase('core.remove_this_block'); ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_delete.png','alt' => '','class' => 'v_middle')); ?>
					</a>				
<?php endif; ?>
			</div>
			
<?php endif; ?>
<?php if (empty ( $this->_aVars['sHeader'] )): ?>
<?php echo $this->_aVars['sBlockShowName']; ?>
<?php else: ?>
<?php echo $this->_aVars['sHeader']; ?>
<?php endif; ?>
              
                <!--  VIEW ALL !-->
<?php if (isset ( $this->_aVars['sLinkAll'] ) && ! isset ( $this->_aVars['aEditBar'] ) && ! isset ( $this->_aVars['sDeleteBlock'] )): ?>
                <a class="view_all_nav" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['sLinkAll']); ?>"><?php echo Phpfox::getPhrase('yousport.view_all'); ?> <?php echo $this->_aVars['blk']; ?></a>
<?php unset($this->_aVars['sLinkAll']); ?>
<?php endif; ?>
            <!--  END VIEW ALL !-->
		</div>
           
<?php endif; ?>
<?php if (isset ( $this->_aVars['aEditBar'] )): ?>
	<div id="js_edit_block_<?php echo $this->_aVars['sBlockBorderJsId']; ?>" class="edit_bar" style="display:none;"></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aMenu'] ) && count ( $this->_aVars['aMenu'] )): ?>
	<div class="menu">
	<ul>
<?php if (count((array)$this->_aVars['aMenu'])):  $this->_aPhpfoxVars['iteration']['content'] = 0;  foreach ((array) $this->_aVars['aMenu'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['content']++; ?>
 
		<li class="<?php if (count ( $this->_aVars['aMenu'] ) == $this->_aPhpfoxVars['iteration']['content']): ?> last<?php endif;  if ($this->_aPhpfoxVars['iteration']['content'] == 1): ?> first active<?php endif; ?>"><a href="<?php echo $this->_aVars['sLink']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a></li>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
	</div>
<?php unset($this->_aVars['aMenu']); ?>
<?php endif; ?>
	<div class="content"<?php if (isset ( $this->_aVars['sBlockJsId'] )): ?> id="js_block_content_<?php echo $this->_aVars['sBlockJsId']; ?>"<?php endif; ?>>
<?php endif; ?>
		<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 if ($this->_aVars['aInterestedListings'] !== NULL):  echo '
<style type="text/css">
    .view_content_listing
    {
        margin-bottom: 20px;
    }
    .view_content_listing .row_listing_image
    {
		float: left;
		overflow: hidden;
		width: 65px;
    }
    .view_content_listing .row_listing_image img
    {
        max-width: 100px;
        max-width: 60px;
        margin-right: 5px;
    }
    .view_more_link
    {
        background: url("';  echo $this->_aVars['corepath'];  echo 'module/advancedmarketplace/static/image/default/view_more.png") no-repeat center left;
        padding-left:13px;
        margin: 10px 0;
    }
    .view_more_link a
    {
        font-size: 13px;
    }

    .row_title_image_header_body .js_user_name_link_admin a,.user_profile_link_span a, .js_hover_title {
        color: #808080;
    }
</style>
'; ?>


<div class="viewed_listing">
<?php if (count((array)$this->_aVars['aInterestedListings'])):  foreach ((array) $this->_aVars['aInterestedListings'] as $this->_aVars['iKey'] => $this->_aVars['aInterestedListing']): ?>
	   <div class="view_content_listing">
	        <div class="row_listing_image">
				<a title="<?php echo Phpfox::getLib('phpfox.parse.output')->parse(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aListing']['title'])); ?>" href="<?php echo $this->_aVars['aInterestedListing']['url']; ?>"><?php if ($this->_aVars['aInterestedListing']['image_path'] != NULL): ?><img title="<?php echo $this->_aVars['aInterestedListing']['title']; ?>" src="<?php echo $this->_aVars['advancedmarketplace_url_image'] . PHPFOX::getService("advancedmarketplace")->proccessImageName($this->_aVars["aInterestedListing"]["image_path"], "_120"); ?>" max_width='120' max_height='120' /><?php else: ?><img title="<?php echo $this->_aVars['aListing']['title']; ?>" src="<?php echo $this->_aVars['corepath']; ?>module/advancedmarketplace/static/image/default/noimage.png" max-width='60' max-height='60' style="max-height: 60px; max-width: 60px; margin-right: 5px;" /><?php endif; ?></a>
	        </div>
	        <div class="row_title_info">
	            <a class="advlink" title="<?php echo Phpfox::getLib('phpfox.parse.output')->parse(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aInterestedListing']['title'])); ?>" href="<?php echo $this->_aVars['aInterestedListing']['url']; ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten($this->_aVars['aInterestedListing']['title'], 50, '...'), 25); ?></a>
	            <div class="advancedmarketplace_price_tag">
<?php if ($this->_aVars['aInterestedListing']['price'] == '0.00'): ?>
<?php echo Phpfox::getPhrase('advancedmarketplace.free'); ?>
<?php else: ?>
<?php echo Phpfox::getService('core.currency')->getSymbol($this->_aVars['aInterestedListing']['currency_id']);  echo number_format($this->_aVars['aInterestedListing']['price'], 2, ',', '.'); ?>
<?php endif; ?>
				</div>
	            <div class="detail_listing_info"><?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aInterestedListing']['time_stamp']); ?> <span>&middot;</span> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aInterestedListing']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aInterestedListing']['user_name'], ((empty($this->_aVars['aInterestedListing']['user_name']) && isset($this->_aVars['aInterestedListing']['profile_page_id'])) ? $this->_aVars['aInterestedListing']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten($this->_aVars['aInterestedListing']['full_name'], Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>'; ?> <span>&middot;</span> <a class="js_hover_title" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('advancedmarketplace', array('location' => $this->_aVars['aInterestedListing']['country_iso'])); ?>"><?php echo Phpfox::getService('core.country')->getCountry($this->_aVars['aInterestedListing']['country_iso']); ?><span class="js_hover_info"><?php if (! empty ( $this->_aVars['aInterestedListing']['city'] )): ?> <?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aInterestedListing']['city']); ?> &raquo; <?php endif;  if (! empty ( $this->_aVars['aInterestedListing']['country_child_id'] )): ?> <?php echo Phpfox::getService('core.country')->getChild($this->_aVars['aInterestedListing']['country_child_id']); ?> &raquo; <?php endif; ?> <?php echo Phpfox::getService('core.country')->getCountry($this->_aVars['aInterestedListing']['country_iso']); ?></span></a></div>
	        </div>
	    </div>
	    <div class="clear"></div>
<?php endforeach; endif; ?>
<?php if ($this->_aVars['bIsViewMore']): ?><div class="view_more_link"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('advancedmarketplace.search', array('interesting' => $this->_aVars['aListing']['listing_id'])); ?>" title="<?php echo Phpfox::getPhrase('advancedmarketplace.view_more'); ?>"><?php echo Phpfox::getPhrase('advancedmarketplace.view_more'); ?></a></div><?php endif; ?>
</div>
<?php endif; ?>

		
		
<?php if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
	</div>
<?php if (isset ( $this->_aVars['aFooter'] ) && count ( $this->_aVars['aFooter'] )): ?>
	<div class="bottom">
		<ul>
<?php if (count((array)$this->_aVars['aFooter'])):  $this->_aPhpfoxVars['iteration']['block'] = 0;  foreach ((array) $this->_aVars['aFooter'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['block']++; ?>

				<li id="js_block_bottom_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"<?php if ($this->_aPhpfoxVars['iteration']['block'] == 1): ?> class="first"<?php endif; ?>>
<?php if ($this->_aVars['sLink'] == '#'): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'ajax_image')); ?>
<?php endif; ?>
					<a href="<?php echo $this->_aVars['sLink']; ?>" id="js_block_bottom_link_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a>
				</li>
<?php endforeach; endif; ?>
		</ul>
	</div>
<?php endif; ?>
</div>
<?php unset($this->_aVars['sHeader'], $this->_aVars['sModule'], $this->_aVars['sComponent'], $this->_aVars['aFooter'], $this->_aVars['sBlockBorderJsId'], $this->_aVars['bBlockDisableSort'], $this->_aVars['bBlockCanMove'], $this->_aVars['aEditBar'], $this->_aVars['sDeleteBlock'], $this->_aVars['sBlockTitleBar'], $this->_aVars['sBlockJsId'], $this->_aVars['sCustomClassName']);  endif; ?>

<?php Phpfox::getBlock('ad.inner', array('sClass' => $this->_aVars['sClass'])); ?>
