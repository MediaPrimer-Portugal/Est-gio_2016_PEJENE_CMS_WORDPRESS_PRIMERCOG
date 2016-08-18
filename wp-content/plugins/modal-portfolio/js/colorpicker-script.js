(function($) {
	jQuery(document).ready(function ($) {    
		$('#modal_portfolio_colorOverlay').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_colorOverlay, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_colorOverlay').iris('hide');
			}
		});
		$('#modal_portfolio_colorOverlay').click(function (event) {
			$('#modal_portfolio_colorOverlay').iris('hide');
			$(this).iris('show');
		});
		/*-------------------------------------------*/
		$('#modal_portfolio_colorOverall').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_colorOverall, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_colorOverall').iris('hide');
			}
		});
		$('#modal_portfolio_colorOverall').click(function (event) {
			$('#modal_portfolio_colorOverall').iris('hide');
			$(this).iris('show');
		});
		/*-------------------------------------------*/
		$('#modal_portfolio_bgcolorOverall').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_bgcolorOverall, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_bgcolorOverall').iris('hide');
			}
		});
		$('#modal_portfolio_bgcolorOverall').click(function (event) {
			$('#modal_portfolio_bgcolorOverall').iris('hide');
			$(this).iris('show');
		});
		/*-------------------------------------------*/
		$('#modal_portfolio_bgcolorLinkFilter').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_bgcolorLinkFilter, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_bgcolorLinkFilter').iris('hide');
			}
		});
		$('#modal_portfolio_bgcolorLinkFilter').click(function (event) {
			$('#modal_portfolio_bgcolorLinkFilter').iris('hide');
			$(this).iris('show');
		});
		/*-------------------------------------------*/
		$('#modal_portfolio_bgcolorHoverFilter').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_bgcolorHoverFilter, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_bgcolorHoverFilter').iris('hide');
			}
		});
		$('#modal_portfolio_bgcolorHoverFilter').click(function (event) {
			$('#modal_portfolio_bgcolorHoverFilter').iris('hide');
			$(this).iris('show');
		});		
		/*-------------------------------------------*/
		$('#modal_portfolio_colorLinkFilter').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_colorLinkFilter, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_colorLinkFilter').iris('hide');
			}
		});
		$('#modal_portfolio_colorLinkFilter').click(function (event) {
			$('#modal_portfolio_colorLinkFilter').iris('hide');
			$(this).iris('show');
		});
		/*-------------------------------------------*/
		$('#modal_portfolio_colorHoverFilter').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_colorHoverFilter, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_colorHoverFilter').iris('hide');
			}
		});
		$('#modal_portfolio_colorHoverFilter').click(function (event) {
			$('#modal_portfolio_colorHoverFilter').iris('hide');
			$(this).iris('show');
		});
		/*-------------------------------------------*/
		$('#modal_portfolio_borderColor').iris({
			hide:true,
			border:true,
			width:300,
			palettes:true
		});  
		$(document).click(function (e) {
			if (!$(e.target).is("#modal_portfolio_borderColor, .iris-picker, .iris-picker-inner")) {
				$('#modal_portfolio_borderColor').iris('hide');
			}
		});
		$('#modal_portfolio_borderColor').click(function (event) {
			$('#modal_portfolio_borderColor').iris('hide');
			$(this).iris('show');
		});
	});
})(jQuery);