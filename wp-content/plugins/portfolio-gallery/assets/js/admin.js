jQuery(document).ready(function () {
	jQuery('#arrows-type input[name="params[portfolio_navigation_type]"]').change(function(){
		jQuery(this).parents('ul').find('li.active').removeClass('active');
		jQuery(this).parents('li').addClass('active');
	});
	jQuery('#portfolio-view-tabs > li > a').click(function(){
		jQuery('#portfolio-view-tabs > li').removeClass('active');
		jQuery(this).parent().addClass('active');
		jQuery('#portfolio-view-tabs-contents > li').removeClass('active');
		var liID=jQuery(this).attr('href');
		jQuery(liID).addClass('active');
		jQuery('#adminForm').attr('action',"admin.php?page=Options_portfolio_styles&task=save"+liID);
		return false;
	});
	jQuery(".close_free_banner").on("click",function(){
		jQuery(".free_version_banner").css("display","none");
		hgSliderSetCookie( 'hgSliderFreeBannerShow', 'no', {expires:3600} );
	});
	
	
	
	imageslistlisize();
	jQuery(window).resize(function(){
		imageslistlisize();
	});
	
	function imageslistlisize(){
		var lisaze = jQuery('#images-list').width();
		lisaze=lisaze*0.06;
		jQuery('#images-list .widget-images-list li').not('.add-image-box').not('.first').height(lisaze);
	}
        
        jQuery('#portfolio-loading-icon li').click(function(){ //alert(jQuery(this).find("input:checked").val());
		jQuery(this).parents('ul').find('li.act').removeClass('act');
		jQuery(this).addClass('act');
	});	
        
        jQuery('input#show_loading').change(function(){
            if(jQuery(this).prop('checked') == false){
                jQuery('li.loading_opton').hide();
            }
            else{
                jQuery('li.loading_opton').show();
            }
        });
        jQuery('input#show_loading').change();

	jQuery('table.wp-list-table a[href*="remove_cat"]').click(function(){
		if(!confirm("Are you sure you want to delete this item?"))
			return false;
	});
});

/* Cookies */
function hgSliderGetCookie(name) {
	var matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

function hgSliderSetCookie(name, value, options) {
	options = options || {};

	var expires = options.expires;

	if (typeof expires == "number" && expires) {
		var d = new Date();
		d.setTime(d.getTime() + expires * 1000);
		expires = options.expires = d;
	}
	if (expires && expires.toUTCString) {
		options.expires = expires.toUTCString();
	}


	if(typeof value == "object"){
		value = JSON.stringify(value);
	}
	value = encodeURIComponent(value);
	var updatedCookie = name + "=" + value;

	for (var propName in options) {
		updatedCookie += "; " + propName;
		var propValue = options[propName];
		if (propValue !== true) {
			updatedCookie += "=" + propValue;
		}
	}

	document.cookie = updatedCookie;
}

function hgSliderDeleteCookie(name) {
	setCookie(name, "", {
		expires: -1
	})
}
	